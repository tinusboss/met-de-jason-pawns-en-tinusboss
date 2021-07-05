<?php
function pdo_connect_mysql() {
    // $DATABASE_HOST = 'localhost';
    // $DATABASE_USER = 'root';
    // $DATABASE_PASS = '';
    // $DATABASE_NAME = 'phpcrud';

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 's157472_fietsenwinkel';
    $DATABASE_PASS = 'fietsen';
    $DATABASE_NAME = 's157472_fietsenwinkel';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="title">
    	<div>
    		<h1>Welkom op de fietsmakerpagina</h1>
    	</div>
    </nav>
    <div class="navbar">
        <a href="read.php"><i class="fas fa-bicycle"></i>Fietsen</a>
    	<a href="../index.php?loguit='1'"><i class="fas fa-door-open"></i>Loguit</a>
    </div>
EOT;
}
function template_footer() {
echo <<<EOT
   
    </body>
    <footer>Dit is de footer</footer>
</html>
EOT;
}
