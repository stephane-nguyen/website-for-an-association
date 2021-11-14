<?php

    define('HOST', 'localhost');
    define('DB_NAME', 'site');
    define('USER', 'root');
    define('PASS', '');


    try{
        //var de connexion: new PDO(url, user,pass)
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        // error message
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connect with the database: OK";
    }
    catch(PDOException $e){
        echo $e;
    }
?>