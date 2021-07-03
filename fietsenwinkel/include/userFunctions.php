<?php
function getHeader()
{
    $header =  "U bent ingelogd ";
    if ($_SESSION['login']) {
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
        $header .= " - Welkom: $username ($role)";
    }
    return $header;
}
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    $_SESSION['username'] = "";
    $_SESSION['role'] = 0;
}

function login()
{
    if (isset($_POST['inloggen'])) {
        $username = check_input($_POST['username']);
        $password = check_input($_POST['password']);
        if (checkUserPassword($username, $password)) {
            echo "U bent ingelogd.";
            header('Refresh:2; url=index.php');
        } else {
            echo "Er is iets fout gegaan tijdens het inloggen";
            header('Refresh:2; url:index.php?page=inloggen');
        }
    } else {
        include("include/html/user/login.html");
    }
}

function checkUser($username)
{
    if ($username <> "") {
        $conn = include('dbfunctions.php');
        $sql = "select * from admin where username";
        $sql = "SELECT * FROM admin WHERE username='$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();
        foreach ($users as $user) {
            if ($username == $user['username']) {
                return true;
            } else {
                return false;
            }
        }
    } else {
        return false;
    }
}

function getSection()
{
    $page = getPage();
    $section = "";
    switch ($page) {
        case "home";
        case "fietsen";
        case "adminmenu";
        case "showFiets";
        case "editFiets";
        case "delFiets";
        case "addFiets";
        case "inloggen";
            $section = login();
            break;
        case "registreren";
            $section = register();
            break;
        case "uitloggen";
            $section = logout();
            break;
        case "bestellen";
        case "test":
        default:
    }
    return $section;
}

function checkUserPassword($username, $password)
{
    if (($username <> "") && ($password <> "")) {
        $conn = include('dbfunctions.php');
        $sql = "SELECT * FROM admin WHERE username='$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();
        foreach ($users as $user) {
            $passwordHash = $user['password'];
            if (password_verify($password, $passwordHash)) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                return true;
            } else {
                return false;
            }
        }
        $conn = NULL;
    } else {
        return false;
    }
}

function checkRole($role)
{
    if ($_SESSION['role'] >= $role) {
        return true;
    } else {
        return false;
    }
}

function register()
{
    if (isset($_POST['register'])) {
        $username = check_input($_POST['username']);

        if (checkUser($username)) {
            echo "Gebruiker bestaal al.";
            header('Refresh:5 url=index.php?page=registreren');
        } else {
            $conn = include('dbfunctions.php');
            $stmt = $conn->prepare("INSERT INTO gebruikers (username, password, role) VALUES (:username, :password :role)");

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role',$role);

            $username = check_input($_POST['username']);
            $password = check_input($_POST['password']);
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $role = 1;
        }
    } else {
        include("include/html/user/register.html");
    }
}

function logout()
{
    $_SESSION['login'] = false;
    $_SESSION['username'] = "";
    $_SESSION['role'] = 0;

    if (!($_SESSION['login'] == true)) {
        echo "u bent ingelogd.";
    } else {
        echo "probleem met uitloggen";
    }
    header('Refresh:2; url=index.php');
}

