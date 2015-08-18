<?php 
	session_start(); 
	$db = mysql_connect("localhost","mistamadd001","") or die("Failed to open connection to MySQL server.");
	mysql_select_db('shop') or die('Failed to connect to database');
	$td = date("Y-m-d"); 
?> 