<?php 
    session_start();
    include_once("../fietsen/include/dbfunctions.php");
    include_once("../fietsen/include/formfunctions.php");
    include_once("../fietsen/include/pagefunctions.php");
    include_once("../fietsen/include/userfunctions.php");
    include_once("../fietsen/include/fietsenfunctions.php");

    include("include/layout.php");

    function dBConnect() {

    if ($_SERVER['SERVER_NAME'] == "localhost"){
            
            DEFINE( "USER", "ROOT");
            DEFINE( "PASSWORD", "");
            DEFINE( "DBNAME", "fietsenwinkel");
            DEFINE( "HOST", "localhost");
        } else {

            DEFINE( "USER", "157472.ao-alkmaar.nl/fietsenwinkel");
            DEFINE( "PASSWORD", "fietsenwinkel");
            DEFINE( "HOST", "localhost");
            DEFINE( "DBNAME", "fietsenwinkel");
        }

        try {
            $connString = "mysql:host=" . HOST . ";dbname=fietsenwinkel" . DBNAME;
            $conn = new PDO( "$connString" , USER, PASSWORD );
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conn;
        } catch( PDOException $e ) {
            echo $e->getMessage();
            echo "Kon geen verbinding maken";
        }

    }