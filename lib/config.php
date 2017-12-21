<?php
error_reporting(E_ALL ^ E_NOTICE);

$db = new PDO('mysql:host=localhost;dbname=search;', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>