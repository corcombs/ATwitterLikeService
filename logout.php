<?php
    session_start();
    session_destroy();
    unset($_SESSION['user_id'], $_SESSION['user_firstname'], $_SESSION['user_lastname'], $_SESSION['loginMsg'],  $_SESSION['loggedIn']);
    $user_id = "";
    $user_firstname = "";
    $user_lastname = "";
    $loginMsg = "";
    $loggedIn = "";
    
    
    header("Location: index.html");
    exit();
?>
