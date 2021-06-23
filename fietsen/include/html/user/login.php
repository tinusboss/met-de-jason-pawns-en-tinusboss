<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

</html>
<?php
include("../../dbfunctions.php");
include("../../formfunctions.php");
include("../../pagefunctions.php");
include("../../userfunctions.php");
include("../../fietsfunctions.php");

?>