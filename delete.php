<?php

	session_start();
    $user_id = $_SESSION['user_id'];
    $user_firstname = $_SESSION['user_firstname'];
    $user_lastname = $_SESSION['user_lastname'];
    $loginMsg = $_SESSION['loginMsg'];
    $loggedIn = $_SESSION['loggedIn'];
	
	
	$pid = trim($_GET['id']);
	
	//connect to database
	$connect = mysqli_connect("mysql7.000webhost.com", "a1197785_cs450", "cs450group6", "a1197785_cs450");
	
	
	$sql = "select * from POSTS where posts_id = '".$pid."'";
	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect)); 		
	$record = mysqli_fetch_assoc($result);	
	
	echo $record['posts_id'];
	$sql = "DELETE FROM POSTS WHERE posts_id = '".$record['posts_id']."'";
	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect)); 	

	Header("Location:account.html");		
?>