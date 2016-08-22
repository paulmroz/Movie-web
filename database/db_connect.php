<?php 
$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'movieweb_series';

$mysqli = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
$mysqli->set_charset("utf8");
if ( mysqli_connect_errno()) {
	echo 'Błąd bazy danych';
}