<?php

    require_once '../classes/hotelrooms.class.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged_id'])){
        header('location: ../login/login.php');
    }
    //if the above code is false then code and html below will be executed
    $hotelrooms = new Hotelrooms;
    if(isset($_GET['id'])){
        if($hotelrooms->delete($_GET['id'])){
            //redirect user to program page after saving
            header('location: hotel-rooms.php');
        }
    }
?>