<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php
    define('BASEPATH', true);
    require '../../dbfunctions.php';

    if (isset($_POST['submit'])) {
        try {
            $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $user = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $pass = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

            $sql = "SELECT COUNT(username) AS num FROM admin WHERE username = :username";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':username', $user);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['num'] > 0) {
                echo '<script>alert("Gebruikersnaam bestaat al!")</script>';
            } else {

                $stmt = $dsn->prepare("INSERT INTO admin (username, email, password) 
    VALUES (:username,:email, :password)");
                $stmt->bindParam(':username', $user);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $pass);



                if ($stmt->execute()) {
                    echo '<script>alert("Nieuw account gemaakt. Je kan nu inloggen.")</script>';

                    echo '<script>window.location.replace("login.php")</script>';
                } else {
                    echo '<script>alert("We zijn een error tegengekomen ")</script>';
                }
            }
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("' . $error . '");</script>';
        }
    }

    ?>
    <h1>Registreren</h1>


    <form action="register.php" method="post">
        <input type="text" required="required" name="username" placeholder="Gebruikersnaam">
        <input required="required" type="email" name="email" placeholder="Email">
        <input required="required" type="password" name="password" placeholder="Wachtwoord">
        <button name="submit" type="submit">registreer</button>
        <p>Heb je al een account? <a href="login.php">Klik hier</a></p>
    </form>

</body>

</html>

<?php

?>