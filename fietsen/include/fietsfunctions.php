

<?php
function ConnectDB()
{

    $dbhost = "localhost";
    $dbname = "s157472_fietsenwinkel";
    $user = "s157472_fietsenwinkel";
    $pass = "fietsen";


    try {
        $database = new
            PDO("mysql:host=$dbhost;dbname=$dbname", $user, $pass);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $database;
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "<br />Verbinding NIET gemaakt";
    }
}
?>

<?php

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM fietsen");
    $stmt->execute();



    // set resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $k => $v) {
        if (substr_count($v['tags'], '') > 0) {
            echo "" . $v['merk'] . "";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
