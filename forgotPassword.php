<?php


		session_start();
		
		$mysqli = mysqli_connect("mysql7.000webhost.com", "a1197785_cs450", "cs450group6", "a1197785_cs450");

        //  Store the information for the login into the variables
        $userName = trim($_POST['userName']);
        
        //  Connect to the database and check if the username exists
        //  Pull the password, id, fname, and lname at same time
        $sql = "SELECT user_securityQ1, user_securityQ2, user_securityQ3 FROM USERS WHERE
                user_username = '".$userName."'";
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        
        if(mysqli_num_rows($result) === 1){
            //  username exists
            $record = mysqli_fetch_array($result);
            $securityQ1=$record['user_securityQ1'];
            $securityQ2=$record['user_securityQ2'];
            $securityQ3=$record['user_securityQ3'];
            $_SESSION['questions']='<p>'.$securityQ1.'</p><input id="answer1" name="answer1" value="" type="text" /></label></br><p>'.$securityQ2.'</p><input id="answer2" name="answer2" value="" type="text" /></label></br><p>'.$securityQ3.'</p><input id="answer3" name="answer3" value="" type="text"/></label></br>';
            header("Location: changePassword.html");
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
