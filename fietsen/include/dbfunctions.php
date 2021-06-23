<?php
session_start();
include("../../formfunctions.php");
include("../../pagefunctions.php");
include("../../userfunctions.php");
include("../../fietsfunctions.php");

include("layout.php");

function dBConnect()
{

    if ($_SERVER['SERVER_NAME'] == "localhost") {

        DEFINE("USER", "ROOT");
        DEFINE("PASSWORD", "");
        DEFINE("DBNAME", "fietsenwinkel");
        DEFINE("HOST", "localhost");
    } else {

        // DEFINE("USER", "s157472_fietsenwinkel");
        // DEFINE("PASSWORD", "fietsen");
        // DEFINE("HOST", "'s157472.ao-alkmaar/fietsenwinkel'");
        // DEFINE("DBNAME", "s157472_fietsenwinkel");
    }

    try {
        $connString = "mysql:host=" . HOST . ";dbname=fietsenwinkel" . DBNAME;
        $conn = new PDO("$connString", USER, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "Kon geen verbinding maken";
    }
}

// function ConnectDB()
// {

//     $dbhost = "localhost";
//     $dbname = "s157472_fietsenwinkel";
//     $user = "s157472_fietsenwinkel";
//     $pass = "fietsen";


//     try {
//         $database = new
//             PDO("mysql:host=$dbhost;dbname=$dbname", $user, $pass);
//         $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return $database;
//     } catch (PDOException $e) {
//         echo $e->getMessage();
//         echo "<br />Verbinding NIET gemaakt";
//     }
// }
// ?>

 <?php

// try {
//     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $stmt = $conn->prepare("SELECT * FROM fietsen");
//     $stmt->execute();



//     // set resulting array to associative
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     foreach ($stmt->fetchAll() as $k => $v) {
//         if (substr_count($v['tags'], '') > 0) {
//             echo "" . $v['merk'] . "";
//         }
//     }
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
// $conn = null;
// ?>

