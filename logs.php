<?php
require_once 'vendor/autoload.php';

use Google\Service\Docs\BatchUpdateDocumentRequest;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

echo "<h1>TEST</h1>";
$_SERVER["argv"];
$array_log = array();
$log_text = "";
$sales_spreadsheet_register = false;
$sales_spreadsheet_insert_array = array();
$array_email = array();

$ALL_EMAIL = array("j.s.devincenzi@gmail.com");
$IT_EMAIL = array("jdevincenzi@ucloudstore.com", "jsdevincenzi00@gmail.com");
$SALES_EMAIL = array("jdevincenzi@ucloudstore.com");

$GOOGLE_API_OAUTH2_SCOPES = [
    Google_Service_Sheets::SPREADSHEETS,
    Google_Service_Reseller::APPS_ORDER,
    Google_Service_SiteVerification::SITEVERIFICATION,
    Google_Service_Directory::ADMIN_DIRECTORY_USER,
    Google_Service_Docs::DOCUMENTS,
    Google_Service_Gmail::GMAIL_COMPOSE,
];
$GOOGLE_API_JSON_KEY_PATH = 'ucloud-dev-01-a32afdd1ed43.json';
$GOOGLE_API_APP_NAME = 'domain_and_google_workspace_purchase';
$GOOGLE_API_CLIENT_ID = '116408071548313110799';
$GOOGLE_API_RESELLER_ADMIN_USER = 'jdevincenzi@ucloudstore.com';

$IT_LOG_DOC_ID = '14gjNaYiaswfMtDw4E02I28KN3siEvf3DTmD-QniyLe4';
$SALES_SPREADSHEET_ID = "1nQX1TbCq_qnBdGI-of1cEVlZcBMU6NYX2ggO8b7TJn4";

//Los logs que sean para informáticos llevarán al principio de todo un array así:
$IT_CODES = array(
    "10XX" => array('prioridad'=>3, 'enviar_correo'=>false, 'mensaje'=>"ERROR |%CODE%| VALIDANDO INPUT (Valor recibido: '|%EXTRA%|')"),
    "11XX" => array('prioridad'=>3, 'enviar_correo'=>false, 'mensaje'=>"ERROR |%CODE%| VALIDANDO INPUT (Valor recibido: '|%EXTRA%|')"),
    "12XX" => array('prioridad'=>1, 'enviar_correo'=>false, 'mensaje'=>"Validación de input correcta: '|%CODE%|' => '|%EXTRA%|'"),
    "20XX" => array('prioridad'=>8, 'enviar_correo'=>true, 'mensaje'=>"SE HA INTENTADO ACCEDER CON UN TOKEN ERRONEO. CÓDIGO: '|%CODE%|' | TÓKEN UTILIZADO: => '|%EXTRA%|'"),
    "21XX" => array('prioridad'=>1, 'enviar_correo'=>false, 'mensaje'=>"Validación de tóken correcta. Código: '|%CODE%|' | Tóken utilizado: '|%EXTRA%|'"),
    "30XX" => array('prioridad'=>8, 'enviar_correo'=>true, 'mensaje'=>"ERROR DURANTE EL ACCESO A API GODADDY. CÓDIGO: '|%CODE%|' | INFORMACIÓN EXTRA: '|%EXTRA%|'"),
    "31XX" => array('prioridad'=>3, 'enviar_correo'=>false, 'mensaje'=>"Acceso correcto a API GoDaddy. Código: '|%CODE%|' | Información extra: '|%EXTRA%|'"),
    "32XX" => array('prioridad'=>1, 'enviar_correo'=>false, 'mensaje'=>"Apunte de estructura durante acceso a API GoDaddy. Código: '|%CODE%|' | Información extra: '|%EXTRA%|'"),
    "40XX" => array('prioridad'=>8, 'enviar_correo'=>true, 'mensaje'=>"ERROR DURANTE EL ACCESO A API GOOGLE WORKSPACE. Código: '|%CODE%|' | Información extra: '|%EXTRA%|'"),
    "41XX" => array('prioridad'=>3, 'enviar_correo'=>false, 'mensaje'=>"Acceso correcto a API Google Workspace. Código: '|%CODE%|' | Información extra: '|%EXTRA%|'"),
    "50XX" => array('prioridad'=>1, 'enviar_correo'=>false, 'mensaje'=>"Apunte de estructura de ejecución del documento. Código: '|%CODE%|'"),
    "6000" => array('prioridad'=>10, 'enviar_correo'=>false, 'mensaje'=>"Contraseña del usuario: '|%EXTRA%|'"),
    "7000" => array('prioridad'=>7, 'enviar_correo'=>false, 'mensaje'=>"Compra mediante la API de google confirmada. Informando a comerciales. Código: '|%CODE%|'"),
    "7100" => array('prioridad'=>7, 'enviar_correo'=>false, 'mensaje'=>"Compra mediante la API de GoDaddy confirmada. Informando a comerciales si es necesario. Código: '|%CODE%|'"),
);

//Los comerciales contendrán un array para códigos de excel y otro para correos:
$SALES_SPREADSHEET_CODES = array(
    "7000" => array("DOMAIN" => "|%1204%|", "CUSTOMER_SITE" => "|%1263%|", "ADMIN_EMAIL" => "|%1264%|@|%1204%|", "ALTERNATE_EMAIL" => "|%1265%|", "FIRST_NAME" => "|%1266%|", "LAST_NAME" => "|%1267%|", "CUSTOMER_ORGANIZATION_NAME" => "|%1268%|", "COUNTRY_CODE" => "|%1269%|", "POSTAL_CODE" => "|%1270%|", "PLAN" => "|%1271%|", "NUMBER_USERS" => "|%1272%|", "RENEWAL_TYPE" => "|%1273%|", "WEB_PURCHASE_DOMAIN" => "|%7100%|"),
);
$SALES_EMAIL_CODES = array(
    "7000" => "Cuenta de Google Workspace comprada por cliente online:\nNombre: |%1266%| |%1267%|\nOrganización: |%1268%|\nUsuarios: |%1272%|",
    "7100" => "Dominio de GoDaddy comprado por cliente online:\nNombre: |%1266%| |%1267%|\nOrganización: |%1268%|\nDominio: |%1204%|"
);

//Los usuarios sólo recibirán correos. El array será:
$USER_CODES = array("6000" => "Su contraseña ha sido generada: |%EXTRA%|");

$global_extra = "";    //Varible global de uso constante.
$global_client = null;



//Repasamos los parametros introducidos al llamar omitiendo deliveradamente la posición 0 del array que es siempre el nombre de este fichero (logs.php).
for ($i=1; $i<count($_SERVER["argv"]); $i++) {
    $array_attr = explode("=", $_SERVER["argv"][$i]);
    if (count($array_attr) != 2) {
        internal_error("9100", $_SERVER["argv"][$i], true);
    }
    $array_log[$array_attr[0]] = decode_attr($array_attr[1]);
}

foreach($array_log as $code => $extra) {  
    //Repasar todos los codigos de $array_log. Por cada uno llamar al método de IT, a los dos de SALES y al de USER.
    //Dentro de esos métodos hacer bucles que revisen si coincide o no y retornen booleano.
    $global_extra = $extra;
    notify_it($code);
    notify_sales($code);
    notify_user($code);
}

//Save changes:
save_in_docs();
save_in_spreadsheet();
send_emails();

function notify_it($code) {
    global $IT_CODES, $IT_EMAIL, $ALL_EMAIL, $IT_LOG_DOC_ID, $log_text, $array_email, $global_extra;

    //Comprobar si el código coincide con alguno de los codigos del array.
    $it_internal_array = code_check($IT_CODES, $code);
    if ($it_internal_array != false) {
        if ($it_internal_array["enviar_correo"]) {
            array_push($array_email, array(array_merge($IT_EMAIL, $ALL_EMAIL), translate_variables($it_internal_array["mensaje"], $code, $global_extra)));
        }
        $log_text .= "Prioridad: ".$it_internal_array["prioridad"]." |Mensaje: ".translate_variables($it_internal_array["mensaje"], $code, $global_extra)."\n";
    }
}

function notify_sales($code) {
    global $SALES_SPREADSHEET_CODES, $SALES_EMAIL_CODES, $ALL_EMAIL, $SALES_EMAIL, $SALES_SPREADSHEET_ID, $global_extra, $array_email, $sales_spreadsheet_register, $sales_spreadsheet_insert_array;

    //Comprobar si el código coincide con alguno de los codigos del array.
    $sales_spreadsheet_internal_array = code_check($SALES_SPREADSHEET_CODES, $code);
    if ($sales_spreadsheet_internal_array != false) {
        $sales_spreadsheet_register = true;
        $sales_spreadsheet_insert_array = $sales_spreadsheet_internal_array;
    }

    $sales_email_message = code_check($SALES_EMAIL_CODES, $code);
    if ($sales_email_message != false) {
        array_push($array_email, array(array_merge($ALL_EMAIL, $SALES_EMAIL), translate_variables($sales_email_message, $code, $global_extra)));
    }
}

function notify_user($code) {
    global $USER_CODES, $array_email, $global_extra;

    //Comprobar si el código coincide con alguno de los códigos del array.
    $user_email_message = code_check($USER_CODES, $code);
    if ($user_email_message != false) {
        array_push($array_email, array(array(get_attr_from_code("1265")), translate_variables($user_email_message, $code, $global_extra)));
    }
}

function save_in_docs() {
    global $IT_LOG_DOC_ID, $log_text;

    if ($log_text != "") {
        $log_text .= "<================================================>\n";
        $client = get_google_client();
        $service = new Google_Service_Docs($client);
        $requests = array();
        $requests[] = new Google_Service_Docs_Request(array(
            'insertText' => array(
                'text' => $log_text,
                'location' => array(
                    'index' => get_doc_first_free_item_index($service),
                ),
            ),
        ));
        $batchUpdate = new BatchUpdateDocumentRequest(array(
            'requests' => $requests
        ));
        $doc = $service->documents->batchUpdate($IT_LOG_DOC_ID, $batchUpdate);
    }
}

function get_doc_first_free_item_index($service) {
    global $IT_LOG_DOC_ID;

    $doc = $service->documents->get($IT_LOG_DOC_ID);
    return ($doc["body"]["content"][count($doc["body"]["content"])-1]["endIndex"])-1;
}

function save_in_spreadsheet() {
    global $SALES_SPREADSHEET_ID, $sales_spreadsheet_insert_array, $sales_spreadsheet_register;



    if ($sales_spreadsheet_register) {
        //Almacena en la hoja de calculo con el nombre recibido en el primer parámetro los mensajes recibidos en el array, que contiene como claves los nombres de las columnas y como valores el contenido de las celdas que se añadirán.
        $client = get_google_client();
        $service = new Google_Service_Sheets($client);
        $sales_spreadsheet_values = array();

        foreach ($sales_spreadsheet_insert_array as $column => $cell) {
            array_push($sales_spreadsheet_values, translate_variables($cell));
        }

        $row = get_spreadsheet_first_free_item_index($service);
        $range = "A$row";
        $value_range= new Google_Service_Sheets_ValueRange();
        $value_range->setValues(["values" => $sales_spreadsheet_values]); // Add two values
        $conf = ["valueInputOption" => "RAW"];
        $service->spreadsheets_values->update($SALES_SPREADSHEET_ID, $range, $value_range, $conf);
    }
}

function get_spreadsheet_first_free_item_index($service) {
    global $SALES_SPREADSHEET_ID;

    $response = $service->spreadsheets_values->get($SALES_SPREADSHEET_ID, "A2:L100000");
    if (!$response->getValues()) {
        return 2;   //Primera fila de la hoja de cálculo quitando los títulos.
    }
    $num_clients_in_sales_spreadsheet = count($response->getValues());
    return $num_clients_in_sales_spreadsheet+2;
    return 1;
}

function send_emails() {
    global $array_email;

    //Envia un email a todos los correos contenidos en el array con el mensaje del segundo (formateando |% %|).
    print_r($array_email);
    $message = create_gmail_message("apps@ucloudstore.net", "jdevincenzi@ucloudstore.com", "SUJETO", "TEXTO DE PRUEBA");
    $client = google_get_gmail_client();
    $service = new Google_Service_Gmail($client);
    send_message($service, $message);
}

function create_gmail_message($sender, $to, $subject, $message_text) {
    global $GMAIL_ALIAS;
    $GMAIL_ALIAS = "No-Reply UCloudStore";

    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->From = $sender;
    $mail->FromName = $GMAIL_ALIAS;
    $mail->AddAddress($to);
    $mail->AddReplyTo($sender);
    $mail->Subject = $subject;
    $mail->Body = $message_text;
    $mail->preSend();
    $mime = $mail->getSentMIMEMessage();
    $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
    $mensaje = new Google_Service_Gmail_Message();
    $mensaje->setRaw($mime);
    return $mensaje;
}

function send_message($service, $message) {
    try {
        $service->users_messages->send("me", $message);
        return $message;
    } catch (Exception $e) {
        print 'An error occurred: ' . $e->getMessage();
    }
    return null;
}

function code_check($array, $code) {
    if (isset($array[$code])) {
        return $array[$code];
    } else if (isset($array[substr($code, 0, 2)."XX"])) {
        return $array[substr($code, 0, 2)."XX"];
    } else {
        return false;
    }
}

function translate_variables($cadena, $code = null, $extra = null) {
    $cadena = str_replace("|%CODE%|", $code, $cadena);
    $cadena = str_replace("|%EXTRA%|", $extra, $cadena);
    //"|%1234%|@|%4321%|.|%2222%|"
    $counter_flag = 10;
    while (preg_match("/\|%[\d]{4}%\|/", $cadena) && $counter_flag>=0) {
        $finded_code = substr($cadena, ((strpos($cadena, "|%"))+2), 4);
        if (preg_match("/[\d]{4}/", $finded_code)) {
            $cadena = str_replace("|%".$finded_code."%|", get_attr_from_code($finded_code), $cadena);
        } else {
            internal_error("9060", $finded_code." | ".$cadena, false);
            break;
        }
        $counter_flag--;
    }
    $cadena = trim($cadena);
    return $cadena;
}

function get_attr_from_code($code) {
    global $array_log;

    if (isset($array_log[$code])) {
        return $array_log[$code];
    } else {
        return false;
    }
}

function decode_attr($attr) {
    $attr = str_replace("%25", "%", $attr);
    $attr = str_replace("%20", " ", $attr);
    $attr = str_replace("%26", "&", $attr);
    $attr = str_replace("%3D", "=", $attr);
    return $attr;
}

function get_google_client() {
    global $global_client;
    
    if ($global_client == null) {
        $google_global_token = google_get_global_token();
        $client = google_get_client($google_global_token);
        $global_client = $client;
        return $client;
    } else {
        return $global_client;
    }
}

function google_get_global_token() {
    global $GOOGLE_API_CLIENT_ID, $GOOGLE_API_APP_NAME, $GOOGLE_API_JSON_KEY_PATH, $GOOGLE_API_OAUTH2_SCOPES;

    try {
        //https://developers.google.com/console/help/#service_accounts
        $client = new Google_Client();
        $client->setApplicationName($GOOGLE_API_APP_NAME);
        $client->setAuthConfig($GOOGLE_API_JSON_KEY_PATH);

        $client->setScopes($GOOGLE_API_OAUTH2_SCOPES);

        $client->setAccessType('offline');
        $client->setRedirectUri('http://localhost/result.php');
        $client->setPrompt('select_account consent');

        $tokenPath = 'token_gmail.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        $client->fetchAccessTokenWithAssertion();

        $client->setClientId($GOOGLE_API_CLIENT_ID);

        if ($client->isAccessTokenExpired()) {
            
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            }

            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }        

        // Get the json encoded access token.
        $token = $client->getAccessToken();
        //$_SESSION['token'] = $token;
        //print_r($token);

        return $token;
    } catch(Exception $e) {
        internal_error("9010", "Google Token Error: ".$e, true);
    }
}

//GET OBJECT Google_Client FROM LIBRARY USING THE SERVICE ACCOUNT'S KEY.
function google_get_client($google_global_token) {
    global $GOOGLE_API_CLIENT_ID, $GOOGLE_API_APP_NAME, $GOOGLE_API_JSON_KEY_PATH, $GOOGLE_API_OAUTH2_SCOPES;

    try {
        //https://developers.google.com/console/help/#service_accounts
        $client = new Google_Client();
        $client->setApplicationName($GOOGLE_API_APP_NAME);
        $client->setAuthConfig($GOOGLE_API_JSON_KEY_PATH);

        $client->setScopes($GOOGLE_API_OAUTH2_SCOPES);

        $client->setAccessType('offline');
        $client->setRedirectUri('http://localhost/result.php');
        $client->setPrompt('select_account consent');

        $tokenPath = 'token_drive.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        $client->fetchAccessTokenWithAssertion();

        $client->setClientId($GOOGLE_API_CLIENT_ID);

        if ($client->isAccessTokenExpired()) {
            
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            }

            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }        

        // Get the json encoded access token.
        $token = $client->getAccessToken();
        //$_SESSION['token'] = $token;
        //print_r($token);

        return $client;
    } catch(Exception $e) {
        log_add("9020", "Google Get Cliente Error: ".$e, true);
    }
}

function google_get_gmail_client() {
    global $GOOGLE_API_OAUTH2_SCOPES;

    try {
        $client = new Google_Client();
        $client->setApplicationName("UCLOUD API GMAIL SENDER");

        $client->setScopes($GOOGLE_API_OAUTH2_SCOPES);

        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        $tokenPath = 'token_gmail.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        if ($client->isAccessTokenExpired()) {
            
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            }

            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }        

        return $client;
    } catch(Exception $e) {
        log_add("9030", "Google Get Gmail Client Error: ".$e, true);
    }
}

//No intentar que este método contacte con métodos que ya existen para evitar bucles infinitos de errores
function internal_error($code, $extra_data, $exit = false) {
    //"try" para intentar registrar un log de forma interna y enviar un correo a informático.
    
    
    //Salir del programa:
    if ($exit) {
        die();
    }
}
?>