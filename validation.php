<?php

require_once("config.php");
$username = "";

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