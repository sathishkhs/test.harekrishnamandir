<?php

$config['company_name'] = 'Hare Krishna Mandir, Ahmedabad';
$config['description'] = 'Hare Krishna Mandir is run by Hare Krishna Movement Ahmedabad, a trust registered at Ahmedabad with registration number E/18436/AHMEDABAD on 05/05/2008.';
$config['image'] = 'image/path';


    $config['payment_mode'] = 'test';

if($config['payment_mode'] == 'test'){
    //Test Server 
    $config['keyId'] = 'rzp_test_SmWM5M8JOK8Y0c';
    $config['keySecret'] = 'VkflHfm4oFp2Q9nz04qAn43A';
    $config['displayCurrency'] = 'INR';
    $config['table_name'] = 'test_payments';

}else{
    //LIve Server 
    $config['keyId'] = 'rzp_live_3yUFCqtgGuo7NA';
    $config['keySecret'] = 'DcvIaL6Ik8Efaguckf1IWMgo';
    $config['displayCurrency'] = 'INR';
    $config['table_name'] = 'payments';

}

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
