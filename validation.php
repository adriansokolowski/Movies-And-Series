<?php

require_once("config.php");
$username = "";
$email = "";



if (isset($_GET['username'])) {
    
    
    $account = $source->get($_GET['username']);

    if ( !preg_match('/^[a-zA-Z0-9@.+_-]*$/', $_GET['username'])) {
        $error = "Your username contains one or more invalid characters";
    } elseif (strlen($_GET['username']) < 3 || strlen($_GET['username']) > 16)
    {
        $error = "Usernames must be between 3 and 16 characters long";
    } elseif (is_array($account)) {
        $error = $_GET['username']. " is already registered by another member";
    } else {
        $error = "";
    }
    echo $error;
}

if (isset($_GET['email'])) {
    $account = $source->getAllByEmail($_GET['email']); 
    if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
        $error = "Your email contains one or more invalid characters";
    } elseif (is_array($account) ) {
        $error = "Email already taken";
    } else {
        $error = "";
    }
    

    echo $error;
}

