<?php

$config['company_name'] = 'Hare Krishna Mandir';
$config['description'] = 'Hare Krishna Mandir';
$config['image'] = 'image/path';


    $config['payment_mode'] = 'live';

if($config['payment_mode'] == 'test'){
    //Test Server 
    $config['keyId'] = 'rzp_test_SmWM5M8JOK8Y0c';
    $config['keySecret'] = 'VkflHfm4oFp2Q9nz04qAn43A';
    $config['displayCurrency'] = 'INR';


    $keyId = 'rzp_test_SmWM5M8JOK8Y0c';
    $keySecret = 'VkflHfm4oFp2Q9nz04qAn43A';
    $displayCurrency = 'INR';
}else{
    //LIve Server 
    $config['keyId'] = 'rzp_live_3yUFCqtgGuo7NA';
    $config['keySecret'] = 'DcvIaL6Ik8Efaguckf1IWMgo';
    $config['displayCurrency'] = 'INR';

    $keyId = 'rzp_live_3yUFCqtgGuo7NA';
    $keySecret = 'DcvIaL6Ik8Efaguckf1IWMgo';
    $displayCurrency = 'INR';
}

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
