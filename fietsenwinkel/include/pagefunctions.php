<?php
function getHeader()
{
    $header =  "Dit is de fietsen pagina";
    if (isset($_SESSION['login'])) {
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
        $header .= " - Welkom: $username ($role)";
    }
    return $header;
}
function getFooter()
{
    return "Dit is de footer";
}
function getNav()
{
        $menu = "<a href='index.php'>Home</a>";
        $menu .= "<a href='index.php?page=fietsen'>Fietsen</a>";
        $menu .= "<a href='index.php?page=bestellen'>Bestellen</a>";
        $menu .= "<a href='index.php?page=adminmenu'>Admin menu</a>";
        $menu .= "<a href='index.php?>page=test'>Test</a>";
    if (isset($_SESSION['login'])) {
        $menu .= "<a href='index.php?page=uitloggen>Uitloggen</a>";
    } else {
        $menu .= "<a href='include/html/user/login.php?page=inloggen'>Inloggen</a>";
    }


    return $menu;
}
function getAside()
{
    return "Dit is de zijkant";
}
function getPage()
{
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = "home";
    }
    return $page;
}

function checkRole($role)
{
    // role: 0 - guest
    // role: 1 - ingelogde gebruiker (nieuw)
    // role: 2 - ingelogde gebruiker (klant)
    // role: 3 - ingelogde gebruiker (medewerker)
    // role: 8 - ingelogde gebruiker (beheerder)
    // role: 9 - ingelogde gebruiker (admin)
    if ($_SESSION['role'] >= $role) {
        return true;
    } else {
        return false;
    }
}



function getSection()
{
    $page = getPage();
    $section = "";
    switch ($page) {

        case "home":
            
            break;
        case "inloggen":
            $section = "Dit is de inhoud van de inlog pagina.";
            break;
        case "fietsen":
            include('fietsfunctions.php');
            $fietsen = getFietsen();
            $section = showFietsen($fietsen);
            break;
        case "test":
            include("../index.php");
            break;
        default;
            $section = "Deze pagina bestaat niet";
    }
    return $section;
}
