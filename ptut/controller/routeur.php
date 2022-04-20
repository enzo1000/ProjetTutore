<?php
session_start();
require_once 'ControllerJoueur.php';
$action = $_GET['action'];
ControllerJoueur::$action(); 
?>