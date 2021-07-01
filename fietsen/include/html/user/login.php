<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/fietsenwinkel.css">
    <title>Login</title>
</head>

<body>
    <h1>Inloggen</h1>
    <form method='post' action="">
        <label>Username</label>
        <input type='text' name='username' required /><br />

        <label>Password</label>
        <input type='password' name='password' required /><br />
        <input type='submit' name='Inloggen' value='inloggen'>
    </form>
    <p>- - -</p>
    <p>Heeft u nog geen account dan kunt u zich hier registreren.
        <a href="register.php?page=registreren">registreren</a>
    </p>
</body>
<?php
    define('BASEPATH', true);
    require 'db.php';

    if (isset($_POST['submit'])) {
        // try {
        $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //kijken of niet alles leeg is
        $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
        $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

        $sql = "SELECT id, username, password FROM admin WHERE username = :username";
        $stmt = $pdo->prepare($sql);

        //Bind value.
        $stmt->bindValue(':username', $username);

        //Execute.
        $stmt->execute();

        //Fetch row.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //of $row fout is 
        if ($user === false) {
            echo '<script>alert("Foute gebruikersnaam of wachtwoord")</script>';
        } else {

            //vergelijk en ontcijfer het wachtwoord
            $validPassword = password_verify($passwordAttempt, $user['password']);

            //Als $validPassword is TRUE, Is de login gelukt
            if ($validPassword == 1) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                echo '<script>window.location.replace("ingelogd/reken.php");</script>';
            } else {
                //$validPassword was FALSE. Wachtwoord die matcht niet
                echo '<script>alert("invalid gebruikersnaam of wachtwoord")</script>';
            }
        }
    }

    ?>

</html>
<?php
include("../../dbfunctions.php");
include("../../formfunctions.php");
include("../../pagefunctions.php");
include("../../userfunctions.php");
include("../../fietsfunctions.php");

?>