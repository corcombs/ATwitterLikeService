<?php

		session_start();
		
		$mysqli = mysqli_connect("mysql7.000webhost.com", "a1197785_cs450", "cs450group6", "a1197785_cs450");

        //  Store the information for the login into the variables
        $userName = trim($_POST['userName']);
        $passWord = trim($_POST['passWord']);
        
        //  Clean the information
        $clean_text_userName = mysqli_real_escape_string($mysqli, $userName);
        $clean_text_passWord = mysqli_real_escape_string($mysqli, $passWord);
        
        //  Connect to the database and check if the username exists
        //  Pull the password, id, fname, and lname at same time
        $sql = "SELECT user_id, user_firstname, user_lastname, user_pwd FROM USERS WHERE
                user_username = '".$clean_text_userName."'";
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        
        if(mysqli_num_rows($result) === 1){
            //  username exists
            while($info = mysqli_fetch_array($result)){
                $user_id = stripslashes($info['user_id']);
                $user_firstname = stripslashes($info['user_firstname']);
                $user_lastname = stripslashes($info['user_lastname']);
                $user_pwd = stripslashes($info['user_pwd']);
                if($passWord == $user_pwd){
                    //  The Password matches and the user is Authorized
                    //  Load the Session variables
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_firstname'] = $user_firstname;
                    $_SESSION['user_lastname'] = $user_lastname;
                    $_SESSION['loginMsg'] = "<br/><p style=\" color: red;\">Your are logged in!</p><br/>";
					$_SESSION['loggedIn'] = 1;
					//header("Location: account.html");
                }
                else{
                    //  Password does not match
                    $_SESSION['loginMsg'] = "<br/><p style=\" color: red;\">Your password does not match!</p><br/>";
                    //$loginAttempts++;
                    header("Location: index.html");
                    exit();
                }
            }
            header("Location: account.html");
            exit();
        }
        else{
            //  Username does not exist
            $_SESSION['loginMsg'] = "<br/><p style=\" color: red;\">The username you entered does not exist!</p><br/>";			
            header("Location: index.html");
            exit();
        }
        
    //  Close the connection to the database
    mysqli_close($mysqli);
    

?>
