<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <h1>Registreren</h1>
    <form method='post' action="">
        <label>Username</label>
        <input type="text" name="username" required /><br>

        <label>Password</label>
        <input type="password" name="password" required /><br>
        <input type="submit" name="register" value="register" /><br>
    </form>

    <p>---</p>
    <p>Als u al een account hebt kunt u hier inloggen.
        <a href="index.php?page=inloggen">Inloggen</a>
    </p>
</body>

</html>

<?php
session_start();
include("../../formfunctions.php");
include("../../pagefunctions.php");
include("../../userfunctions.php");
include("../../fietsfunctions.php");

?>