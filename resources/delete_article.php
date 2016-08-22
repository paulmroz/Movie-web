<?php
include('../database/db_connect.php');

if ( isset($_GET['id']) ) {
	$id=$_GET['id'];
	$statment = $mysqli->prepare("DELETE FROM articles WHERE id = ? LIMIT 1");
	$statment->bind_param("i",$id);
	$statment->execute();
	$statment->close();
	header("Location:  ../pages/movie.php");
}