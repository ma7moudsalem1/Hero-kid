<?php

//database connection
include 'db.php';

// MVC paths
$libs = 'libs/';


/* include directories */

//design template
$resourcesCss = 'resources/css/';
$resourcesJs  = 'resources/js/';
$resourcesImg  = 'resources/img/';



/* included paths */
$inc    = 'includes/template/'; // template files
$fun    = 'includes/functions/';
$pages  = 'includes/page/';
$codes  = 'includes/code/code_';


//important files
include $fun.'functions.php';
$app= getRowById('app_settings', 'app_id', 1, 1);
require $inc.'header.inc.php';
if(!isset($noNav)){ 
    require $inc.'navbar.inc.php';
}
$adminId = $_SESSION['adminId'];


