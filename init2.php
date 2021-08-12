<?php 
	session_start();
	include 'connection2.php';
	include 'user2.php';
	
 	global $pdo;

  	$getFromU = new User($pdo);
  
 
  	define('BASE_URL', 'http://localhost/weather/');
 ?>                                                   
 