<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'config.php';

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // if($mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME)){
    //     echo "ok";
    // }else{
    //    error_log("błąd");
    // }
    //ECHO "<hr>".$mysqli->connect_errno;

    if($mysqli->connect_error){
        die("Błąd połączenia: " . $mysqli->connect_error);
    }