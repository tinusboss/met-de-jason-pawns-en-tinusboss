<?php

defined('BASEPATH') or exit('No direct script access allowed'); //prevent direct script access
$host = 'localhost';
$user = 's157472_fietsenwinkel'; //database naam
$password = 'fietsen'; //database wachtwoord
$dbname = 's157472_fietsenwinkel'; //database naam
$dsn = '';
// $host = 'localhost';
// $user = 'root'; //database naam
// $password = ''; //database wachtwoord
// $dbname = 'bestevaer'; //database naam
// $dsn = '';

try {
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'connection failed: ' . $e->getMessage();
}
