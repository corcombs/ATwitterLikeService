<?php


		session_start();
		$userName = $_SESSION['userName'];
		
		$mysqli = mysqli_connect("mysql7.000webhost.com", "a1197785_cs450", "cs450group6", "a1197785_cs450");

        //  Store the information for the login into the variables
        $answer1 = trim($_POST['answer1']);
        $answer2 = trim($_POST['answer2']);
        $answer3 = trim($_POST['answer3']);
        $newPassWord =trim($_POST['newPassword']);
        
        //  Connect to the database and check if the username exists
        //  Pull the password, id, fname, and lname at same time
        $sql = "SELECT user_securityA1, user_securityA2, user_securityA3 FROM USERS WHERE
                user_username = '".$userName."'";
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        $record = mysqli_fetch_array($result);
        if($securityA1==$record['user_securityA1'] && $securityA2==$record['user_securityA2'] && $securityA3==$record['user_securityA3'] ){
            //  username exists
			$sql="UPDATE USERS set user_pwd = '" . $newPassWord . "' WHERE user_username = '" . $userName. "';";
            mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
            echo $newPassWord;
            $_SESSION['loginMsg'] = "<br/><p style=\" color: red;\">Your password was changed!</p><br/>";
            
			header("Location: index.html");
            exit();
        }
        else{
            //  Username does not exist
            $_SESSION['loginMsg'] = "<br/><p style=\" color: red;\">The security answers you entered did not match!</p><br/>";			
            header("Location: index.html");
            exit();
        }
        
    //  Close the connection to the database
    mysqli_close($mysqli);
    

?>
