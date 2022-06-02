<?php

require_once 'vendor/autoload.php';

/*Registrar todas las posibles salidas de ejecución en un array que servirá como log más adelante*/
/*Ante cualquier error que impida que continúe la ejecución romper el método en cuestión y permitir que finalice la ejecución del fichero*/

//Establecer valor de constantes globales fijas.
$GODADDY_API_TEST_KEY 	= "3mM44UcBKoTDiB_Rr41tS2JTNjnpbgctGMdLc";
$GODADDY_API_TEST_SECRET = "HFox7xeNp7samUMBUSZHVB";
$GODADDY_API_PURCHASE_TEST_URL = "https://api.ote-godaddy.com/v1/domains/purchase";
$GODADDY_API_CHECK_AVAILABLE_TEST_URL = "https://api.ote-godaddy.com/v1/domains/available";
$GODADDY_API_PRODUCTION_KEY = "3mM44UcBKoTDiB_Rr41tS2JTNjnpbgctGMdLc";
$GODADDY_API_PRODUCTION_SECRET = "HFox7xeNp7samUMBUSZHVB";
$GODADDY_API_PURCHASE_PRODUCTION_URL = "https://api.ote-godaddy.com/v1/domains/purchase";
$GODADDY_API_CHECK_AVAILABLE_PRODUCTION_URL = "https://api.ote-godaddy.com/v1/domains/available";
$GODADDY_API_CONNECTION_TIMEOUT=60;

$GOOGLE_API_RESELLER_ADMIN_USER = 'apps@ucloudstore.net';
$GOOGLE_API_OAUTH2_SCOPES = [
    Google_Service_Reseller::APPS_ORDER,
    Google_Service_SiteVerification::SITEVERIFICATION,
    Google_Service_Directory::ADMIN_DIRECTORY_USER,
    Google_Service_Directory::ADMIN_DIRECTORY_DOMAIN,
];
$GOOGLE_API_JSON_KEY_PATH = 'client_secret_502397577775-7m09m43t95o9gnfpb622tu2j8507jm3t.apps.googleusercontent.com.json';
$GOOGLE_API_APP_NAME = 'domain_and_google_workspace_purchase';
$GOOGLE_API_CLIENT_ID = '502397577775-7m09m43t95o9gnfpb622tu2j8507jm3t.apps.googleusercontent.com';

$PASSWORD_GENERATION_MINIMUM_LENGTH = 16;
$PASSWORD_GENERATION_MAXIMUM_LENGTH = 32;
$PASSWORD_GENERATION_PERMITTED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';

//CONFIGURATION CONSTANTS:
$SOFTWARE_STATUS_DEBUG = true;
$SUCCESS_LOG_CODES = array("21", "42", "50");   //Indica los números por los que empiezan los códigos del log que se corresponden a eventos success. Se ignoran si el programa no está en modo DEBUG.
$RETURN_LOG_CODES = array("10", "11", "20", "30");  //Indica los logs que se retornarán al usuario siempre y cuando DEBUG==false

//VALIDATE CONSTANTS:
$REGEX_TOKEN = "/^[\w]{64}$/";
$TOKEN_NULLABLE = false;
$TOKEN_DEFAULT_VALUE = "";
$REGEX_USER = "/^[0-9]{10,15}$/";
$USER_NULLABLE = false;
$USER_DEFAULT_VALUE = "";
$REGEX_PASSWORD = "/^[\w%!^*@#&\{\},\/\\\|:;><\]\[().?$~+-]{10,32}$/";
$PASSWORD_NULLABLE = false;
$PASSWORD_DEFAULT_VALUE = "";
$REGEX_DOMAIN = "/^[a-zA-Z0-9]+.[a-zA-Z0-9]+$/";
$DOMAIN_NULLABLE = false;
$DOMAIN_DEFAULT_VALUE = "";
$REGEX_WOO_COMMERCE_ID = "";
$WOO_COMMERCE_ID_NULLABLE = true;
$WOO_COMMERCE_DEFAULT_VALUE = "";
$REGEX_TOTAL_PAID_AMOUNT = "/^[\d]{1,7}([.,][\d]{2})?$/";     //123€, 0.21$, 435234,54€
$TOTAL_PAID_AMOUNT_NULLABLE = true;
$TOTAL_PAID_DEFAULT_VALUE = "";
$REGEX_PAID_IVA = "/^[\d]{1,7}([.,][\d]{2})?$/";      //123€, 0.21$, 435234,54€
$PAID_IVA_NULLABLE = true;
$PAID_IVA_DEFAULT_VALUE = "";
$REGEX_CURRENCY = "/^(euro|usd|EURO|USD)$/";
$CURRENCY_NULLABLE = false;
$CURRENCY_DEFAULT_VALUE = "";
$REGEX_PAY_METHOD = "";
$PAY_METHOD_NULLABLE = true;
$PAY_METHOD_DEFAULT_VALUE = "";
$REGEX_FACTURATION_TYPE = "";
$FACTURATION_TYPE_NULLABLE = true;
$FACTURATION_DEFAULT_VALUE = "";
$REGEX_PAY_TIMESTAMP = "/^[0-9]{10}$/";
$PAY_TIMESTAMP_NULLABLE = true;
$PAY_TIMESTAMP_DEFAULT_VALUE = "";
$REGEX_DATETIME = "/^[0-9]{10}$/";
$DATETIME_NULLABLE = false;
$DATETIME_DEFAULT_VALUE = "";
$DATETIME_MARGIN = 3600;    //Segundos de margen con la hora actual.
$REGEX_GOOGLE_CUSTOMER_SITE = "/^((http|https):\/\/)?([w]{3}\.)?[\w]+(\.[\w]+)+$/";   //https://web.com o https://www.web.com o http
$GOOGLE_CUSTOMER_SITE_NULLABLE = true;
$REGEX_GOOGLE_ADMIN_EMAIL = "/^[^@]+$/";
$GOOGLE_ADMIN_EMAIL_NULLABLE = false;
$REGEX_GOOGLE_ALTERNATE_EMAIL = "/^[\w\-\.]+@([\w-]+\.)+[\w-]+$/";
$GOOGLE_ALTERNATE_EMAIL_NULLABLE = false;
$REGEX_GOOGLE_FIRST_NAME = "/^[a-zA-Z\s]+$/";
$GOOGLE_FIRST_NAME_NULLABLE = false;
$REGEX_GOOGLE_LAST_NAME = "/^[a-zA-Z\s]+$/";
$GOOGLE_LAST_NAME_NULLABLE = false;
$REGEX_GOOGLE_ORGANIZATION_NAME = "/^[a-zA-Z0-9-_\s]+$/";
$GOOGLE_ORGANIZATION_NAME_NULLABLE = false;
$REGEX_GOOGLE_COUNTRY_CODE = "/^[a-zA-Z]+$/";
$GOOGLE_COUNTRY_CODE_NULLABLE = false;
$REGEX_GOOGLE_POSTAL_CODE = "";
$GOOGLE_POSTAL_CODE_NULLABLE = false;
$REGEX_GOOGLE_PLAN = "";
$GOOGLE_PLAN_NULLABLE = false;
$REGEX_GOOGLE_NUMBER_USERS = "/^[0-9]+$/";
$GOOGLE_NUMBER_USERS_NULLABLE = false;
$REGEX_GOOGLE_RENEWAL_TYPE = "";
$GOOGLE_RENEWAL_TYPE_NULLABLE = false;

//AÑADIR CAMPO DE PRIVACIDAD DE GODADDY ACEPTADO A (TIMESTAMP)

$ACCESS_TOKEN_ALLOWED = array("6udqamA3Uj2wCApzAzDkYrGUKkndZF7NakvpPdjAvqYqM4nDBWaVKQkcP7bVKzTK");

//Establecer valor a las variables globales
$array_log = array();

//Llamar al método de validación del entry.
if (!validate_entry()) {
    exit_software();
}

//Validar el token de acceso
if (!validate_token()) {
    exit_software();
}

//Inicializar variables POST:
$SOFTWARE_IS_TEST = $_POST['is_test'];
$DOMAIN = $_POST['domain'];

$array_domain = url_to_array($_POST['domain_purchase']);
$GODADDY_IS_DOMAIN_PURCHASE = $array_domain['is_domain_purchase'];
$GODADDY_IS_DOMAIN_AVAILABLE_CHECK = $array_domain['is_domain_available_check'];
unset($array_domain);

$array_google_subscription = url_to_array($_POST['google_subscription']);
$GOOGLE_IS_GOOGLE_ACCOUNT_PURCHASE = $array_google_subscription['is_google_account_purchase'];
$GOOGLE_IS_ACCOUNT_AVAILABLE_CHECK = $array_google_subscription['is_google_account_available_check'];
$GOOGLE_API_CUSTOMER_SITE = $array_google_subscription['customer_site'];
$GOOGLE_API_ADMIN_EMAIL = $array_google_subscription['admin_email'];   //Correo administrador de la cuenta de workspace (No puede llevar @ ya que será la primera parte del correo del admin: ADMIN@dominio.com donde dominio.com se añade automáticamente)
$GOOGLE_API_CUSTOMER_ALTERNATE_EMAIL = $array_google_subscription['alternate_email'];
$GOOGLE_API_CUSTOMER_FIRST_NAME = $array_google_subscription['first_name'];
$GOOGLE_API_CUSTOMER_LAST_NAME = $array_google_subscription['last_name'];
$GOOGLE_API_CUSTOMER_ORGANIZATION_NAME = $array_google_subscription['organization_name'];
$GOOGLE_API_CUSTOMER_COUNTRY_CODE = $array_google_subscription['country_code'];
$GOOGLE_API_CUSTOMER_POSTAL_CODE = $array_google_subscription['postal_code'];
$GOOGLE_API_PLAN = $array_google_subscription['plan'];  //'ANNUAL_MONTHLY_PAY'
$GOOGLE_API_NUMBER_USERS = $array_google_subscription['number_users'];
$GOOGLE_API_RENEWAL_TYPE = $array_google_subscription['renewal_type'];   //'RENEW_CURRENT_USERS_MONTHLY_PAY'
$GOOGLE_ONLY_CREATE_CLIENT = false;
unset($array_google_subscription);

//Establecer valor de constantes globales condicionales
//      Su valor se basa en el valor de las constantes globales fijas,
//      Y en el valor de los datos input pasados en la llamada.
if (($SOFTWARE_IS_TEST || $SOFTWARE_IS_TEST == "1" || $SOFTWARE_IS_TEST == "true") || $SOFTWARE_STATUS_DEBUG) {
    log_add("5000");
    $TESTING_MODE = true;
} else {
    log_add("5001");
    $TESTING_MODE = false;
}


if ($GODADDY_IS_DOMAIN_PURCHASE || $GODADDY_IS_DOMAIN_PURCHASE == "1" || $GODADDY_IS_DOMAIN_PURCHASE == "true") {
    log_add("5010");
    $CHECK_DOMAIN_AVAILABILITY = true;
    $PURCHASE_DOMAIN = true;
} else if ($GODADDY_IS_DOMAIN_AVAILABLE_CHECK || $GODADDY_IS_DOMAIN_AVAILABLE_CHECK == "1" || $GODADDY_IS_DOMAIN_AVAILABLE_CHECK == "true") {
    log_add("5011");
    $CHECK_DOMAIN_AVAILABILITY = true;
    $PURCHASE_DOMAIN = false;
} else {
    log_add("5012");
    $CHECK_DOMAIN_AVAILABILITY = false;
    $PURCHASE_DOMAIN = false;
}
unset($array_domain);

if ($GOOGLE_IS_GOOGLE_ACCOUNT_PURCHASE || $GOOGLE_IS_GOOGLE_ACCOUNT_PURCHASE == "1" || $GOOGLE_IS_GOOGLE_ACCOUNT_PURCHASE == "true") {
    log_add("5020");
    $CHECK_GOOGLE_SUBSCRIPTION_AVAILABILITY = true;
    $PURCHASE_GOOGLE_SUBSCRIPTION = true;
    if ($GOOGLE_API_PLAN == "NONE") {
        $GOOGLE_ONLY_CREATE_CLIENT = true;
    } else {
        $GOOGLE_ONLY_CREATE_CLIENT = false;
    }
} else if ($GOOGLE_IS_ACCOUNT_AVAILABLE_CHECK || $GOOGLE_IS_ACCOUNT_AVAILABLE_CHECK == "1" || $GOOGLE_IS_ACCOUNT_AVAILABLE_CHECK == "true") {
    log_add("5021");
    $CHECK_GOOGLE_SUBSCRIPTION_AVAILABILITY = true;
    $PURCHASE_GOOGLE_SUBSCRIPTION = false;
} else {
    log_add("5022");
    $CHECK_GOOGLE_SUBSCRIPTION_AVAILABILITY = false;
    $PURCHASE_GOOGLE_SUBSCRIPTION = false;    
}


//Llamar al método de compra de dominio si procede.
//      Validar que la compra se realizará correctamente.
$domain_purchase_correct = false;
if ($CHECK_DOMAIN_AVAILABILITY && check_domain_availability($DOMAIN)) {
    if ($PURCHASE_DOMAIN && purchase_domain($DOMAIN)) {
        $domain_purchase_correct = true;
        log_add("7100");
    }
}

//Llamar al método de compra de workspace si procede.
//      Validar que la compra se realizará correctamente.
$domain_purchase_correct = true;    //BORRAR CUANDO SE FINALICEN LAS PRUEBAS
if ((!$PURCHASE_DOMAIN || $domain_purchase_correct) && $CHECK_GOOGLE_SUBSCRIPTION_AVAILABILITY) {
    
    $google_global_token = google_get_global_token();
    $client = google_get_client($google_global_token);

    $reseller_service = new Google_Service_Reseller($client);
    $directory_service = new Google_Service_Directory($client);
    $verification_service = new Google_Service_SiteVerification($client);

    if (!is_google_domain_available($reseller_service)) {
        exit_software();
    }
    if ($PURCHASE_GOOGLE_SUBSCRIPTION) {
        if (google_get_site_verification_token($verification_service) == null) {  exit_software();  }
        if (!google_create_customer_resource($reseller_service)) {  exit_software();  }
        if (!google_create_first_admin_user($directory_service)) {  exit_software();  }
        if ($GOOGLE_ONLY_CREATE_CLIENT && !google_create_subscription($reseller_service)) {  exit_software();  }
        if (!$TESTING_MODE && !google_verify_and_designate_domain_owners($verification_service)) {  exit_software();  }
        log_add("7000");
    }
}

//Finalizar la ejecución del programa.
log_add("5090");
exit_software();

function validate_entry() {
    
    global $REGEX_TOKEN, $TOKEN_NULLABLE, $REGEX_USER, $USER_NULLABLE, $REGEX_PASSWORD, $PASSWORD_NULLABLE, $REGEX_WOO_COMMERCE_ID, $WOO_COMMERCE_ID_NULLABLE, $REGEX_TOTAL_PAID_AMOUNT, $TOTAL_PAID_AMOUNT_NULLABLE, $REGEX_CURRENCY, $CURRENCY_NULLABLE, $REGEX_PAID_IVA, $PAID_IVA_NULLABLE, $REGEX_PAY_METHOD, $PAY_METHOD_NULLABLE, $REGEX_FACTURATION_TYPE, $FACTURATION_TYPE_NULLABLE, $REGEX_PAY_TIMESTAMP, $PAY_TIMESTAMP_NULLABLE, $REGEX_DOMAIN, $DOMAIN_NULLABLE, $REGEX_GOOGLE_ACCOUNT, $GOOGLE_ACCOUNT_NULLABLE, $REGEX_DATETIME, $DATETIME_NULLABLE, $DATETIME_MARGIN, $REGEX_GOOGLE_CUSTOMER_SITE, $GOOGLE_CUSTOMER_SITE_NULLABLE, $REGEX_GOOGLE_ADMIN_EMAIL, $GOOGLE_ADMIN_EMAIL_NULLABLE, $REGEX_GOOGLE_ALTERNATE_EMAIL, $GOOGLE_ALTERNATE_EMAIL_NULLABLE, $REGEX_GOOGLE_FIRST_NAME, $GOOGLE_FIRST_NAME_NULLABLE, $REGEX_GOOGLE_LAST_NAME, $GOOGLE_LAST_NAME_NULLABLE, $REGEX_GOOGLE_ORGANIZATION_NAME, $GOOGLE_ORGANIZATION_NAME_NULLABLE, $REGEX_GOOGLE_COUNTRY_CODE, $GOOGLE_COUNTRY_CODE_NULLABLE, $REGEX_GOOGLE_POSTAL_CODE, $GOOGLE_POSTAL_CODE_NULLABLE, $REGEX_GOOGLE_PLAN, $GOOGLE_PLAN_NULLABLE, $REGEX_GOOGLE_NUMBER_USERS, $GOOGLE_NUMBER_USERS_NULLABLE, $REGEX_GOOGLE_RENEWAL_TYPE, $GOOGLE_RENEWAL_TYPE_NULLABLE;

    //Root: token, user, password, domain, paydata(array), domain_purchase(array), google_subscription (array), is_test, datetime
    //paydata: woo_commerce_id, total_paid_amount, paid_iva, currency, pay_method, facturation_type, pay_timestamp
    //domain: is_domain_purchase, is_domain_available_check.
    //google_subscription: is_google_account_purchase, is_google_account_available_check, customer_site, admin_email, alternate_email,
    //              first_name, last_name, organization_name, country_code, postal_code, plan, number_users, renewal_type.

    if (!isset($_POST['token'])) { log_add("1101"); return false; }
    if (!$TOKEN_NULLABLE && $_POST['token'] == "") { log_add("1102"); return false; }
    if (!($TOKEN_NULLABLE && $_POST['token'] == "") && $REGEX_TOKEN != "" && !preg_match($REGEX_TOKEN, $_POST['token'])) { log_add("1103", $_POST['token']); return false; }
    log_add("1201", $_POST["token"]);

    if (!isset($_POST['user'])) { log_add("1104"); return false; }
    if (!$USER_NULLABLE && $_POST['user'] == "") { log_add("1105"); return false; }
    if (!($USER_NULLABLE && $_POST['user'] == "") && $REGEX_USER != "" && !preg_match($REGEX_USER, $_POST['user'])) { log_add("1106", $_POST['user']); return false; }
    log_add("1202", $_POST["user"]);

    if (!isset($_POST['password'])) { log_add("1107"); return false; }
    if (!$PASSWORD_NULLABLE && $_POST['password'] == "") { log_add("1108"); return false; }
    if (!($PASSWORD_NULLABLE && $_POST['password'] == "") && $REGEX_PASSWORD != "" && !preg_match($REGEX_PASSWORD, $_POST['password'])) { log_add("1109", $_POST['password']); return false; }
    log_add("1203", $_POST["password"]);

    if (!isset($_POST['domain'])) { log_add("1110"); return false; }
    if (!$DOMAIN_NULLABLE && $_POST['domain'] == "") { log_add("1111"); return false; }
    if (!($DOMAIN_NULLABLE && $_POST['domain'] == "") && $REGEX_DOMAIN != "" && !preg_match($REGEX_DOMAIN, $_POST['domain'])) { log_add("1112", $_POST['domain']); return false; }
    log_add("1204", $_POST["domain"]);

    if (!isset($_POST['is_test'])) { log_add("1113"); return false; }
    if ($_POST['is_test'] != "true" && $_POST['is_test'] != "false" && $_POST['is_test'] != "0" && $_POST['is_test'] != "1") { log_add("1114"); return false; }
    log_add("1205", $_POST["is_test"]);

    if (!isset($_POST['datetime'])) { log_add("1112"); return false; }    
    if (!$DATETIME_NULLABLE && $_POST['datetime'] == "") { log_add("1113"); return false; }
    if (!($DATETIME_NULLABLE && $_POST['datetime'] == "") && $REGEX_DATETIME != "" && !preg_match($REGEX_DATETIME, $_POST['datetime'])) { log_add("1114", $_POST['datetime']); return false; }
    if (!($DATETIME_NULLABLE && $_POST['datetime'] == "") && (intval($_POST['datetime']) < (time()-$DATETIME_MARGIN) || intval($_POST['datetime']) > (time()+$DATETIME_MARGIN))) { log_add("1115", $_POST['datetime']); return false; }
    log_add("1206", $_POST["datetime"]);

    //Validate paydata:
    if (!isset($_POST['paydata'])) { log_add("1120"); return false; }
    $array_paydata = url_to_array($_POST['paydata']);
    if (count($array_paydata) != 7) { log_add("1121", count($array_paydata)); return false; }
    log_add("1220");

    if (!isset($array_paydata['woo_commerce_id'])) { log_add("1122"); return false; }
    if (!$WOO_COMMERCE_ID_NULLABLE && $array_paydata['woo_commerce_id'] == "") { log_add("1123"); return false; }
    if (!($WOO_COMMERCE_ID_NULLABLE && $array_paydata['woo_commerce_id'] == "") && $REGEX_WOO_COMMERCE_ID != "" && !preg_match($REGEX_WOO_COMMERCE_ID, $array_paydata['woo_commerce_id'])) { log_add("1124", $array_paydata['woo_commerce_id']); return false; }
    log_add("1221", $array_paydata["woo_commerce_id"]);


    if (!isset($array_paydata['total_paid_amount'])) { log_add("1125"); return false; }
    if (!$TOTAL_PAID_AMOUNT_NULLABLE && $array_paydata['total_paid_amount'] == "") { log_add("1126"); return false; }
    if (!($TOTAL_PAID_AMOUNT_NULLABLE && $array_paydata['total_paid_amount'] == "") && $REGEX_TOTAL_PAID_AMOUNT != "" && !preg_match($REGEX_TOTAL_PAID_AMOUNT, $array_paydata['total_paid_amount'])) { log_add("1127", "test: ".preg_match($REGEX_TOTAL_PAID_AMOUNT, $array_paydata['total_paid_amount'])." |REGEX: ".$REGEX_TOTAL_PAID_AMOUNT." |TOTAL: ".$array_paydata['total_paid_amount']); return false; }
    log_add("1222", $array_paydata["total_paid_amount"]);

    if (!isset($array_paydata['paid_iva'])) { log_add("1128"); return false; }
    if (!$PAID_IVA_NULLABLE && $array_paydata['paid_iva'] == "") { log_add("1129"); return false; }
    if (!($PAID_IVA_NULLABLE && $array_paydata['paid_iva'] == "") && $REGEX_PAID_IVA != "" && !preg_match($REGEX_PAID_IVA, $array_paydata['paid_iva'])) { log_add("1130", $array_paydata['paid_iva']); return false; }
    log_add("1223", $array_paydata["paid_iva"]);

    if (!isset($array_paydata['currency'])) { log_add("1131"); return false; }
    if (!$CURRENCY_NULLABLE && $array_paydata['currency'] == "") { log_add("1132"); return false; }
    if (!($CURRENCY_NULLABLE && $array_paydata['currency'] == "") && $REGEX_CURRENCY != "" && !preg_match($REGEX_CURRENCY, $array_paydata['currency'])) { log_add("1133", $array_paydata['currency']); return false; }
    log_add("1224", $array_paydata["currency"]);

    if (!isset($array_paydata['pay_method'])) { log_add("1134"); return false; }
    if (!$PAY_METHOD_NULLABLE && $array_paydata['pay_method'] == "") { log_add("1135"); return false; }
    if (!($PAY_METHOD_NULLABLE && $array_paydata['pay_method'] == "") && $REGEX_PAY_METHOD != "" && !preg_match($REGEX_PAY_METHOD, $array_paydata['pay_method'])) { log_add("1136", $array_paydata['pay_method']); return false; }
    log_add("1225", $array_paydata["pay_method"]);

    if (!isset($array_paydata['facturation_type'])) { log_add("1137"); return false; }
    if (!$FACTURATION_TYPE_NULLABLE && $array_paydata['facturation_type'] == "") { log_add("1138"); return false; }
    if (!($FACTURATION_TYPE_NULLABLE && $array_paydata['facturation_type'] == "") && $REGEX_FACTURATION_TYPE != "" && !preg_match($REGEX_FACTURATION_TYPE, $array_paydata['facturation_type'])) { log_add("1139", $array_paydata['facturation_type']); return false; }
    log_add("1226", $array_paydata["facturation_type"]);

    if (!isset($array_paydata['pay_timestamp'])) { log_add("1140"); return false; }
    if (!$PAY_TIMESTAMP_NULLABLE && $array_paydata['pay_timestamp'] == "") { log_add("1141"); return false; }
    if (!($PAY_TIMESTAMP_NULLABLE && $array_paydata['pay_timestamp'] == "") && $REGEX_PAY_TIMESTAMP != "" && !preg_match($REGEX_PAY_TIMESTAMP, $array_paydata['pay_timestamp'])) { log_add("1142", $array_paydata['pay_timestamp']); return false; }
    if (!($PAY_TIMESTAMP_NULLABLE && $array_paydata['pay_timestamp'] == "") && (intval($array_paydata['pay_timestamp']) < (time()-$DATETIME_MARGIN) || intval($array_paydata['pay_timestamp']) > (time()+$DATETIME_MARGIN))) { log_add("1143", $_POST['pay_timestamp']); return false; }
    log_add("1227", $array_paydata["pay_timestamp"]);

    //Validate domain:
    if (!isset($_POST['domain_purchase'])) { log_add("1150"); return false; }
    $array_domain = url_to_array($_POST['domain_purchase']);
    if (count($array_domain) != 2) { log_add("1151", count($array_domain)); return false; }
    log_add("1240");

    if (!isset($array_domain['is_domain_purchase'])) { log_add("1151"); return false; }
    if ($array_domain['is_domain_purchase'] != "true" && $array_domain['is_domain_purchase'] != "false" && $array_domain['is_domain_purchase'] != "0" && $array_domain['is_domain_purchase'] != "1") { log_add("1152", $array_domain['is_domain_purchase']); return false; }
    log_add("1241", $array_domain['is_domain_purchase']);

    if (!isset($array_domain['is_domain_available_check'])) { log_add("1153"); return false; }
    if ($array_domain['is_domain_available_check'] != "true" && $array_domain['is_domain_available_check'] != "false" && $array_domain['is_domain_available_check'] != "0" && $array_domain['is_domain_available_check'] != "1") { log_add("1154", $array_domain['is_domain_available_check']); return false; }
    log_add("1242", $array_domain['is_domain_available_check']);

    //google_subscription: is_google_account_purchase, is_google_account_available_check, customer_site, admin_email, alternate_email,
    //              first_name, last_name, organization_name, country_code, postal_code, plan, number_users, renewal_type.
    if (!isset($_POST['google_subscription'])) { log_add("1159"); return false; }
    $array_google_subscription = url_to_array($_POST['google_subscription']);
    if (count($array_google_subscription) != 13) { log_add("1160", count($array_google_subscription)); return false; }
    log_add("1260");

    if (!isset($array_google_subscription['is_google_account_purchase'])) { log_add("1161"); return false; }
    if ($array_google_subscription['is_google_account_purchase'] != "true" && $array_google_subscription['is_google_account_purchase'] != "false" && $array_google_subscription['is_google_account_purchase'] != "0" && $array_google_subscription['is_google_account_purchase'] != "1") { log_add("1162", $array_domain['is_google_account_purchase']); return false; }
    log_add("1261", $array_google_subscription['is_google_account_purchase']);

    if (!isset($array_google_subscription['is_google_account_available_check'])) { log_add("1163"); return false; }
    if ($array_google_subscription['is_google_account_available_check'] != "true" && $array_google_subscription['is_google_account_available_check'] != "false" && $array_google_subscription['is_google_account_available_check'] != "0" && $array_google_subscription['is_google_account_available_check'] != "1") { log_add("1164", $array_domain['is_google_account_available_check']); return false; }
    log_add("1262", $array_google_subscription['is_google_account_available_check']);

    if (!isset($array_google_subscription['customer_site'])) { log_add("1165"); return false; }
    if (!$GOOGLE_CUSTOMER_SITE_NULLABLE && $array_google_subscription['customer_site'] == "") { log_add("1166"); return false; }
    if (!($GOOGLE_CUSTOMER_SITE_NULLABLE && $array_google_subscription['customer_site'] == "") && $REGEX_GOOGLE_CUSTOMER_SITE != "" && !preg_match($REGEX_GOOGLE_CUSTOMER_SITE, $array_google_subscription['customer_site'])) { log_add("1167", $array_google_subscription['customer_site']); return false; }
    log_add("1263", $array_google_subscription['customer_site']);

    if (!isset($array_google_subscription['admin_email'])) { log_add("1168"); return false; }
    if (!$GOOGLE_ADMIN_EMAIL_NULLABLE && $array_google_subscription['admin_email'] == "") { log_add("1169"); return false; }
    if (!($GOOGLE_ADMIN_EMAIL_NULLABLE && $array_google_subscription['admin_email'] == "") && $REGEX_GOOGLE_ADMIN_EMAIL != "" && !preg_match($REGEX_GOOGLE_ADMIN_EMAIL, $array_google_subscription['admin_email'])) { log_add("1170", $array_google_subscription['admin_email']); return false; }
    log_add("1264", $array_google_subscription['admin_email']);

    if (!isset($array_google_subscription['alternate_email'])) { log_add("1171"); return false; }
    if (!$GOOGLE_ALTERNATE_EMAIL_NULLABLE && $array_google_subscription['alternate_email'] == "") { log_add("1172"); return false; }
    if (!($GOOGLE_ALTERNATE_EMAIL_NULLABLE && $array_google_subscription['alternate_email'] == "") && $REGEX_GOOGLE_ALTERNATE_EMAIL != "" && !preg_match($REGEX_GOOGLE_ALTERNATE_EMAIL, $array_google_subscription['alternate_email'])) { log_add("1173", $array_google_subscription['alternate_email']); return false; }
    log_add("1265", $array_google_subscription['alternate_email']);

    if (!isset($array_google_subscription['first_name'])) { log_add("1174"); return false; }
    if (!$GOOGLE_FIRST_NAME_NULLABLE && $array_google_subscription['first_name'] == "") { log_add("1175"); return false; }
    if (!($GOOGLE_FIRST_NAME_NULLABLE && $array_google_subscription['first_name'] == "") && $REGEX_GOOGLE_FIRST_NAME != "" && !preg_match($REGEX_GOOGLE_FIRST_NAME, $array_google_subscription['first_name'])) { log_add("1176", $array_google_subscription['first_name']); return false; }
    log_add("1266", $array_google_subscription['first_name']);

    if (!isset($array_google_subscription['last_name'])) { log_add("1177"); return false; }
    if (!$GOOGLE_LAST_NAME_NULLABLE && $array_google_subscription['last_name'] == "") { log_add("1178"); return false; }
    if (!($GOOGLE_LAST_NAME_NULLABLE && $array_google_subscription['last_name'] == "") && $REGEX_GOOGLE_LAST_NAME != "" && !preg_match($REGEX_GOOGLE_LAST_NAME, $array_google_subscription['last_name'])) { log_add("1179", $array_google_subscription['last_name']); return false; }
    log_add("1267", $array_google_subscription['last_name']);

    if (!isset($array_google_subscription['organization_name'])) { log_add("1180"); return false; }
    if (!$GOOGLE_ORGANIZATION_NAME_NULLABLE && $array_google_subscription['organization_name'] == "") { log_add("1181"); return false; }
    if (!($GOOGLE_ORGANIZATION_NAME_NULLABLE && $array_google_subscription['organization_name'] == "") && $REGEX_GOOGLE_ORGANIZATION_NAME != "" && !preg_match($REGEX_GOOGLE_ORGANIZATION_NAME, $array_google_subscription['organization_name'])) { log_add("1182", $array_google_subscription['organization_name']); return false; }
    log_add("1268", $array_google_subscription['organization_name']);

    if (!isset($array_google_subscription['country_code'])) { log_add("1183"); return false; }
    if (!$GOOGLE_COUNTRY_CODE_NULLABLE && $array_google_subscription['country_code'] == "") { log_add("1184"); return false; }
    if (!($GOOGLE_COUNTRY_CODE_NULLABLE && $array_google_subscription['country_code'] == "") && $REGEX_GOOGLE_COUNTRY_CODE != "" && !preg_match($REGEX_GOOGLE_COUNTRY_CODE, $array_google_subscription['country_code'])) { log_add("1185", $array_google_subscription['country_code']); return false; }
    log_add("1269", $array_google_subscription['country_code']);

    if (!isset($array_google_subscription['postal_code'])) { log_add("1186"); return false; }
    if (!$GOOGLE_POSTAL_CODE_NULLABLE && $array_google_subscription['postal_code'] == "") { log_add("1187"); return false; }
    if (!($GOOGLE_POSTAL_CODE_NULLABLE && $array_google_subscription['postal_code'] == "") && $REGEX_GOOGLE_POSTAL_CODE != "" && !preg_match($REGEX_GOOGLE_POSTAL_CODE, $array_google_subscription['postal_code'])) { log_add("1188", $array_google_subscription['postal_code']); return false; }
    log_add("1270", $array_google_subscription['postal_code']);

    if (!isset($array_google_subscription['plan'])) { log_add("1189"); return false; }
    if (!$GOOGLE_PLAN_NULLABLE && $array_google_subscription['plan'] == "") { log_add("1190"); return false; }
    if (!($GOOGLE_PLAN_NULLABLE && $array_google_subscription['plan'] == "") && $REGEX_GOOGLE_PLAN != "" && !preg_match($REGEX_GOOGLE_PLAN, $array_google_subscription['plan'])) { log_add("1191", $array_google_subscription['plan']); return false; }
    log_add("1271", $array_google_subscription['plan']);

    if (!isset($array_google_subscription['number_users'])) { log_add("1192"); return false; }
    if (!$GOOGLE_NUMBER_USERS_NULLABLE && $array_google_subscription['number_users'] == "") { log_add("1993"); return false; }
    if (!($GOOGLE_NUMBER_USERS_NULLABLE && $array_google_subscription['number_users'] == "") && $REGEX_GOOGLE_NUMBER_USERS != "" && !preg_match($REGEX_GOOGLE_NUMBER_USERS, $array_google_subscription['number_users'])) { log_add("1194", $array_google_subscription['number_users']); return false; }
    log_add("1272", $array_google_subscription['number_users']);

    if (!isset($array_google_subscription['renewal_type'])) { log_add("1195"); return false; }
    if (!$GOOGLE_RENEWAL_TYPE_NULLABLE && $array_google_subscription['renewal_type'] == "") { log_add("1996"); return false; }
    if (!($GOOGLE_RENEWAL_TYPE_NULLABLE && $array_google_subscription['renewal_type'] == "") && $REGEX_GOOGLE_RENEWAL_TYPE != "" && !preg_match($REGEX_GOOGLE_RENEWAL_TYPE, $array_google_subscription['renewal_type'])) { log_add("1197", $array_google_subscription['renewal_type']); return false; }
    log_add("1273", $array_google_subscription['renewal_type']);

    return true;    //Everything Ok.
}

function url_to_array($string_url) {
    $array_url = explode("&", $string_url);
    $array_result = array();
    foreach ($array_url as $value) {
        $array_atribute_url = explode("=", $value);
        $array_result[$array_atribute_url[0]] = trim(urldecode($array_atribute_url[1]));
    }
    return $array_result;
}

//Temporalmente acepto el token desde un array en lugar de desde la base de datos.
function validate_token() {

    global $ACCESS_TOKEN_ALLOWED;

    for ($i = 0; $i<count($ACCESS_TOKEN_ALLOWED); $i++) {
        if ($_POST['token'] == $ACCESS_TOKEN_ALLOWED[$i]) {
            log_add("2100", $_POST['token']);
            return true;
        }
    }
    log_add("2000", $_POST['token']);
    return false;
}

//
//GODADDY:
//

function check_domain_availability($domain) {

    global $TESTING_MODE, $GODADDY_API_TEST_KEY, $GODADDY_API_TEST_SECRET, $GODADDY_API_CHECK_AVAILABLE_TEST_URL, $GODADDY_API_PRODUCTION_KEY, $GODADDY_API_PRODUCTION_SECRET, $GODADDY_API_CHECK_AVAILABLE_PRODUCTION_URL, $GODADDY_API_CONNECTION_TIMEOUT;

    if ($TESTING_MODE) {
        log_add("3200");
        $url = $GODADDY_API_CHECK_AVAILABLE_TEST_URL;
        $key = $GODADDY_API_TEST_KEY;
        $secret = $GODADDY_API_TEST_SECRET;      
    } else {
        log_add("3210");
        $url = $GODADDY_API_CHECK_AVAILABLE_PRODUCTION_URL;
        $key = $GODADDY_API_PRODUCTION_KEY;
        $secret = $GODADDY_API_PRODUCTION_SECRET;
    }

    $domain = filter_var($domain, FILTER_SANITIZE_URL);
    
    /*
    $domainTld = explode('.',$domain);
    if(!$domainTld[1])
        $domainTld=$domainTld[0].'.com';
    else
        $domainTld=$domain;
    */
    
    $url = "$url?domain=".$domain;

    $header = array(
        'Authorization: sso-key '.$key.':'.$secret.''
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $GODADDY_API_CONNECTION_TIMEOUT);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);  
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    
    if ($TESTING_MODE) {
        return true;    //BYPASS TEST
    }

    if ($response['available']==1 || $response['available']==true) {
        $price = ($response['price']/1000000).$response['currency'];
        $array_response = array('domain'=> $response['domain'], 'price'=> $price, 'available'=> true);
        log_add("3100", json_encode($array_response));
        return true;
    } else {
        log_add("3000");
        return false;
    }
}

function purchase_domain($domain) {

    global $TESTING_MODE, $GODADDY_API_TEST_KEY, $GODADDY_API_TEST_SECRET, $GODADDY_API_PURCHASE_TEST_URL, $GODADDY_API_PRODUCTION_KEY, $GODADDY_API_PRODUCTION_SECRET, $GODADDY_API_PURCHASE_PRODUCTION_URL, $GODADDY_API_CONNECTION_TIMEOUT;

    if ($TESTING_MODE) {
        log_add("3220");
        $url = $GODADDY_API_PURCHASE_TEST_URL;
        $key = $GODADDY_API_TEST_KEY;
        $secret = $GODADDY_API_TEST_SECRET;      
    } else {
        log_add("3230");
        $url = $GODADDY_API_PURCHASE_PRODUCTION_URL;
        $key = $GODADDY_API_PRODUCTION_KEY;
        $secret = $GODADDY_API_PRODUCTION_SECRET;
    }

	$domain = filter_var($domain, FILTER_SANITIZE_URL);

	$temp_domain = explode('.',$domain);
	if(!$temp_domain[1])
		$domain=$temp_domain[0].'.com';
	
	$body_content = '{
	 "consent": {
		"agreedAt": "'.date("Y-m-d\TH:i:s\Z").'",
		"agreedBy": "91.116.0.60",
		"agreementKeys": [
		  "DNRA"
		]
	  },
	  "contactAdmin": {
		"addressMailing": {
		  "address1": "Carrer de Sant Joan de la Salle",
		  "address2": "8",
		  "city": "Barcelona",
		  "country": "ES",
		  "postalCode": "08022",
		  "state": "Barcelona"
		},
		"email": "web@ucloudstore.com",
		"fax": "",
		"jobTitle": "Web Developer",
		"nameFirst": "Juan",
		"nameLast": "Devincenzi",
		"nameMiddle": "",
		"organization": "Cu2 Cloud Tec Store SL",
		"phone": "+34.622526505"
	  },
	  "contactBilling": {
		"addressMailing": {
		  "address1": "Carrer de Sant Joan de la Salle",
		  "address2": "8",
		  "city": "Barcelona",
		  "country": "ES",
		  "postalCode": "08022",
		  "state": "Barcelona"
		},
		"email": "web@ucloudstore.com",
		"fax": "",
		"jobTitle": "Web Developer",
		"nameFirst": "Montse",
		"nameLast": "Grau",
		"nameMiddle": "",
		"organization": "Cu2 Cloud Tec Store SL",
		"phone": "+34.622526505"
	  },
	  "contactRegistrant": {
		"addressMailing": {
		  "address1": "Carrer de Sant Joan de la Salle",
		  "address2": "8",
		  "city": "Barcelona",
		  "country": "ES",
		  "postalCode": "08022",
		  "state": "Barcelona"
		},
		"email": "web@ucloudstore.com",
		"fax": "",
		"jobTitle": "Web Developer",
		"nameFirst": "Juan",
		"nameLast": "Devincenzi",
		"nameMiddle": "",
		"organization": "Cu2 Cloud Tec Store SL",
		"phone": "+34.622526505"
	  },
	  "contactTech": {
		"addressMailing": {
		  "address1": "Carrer de Sant Joan de la Salle",
		  "address2": "8",
		  "city": "Barcelona",
		  "country": "ES",
		  "postalCode": "08022",
		  "state": "Barcelona"
		},
		"email": "jdevincenzi@ucloudstore.com",
		"fax": "",
		"jobTitle": "Web Developer",
		"nameFirst": "Jonatan",
		"nameLast": "Castroviejo",
		"nameMiddle": "",
		"organization": "Cu2 Cloud Tec Store SL",
		"phone": "+34.622526505"
	  },
	  "domain": "'.$domain.'",
	  "nameServers": [
		"ns50.domaincontrol.com",
		"ns60.domaincontrol.com"
	  ],
	  "period": 1,
	  "renewAuto": true
	}';

	$header = array(
		'Authorization: sso-key '.$key.':'.$secret.'',
		"Content-Type: application/json",
		'Accept: application/json'
	);
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $GODADDY_API_CONNECTION_TIMEOUT);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Values: GET, POST, PUT, DELETE, PATCH, UPDATE 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body_content);
	//curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	//execute call and return response data.
	$response = curl_exec($ch);
	//close curl connection
	curl_close($ch);

    if ($TESTING_MODE) {
        return true;    //BYPASS TEST
    }
	// decode the json response
	$response = json_decode($response, true);
    if (isset($response['code'])) {
        log_add("3000", json_encode($response));
        return false;
    } else {
        $price = ($response['total']/1000000).$response['currency'];
        $array_result = array('orderId'=>$response['orderId'], 'price'=>$price);
        log_add("3100", json_encode($array_result));
        return true;
    }
}

//
//END GODADDY
//

//
//GOOGLE ACCOUNT:
//


//GET OAUTH TOKEN WITH SERVICE ACCOUNT
function google_get_global_token() {
    global $GOOGLE_API_CLIENT_ID, $GOOGLE_API_APP_NAME, $GOOGLE_API_JSON_KEY_PATH, $GOOGLE_API_OAUTH2_SCOPES;

    try {
        //https://developers.google.com/console/help/#service_accounts
        $client = new Google_Client();
        $client->setApplicationName($GOOGLE_API_APP_NAME);
        $client->setAuthConfig($GOOGLE_API_JSON_KEY_PATH);
        $client->setAccessType('offline');
        $client->setRedirectUri('http://localhost/result.php');
        $client->setPrompt('select_account consent');

        $tokenPath = 'token_workspace.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        } else {
            log_add("4002");
        }

        $client->setScopes($GOOGLE_API_OAUTH2_SCOPES);
        $client->setClientId($GOOGLE_API_CLIENT_ID);

        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                log_add("4101");
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                log_add("4001");
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }

        // Get the json encoded access token.
        $token = $client->getAccessToken();

        log_add("4100");
        return $token;
    } catch(Exception $e) {
        log_add("4000", $e);
        exit_software();
    }
    
}

//GET OBJECT Google_Client FROM LIBRARY USING THE SERVICE ACCOUNT'S KEY.
function google_get_client($google_global_token) {
    global $GOOGLE_API_ADMIN_EMAIL, $GOOGLE_API_OAUTH2_SCOPES, $DOMAIN;

    try {
        $client = new Google_Client();
        $client->setAccessToken($google_global_token);
        $client->setSubject($GOOGLE_API_ADMIN_EMAIL."@".$DOMAIN);
        $client->setScopes($GOOGLE_API_OAUTH2_SCOPES);

        log_add("4110");
        return $client;
    } catch(Exception $e) {
        log_add("4010", $e);
        exit_software();
        return null;
    }
}

//DISCOVER IF DOMAIN FREE OR NOT
function is_google_domain_available($reseller_service) {   
    global $DOMAIN;

    //return true;    //BYPASS TEMPORAL.

    try {
        $response = $reseller_service->customers->get($DOMAIN);
        log_add("4020", $DOMAIN);
        return false;   //User already exists.
    } catch(Google_Service_Exception $e) {
        if ($e->getErrors()[0]['reason'] == 'notFound') {
            log_add("4120");
            return true;    //User available.
        } else {
            log_add("4021", $e);
            exit_software();    //Excepción no controlada.
        }
    }
}

//GET ACCOUNT VERIFICATION TOKEN
function google_get_site_verification_token($verification_service) {
    global $DOMAIN;

    try {
        // https://developers.google.com/site-verification/v1/getting_started#tokens
        $body =
        new Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest([
        'verificationMethod' => 'DNS_TXT',
        'site' => [
            'type' => 'INET_DOMAIN',
            'identifier' => $DOMAIN
        ]
        ]);
        $response = $verification_service->webResource->getToken($body);
        //print_r ($response);
        //if response correct:
        log_add("4130");
        return $response;
        //else:
        //log_add("4030", $response);
        //return null;
    } catch(Exception $e) {
        log_add("4031", $e);
        return null;
    }
}

//CREATE NEW INSTANCE OF CUSTOMER IN WORKSPACE.
function google_create_customer_resource($reseller_service) {
    global $DOMAIN, $GOOGLE_API_CUSTOMER_ALTERNATE_EMAIL, $GOOGLE_API_CUSTOMER_FIRST_NAME, $GOOGLE_API_CUSTOMER_LAST_NAME, $GOOGLE_API_CUSTOMER_ORGANIZATION_NAME, $GOOGLE_API_CUSTOMER_COUNTRY_CODE, $GOOGLE_API_CUSTOMER_POSTAL_CODE;

    try {
        $customer = new Google_Service_Reseller_Customer([
        'customerDomain' => $DOMAIN,
        'alternateEmail' => $GOOGLE_API_CUSTOMER_ALTERNATE_EMAIL,
        'postalAddress' => [
            'contactName' => $GOOGLE_API_CUSTOMER_FIRST_NAME . ' ' . $GOOGLE_API_CUSTOMER_LAST_NAME,
            'organizationName' => $GOOGLE_API_CUSTOMER_ORGANIZATION_NAME,
            'countryCode' => $GOOGLE_API_CUSTOMER_COUNTRY_CODE,
            'postalCode' => $GOOGLE_API_CUSTOMER_POSTAL_CODE
        ]
        ]);
        
        if (!$TESTING_MODE) {
            $response = $reseller_service->customers->insert($customer);
        }
        //print_r ($response);
        //print_r ($response);
        //if response correct:
        log_add("4140");
        return true;    //everything Ok
        //else:
        //log_add("4040", $response);
        //return false;
    } catch (Exception $e) {
        log_add("4041", $e);
        return false;
    }
}

//CREATE FIRST ADMIN USER IN WORKSPACE.
function google_create_first_admin_user($directory_service) {
    global $DOMAIN, $GOOGLE_API_ADMIN_EMAIL, $GOOGLE_API_CUSTOMER_FIRST_NAME, $GOOGLE_API_CUSTOMER_LAST_NAME, $GOOGLE_API_CUSTOMER_CONTACT_NAME;

    $generated_admin_password = generate_admin_password();

    try {
        $admin_email = $GOOGLE_API_ADMIN_EMAIL . '@' . $DOMAIN;
        $user = new Google_Service_Directory_User([
        'primaryEmail' => $admin_email,
        'password' => hash("sha1", $generated_admin_password),
        'name' => [
            'givenName' => $GOOGLE_API_CUSTOMER_FIRST_NAME,
            'familyName' => $GOOGLE_API_CUSTOMER_LAST_NAME,
            'fullName' => $GOOGLE_API_CUSTOMER_FIRST_NAME . ' ' . $GOOGLE_API_CUSTOMER_LAST_NAME
        ]
        ]);
        
        if (!$TESTING_MODE) {
            $response = $directory_service->users->insert($user);
            //print_r ($response);

            // Promote user to admin status
            $make_admin = new Google_Service_Directory_UserMakeAdmin([
            'status' => true
            ]);
            $directory_service->users->makeAdmin(
                $admin_email,
                $make_admin
            );
        }

        //print_r ($response);
        //if response correct:
        log_add("4150");
        return true;    //everything Ok
        //else:
        //log_add("4050", $response);
        //return false;
    } catch (Exception $e) {
        log_add("4051", $e);
        return false;
    }
}

function generate_admin_password() {
    global $PASSWORD_GENERATION_MINIMUM_LENGTH, $PASSWORD_GENERATION_MAXIMUM_LENGTH, $PASSWORD_GENERATION_PERMITTED_CHARS;

    $password_length = random_int($PASSWORD_GENERATION_MINIMUM_LENGTH, $PASSWORD_GENERATION_MAXIMUM_LENGTH);
    $generated_password = substr(str_shuffle($PASSWORD_GENERATION_PERMITTED_CHARS), 0, $password_length);
    log_add("6000", $generated_password);
    return $generated_password;
}

//CREATE SUBSCRIPTION FOR THIS WORKSPACE ACCOUNT
function google_create_subscription($reseller_service) {
    global $DOMAIN, $GOOGLE_API_PLAN, $GOOGLE_API_NUMBER_USERS, $GOOGLE_API_RENEWAL_TYPE;

    try {
        $subscription = new Google_Service_Reseller_Subscription([
        'customerId' => $DOMAIN,
        'skuId' => '1010020027',
        'plan' => [
            'planName' => $GOOGLE_API_PLAN
        ],
        'seats' => [
            'numberOfSeats' => $GOOGLE_API_NUMBER_USERS
        ],
        'renewalSettings' => [
            'renewalType' => $GOOGLE_API_RENEWAL_TYPE
        ]
        ]);
        
        if (!$TESTING_MODE) {
            $response = $reseller_service->subscriptions->insert(
                $DOMAIN,
                $subscription
            );
        }
        //print_r ($response);
        //if response correct:
        log_add("4160");
        return true;    //everything Ok
        //else:
        //log_add("4060", $response);
        //return false;
    } catch (Exception $e) {
        log_add("4061", $e);
        return false;
    }
}

//DESIGNATE DOMAIN OWNERS IN GCLOUD.
function google_verify_and_designate_domain_owners($verification_service) {
    global $DOMAIN, $GOOGLE_API_ADMIN_EMAIL, $GOOGLE_API_CUSTOMER_SITE;
    
    try {
        $site = new Google_Service_SiteVerification_SiteVerificationWebResourceResourceSite();
        $site->setIdentifier($GOOGLE_API_CUSTOMER_SITE);
        $site->setType('SITE');
        $request = new Google_Service_SiteVerification_SiteVerificationWebResourceResource();
        $request->setSite($site);
        $response = $verification_service->webResource->insert('FILE', $request);
        print_r($response);
        //print_r ($response);
        //if response correct:
        log_add("4170");
        return true;    //everything Ok
        //else:
        //log_add("4070", $response);
        //return false;
    } catch (Exception $e) {
        log_add("4071", $e);
        return false;
    }
}

//
//END GOOGLE ACCOUNT
//



//Se llama a este método con logs que registrar aciertos y errores a lo largo de toda la ejecución.
//Este método decide si almacena los códigos basándose en las siguientes pautas clave:
//      $REGISTER_LOG debe ser true.
//      En caso de que el programa esté en modo depuración almacena todos los códigos.
//      En caso contrario descarta todos los códigos de aciertos, almacenando así solo los de error.
function log_add($code, $extra_data="") {
    global $SOFTWARE_STATUS_DEBUG, $SUCCESS_LOG_CODES, $array_log;

    //Si no está en modo depuración comparo si algún número contenido en $SUCCESS_LOG_CODES coincide con los primeros dos número (sección de clasificación) del código almacenado..
    if (!$SOFTWARE_STATUS_DEBUG) {
        for ($i = 0; $i <count($SUCCESS_LOG_CODES) ; $i++) {
            if ($SUCCESS_LOG_CODES[$i] == substr($code, 0, 2)) {
                exit();
            }
        }
    }
    $extra_data = str_replace("%", "%25", $extra_data);
    $extra_data = str_replace(" ", "%20", $extra_data);
    $extra_data = str_replace("&", "%26", $extra_data);
    $extra_data = str_replace("=", "%3D", $extra_data);
    array_push($array_log, "$code=$extra_data");
}

function exit_software() {
    global $array_log, $RETURN_LOG_CODES, $SOFTWARE_STATUS_DEBUG;

    //REGISTROS EN LA BASE DE DATOS:

    //LLAMADA ASÍNCRONA AL FICHERO DE LOG
    //shell_exec("php ./logs.php ".array_log_to_url($array_log)." > /dev/null 2>/dev/null &");    // " > /dev/null 2>/dev/null &" se usa para que funcione de forma asincrona.
    echo shell_exec("php ./logs.php ".array_log_to_url($array_log));
    
    //RETORNAR AL CLIENTE:
    //      Si el software está en modo debug retorna todo, si no retorna los guardados en $RETURN_LOG_CODES
    if (!$SOFTWARE_STATUS_DEBUG) {
        for ($i = (count($array_log)-1); $i>=0; $i--) {    
            for ($j = 0; $j <count($RETURN_LOG_CODES); $j++) {
                if ($RETURN_LOG_CODES[$j] == substr($array_log[$i], 0, 2)) {
                    unset($array_log[$i]);
                }
            }
        }
    }
    echo json_encode($array_log);
    
    exit();
}

function array_log_to_url($array_log) {
    $result = "";
    for($i = 0; $i < count($array_log); $i++) {
        $result .= $array_log[$i]." ";
    }
    return $result;
}
?>
