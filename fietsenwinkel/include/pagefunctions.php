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
        $menu .= "<a href='index.php?page=adminmenu'>Admin menu</a>";
    if (isset($_SESSION['login'])) {
        $menu .= "<a href='index.php?page=uitloggen>Uitloggen</a>";
    } else {
        $menu .= "<a href='index.php?page=inloggen'>Inloggen</a>";
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



function getSection()
{
    $page = getPage();
    
    switch ($page) {

        case "home":
            $section = "dit is de home pagina";
            break;
        case "inloggen":
            include("userfunctions.php");
            $section = login();
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
