<?php

session_start();
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <div id="top">
            <div class="wrapper">
                <div id="logo">
                    <a href="./index.php" class="lime">Logo</a>
                </div>
                <div class="nav-items">
                    <a href="./login.php" class="lime">Log In</a> |
                    <a href="./register.php">Sign Up</a>
                </div>
            </div>
        </div>
        <nav id="menu">
            <div class="wrapper">
                <div class="nav-items">
                    <a href="./memberlist.php">Home</a> |
                    <a href="./memberlist.php">Movies</a> |
                    <a href="./memberlist.php">TV Shows</a> |
                    <a href="./memberlist.php">Actors</a> |
                    <a href="./memberlist.php">Directors</a> |
                    <a href="./memberlist.php">Members</a> |
                    <a href="./profile.php">Profile</a> 
                </div>
                <div>
                    <form action="">
                        <input type="text" placeholder="Title, actor, director ...">
                        <input type="submit" value="Search">
                        </input>
                    </form>
                </div>

            </div>
        </nav>
    </header>