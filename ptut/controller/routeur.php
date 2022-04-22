<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once 'ControllerJoueur.php';
$action = $_GET['action'];
ControllerJoueur::$action(); 
?>