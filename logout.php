<?php
require_once 'settings.php';
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['email']);
header('location: '.'/index.php');

?>