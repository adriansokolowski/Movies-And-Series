<?php
    /*database settings */
    $config['database']['hostname'] = 'localhost';
    $config['database']['username'] = 'root';
    $config['database']['password'] = '';
    $config['database']['database'] = 'mas';

    try {
        $db = new PDO("mysql:host=".$config['database']['hostname'].";dbname=". $config['database']['database'], $config['database']['username'], $config['database']['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }


    include('class/class_account.php');
    $source = new Account($db); 
?>