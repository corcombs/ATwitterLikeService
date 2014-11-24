<?php

		session_start();
		
		$mysqli = mysqli_connect("mysql7.000webhost.com", "a1197785_cs450", "cs450group6", "a1197785_cs450");

        //  Store the information for the login into the variables
        $userName = trim($_POST['userName']);
        $passWord = trim($_POST['passWord']);
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);
        
        
        $sql = "INSERT INTO USERS (user_username, user_pwd, user_firstname, user_lastname, user_city, user_state) VALUES ('$userName','$passWord','$firstName','$lastName','$city','$state')";
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));


					//header("Location: account.html");
        header("Location: index.html");
        exit();
        
        
    //  Close the connection to the database
    mysqli_close($mysqli);
    

?>
