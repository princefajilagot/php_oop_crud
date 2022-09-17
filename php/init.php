<?php
session_start();

spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/php_oop_crud/class/'.$class.'.classes.php';
});

require_once 'function.php';
include('inc/header.inc.php');
include('inc/navbar.inc.php');
?>