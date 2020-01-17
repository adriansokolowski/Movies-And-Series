<?php
    $title = 'Movies And Series - Log Out';
    require_once('header.php');
    $source->logOut();
    header('Location: index.php');
?>