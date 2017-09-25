<?php
require_once './autoload.php';
try{

    session_destroy();
    header('location: login.php');
    
} catch (Exception $ex) {
    die('Error: '  . $ex->getMessage());
}