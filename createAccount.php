<?php

		session_start();
		
		$mysqli = mysqli_connect("mysql7.000webhost.com", "a1197785_cs450", "cs450group6", "a1197785_cs450");

        //  Store the information for the into the variables
        $userName = trim($_POST['userName']);
        $passWord = trim($_POST['passWord']);
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);
        $securityQ1 = trim($_POST['securityQ1']);
        $securityA1 = trim($_POST['securityA1']);
        $securityQ2 = trim($_POST['securityQ2']);
        $securityA2 = trim($_POST['securityA2']);
        $securityQ3 = trim($_POST['securityQ3']);
        $securityA3 = trim($_POST['securityA3']);
        //save the account into the database
        $sql = "INSERT INTO USERS (user_username, user_pwd, user_firstname, user_lastname, user_city, user_state , user_securityQ1, user_securityA1, user_securityQ2, user_securityA2, user_securityQ3, user_securityA3) VALUES ('$userName','$passWord','$firstName','$lastName','$city','$state','$securityQ1','$securityA1','$securityQ2','$securityA2','$securityQ3','$securityA3')";
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));


					//header("Location: account.html");
        header("Location: index.html");
        exit();
        
        
    //  Close the connection to the database
    mysqli_close($mysqli);
    

?>
