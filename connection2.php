<?php 
	$dsn = 'mysql:host=localhost; dbname=house';
	$user = 'root';
	$password = '';
 

	try{
		$pdo = new PDO($dsn, $user, $password);
	}catch(PDOException $e){
		echo 'connection error! ' . $e;
	}	
?>