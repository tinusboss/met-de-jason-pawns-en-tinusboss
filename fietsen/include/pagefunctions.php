<?php
function getHeader()
{
    $header =  "Dit is de fietsen pagina";
    if ($_SESSION['login']) {
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
    if (checkRole(1)) {
        $menu .= "<a href='index.php?page=fietsen'>Fietsen</a>";
    }
    if (checkRole(2)) {
        $menu .= "<a href='index.php?page=bestellen'>Bestellen</a>";
    }
    if (checkRole(8)) {
        $menu .= "<a href='index.php?page=adminmenu'>Admin menu</a>";
        $menu .= "<a href='index.php?>page=test'>Test</a>";
    }
    if ($_SESSION['login']) {
        $menu .= "<a href='include/html/user/login.php?>page=inloggen'>Inloggen</a>";
    } else {
        $menu .= "<a href='index.php?>page=uitoggen'>Uitloggen</a>";
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
    $section = "";
    switch ($page) {
        case "home":
            $section = "Dit is de inhoud van de fietsen pagina.";
            break;
        case "fietsen":
            $fietsen = getFietsen();
            $section = showFietsen($fietsen);
            break;
        case "inloggen":
            $section = "Dit is de inhoud van de inlog pagina.";
            break;
        case "test":
            include("inlude/html/test/html");
            break;
        default;
            $section = "Deze pagina bestaat niet";
    }
    return $section;
}
