<?php

require_once("config.php");
$username = "";


$account = $source->get($_GET['username']);



if ($account){
    $found = 1;
} else {
    $found = 0;
}


 
 echo $found;