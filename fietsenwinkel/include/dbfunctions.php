<?php

function dBConnect() {

    if ($_SERVER['SERVER_NAME'] == "localhost"){
        
        DEFINE( "USER", "root");
        DEFINE( "PASSWORD", "");
        DEFINE( "HOST", "localhost");
        DEFINE( "DBNAME", "fietsenwinkel");
    } else {

        DEFINE( "USER", "157947.ao-alkmaar.nl/fietsenwinkel");
        DEFINE( "PASSWORD", "fietsenwinkel");
        DEFINE( "HOST", "localhost");
        DEFINE( "DBNAME", "s157947_fietsenwinkel");
    }

    try {
        $connString = "mysql:host=" . HOST . ";dbname=" . DBNAME;
        $conn = new PDO( "$connString" , USER, PASSWORD );
        $conn ->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    } catch( PDOException $e ) {
        echo $e->getMessage();
        echo "Kon geen verbinding maken";
    }

}
