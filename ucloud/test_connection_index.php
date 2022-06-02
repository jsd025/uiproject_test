<?php

//$ch = curl_init("https://ucloud-dev-01.uc.r.appspot.com/");
$ch = curl_init("localhost/index.php?code=4%2F0AX4XfWhHPfgdx-apGmH7k4o7Y5RxpqikSLuQECecEtR8ySLDhMLD_BUElTUhhedoTglafQ");

// ESTRUCTURA
    //Root: token, user, password, paydata(array), domain(array), google_subscription (array), is_test, datetime
    //paydata: woo_commerce_id, total_paid_amount, paid_iva, currency, pay_method, facturation_type, pay_timestamp
    //domain: is_domain_purchase, is_domain_available_check, domain.
    //google_subscription: is_google_account_purchase, is_google_account_available_check, customer_site, admin_email, alternate_email,
    //              first_name, last_name, organization_name, country_code, postal_code, plan, number_users, renewal_type.
// FIN ESTRUCTURA

// return the transfer as a string, also with setopt()
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$array_paydata = array('woo_commerce_id'=>'213123', 'total_paid_amount'=>'10.23', 'paid_iva'=>'2.31', 'currency'=>'euro', 'pay_method'=>'credit card', 'facturation_type'=>'anual', 'pay_timestamp'=>time());
$array_domain = array('is_domain_purchase' => false, 'is_domain_available_check' => false);
$array_google_subscription = array('is_google_account_purchase' => true, 'is_google_account_available_check' => true, 'customer_site' => 'www.freeTest5.com', 'admin_email' => 'admin', 'alternate_email' => 'jdevincenzi@ucloudstore.com', 'first_name' => 'Juan Sebastian', 'last_name' => 'Devincenzi', 'organization_name' => 'Ucloud Store', 'country_code' => 'ES', 'postal_code' => '08011', 'plan' => 'ANNUAL', 'number_users' => '1', 'renewal_type' => 'ANNUAL');
$fields = array('token' => '6udqamA3Uj2wCApzAzDkYrGUKkndZF7NakvpPdjAvqYqM4nDBWaVKQkcP7bVKzTK', 'user' => '6452354345234', 'password' => 'n;m{U&25F74EieH?},Gzn4b5+', 'domain' => 'freeTest5.com', 'is_test' => true, 'datetime' => time(), 'paydata' => http_build_query($array_paydata), 'domain_purchase' => http_build_query($array_domain), 'google_subscription' => http_build_query($array_google_subscription));
$fields_string = http_build_query($fields);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
// curl_exec() executes the started curl session
// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($ch);

echo $output;

?>