<?php
 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
 
try{
    require_once 'includes/config.php';
    require_once 'libs/php_sdk/facebook.php';
    
    $db = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'], $config['db_user'], $config['db_pass']);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $db->query('SET NAMES utf8');
    
    $facebook = new Facebook(array(
        'appid' => $config['app_id'],
        'secret' => $config['app_secret'] 
    ));
    
    $actions = array('home', 'users', 'city', 'movies', 'friends');
    
    if(isset($_REQUEST['action']) && in_array($_REQUEST['action'], $actions)){    
    
        include('includes/'.$_REQUEST['action'].'.php');
    
    }
    
    else{
        include('includes/home.php');
    }
     
}
catch (Exception $e){
    printf("<pre>%s</pre>", print_r($e,1));
}
?>