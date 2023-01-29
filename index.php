<?php
    
    //this is where the page starts

    //start session
    session_start();

    //check if user is login already otherwise send to login page
    if (isset($_SESSION['user_type']) == 'admin'){
        header('location: dashboard.php');
    }
    else{
        header('location: login/login.php');
    }

?>