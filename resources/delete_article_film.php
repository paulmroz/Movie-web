<?php
include('../database/db_connect.php');

if (isset($_GET['id']) ) {
	$id=$_GET['id'];
	$statement = $mysqli->prepare("DELETE FROM articles_film WHERE id = ? LIMIT 1");
	$statement->bind_param("i",$id);
	$statement->execute();
	$statement->close();
	header("Location:  ../pages/film.php");
}