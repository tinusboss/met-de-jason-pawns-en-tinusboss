<?php 
    function getHeader() {
        return "Dit is de header";
    }
    function getFooter() {
        return "Dit is de footer";
    }
    function getNav() {
        $menu = "<a href='index.php'>Home</a>";
        $menu .= "<a href='fietsen.php?>page=Fietsen'>Fietsen</a>";
        $menu .= "<a href='index.php?>page=menu'>bestellen</a>";
        $menu .= "<a href='index.php?>page=fietsen'>Admin menu</a>";
        $menu .= "<a href='index.php?>page=test'>Test</a>";
        $menu .= "<a href='include/html/user/login.php?>page=inloggen'>Inloggen</a>";

        return $menu;
    }
    function getAside() {
        return "Dit is de zijkant";
    }
    function getPage() {
        if ( isset ( $_GET["page"])){
            $page = $_GET["page"];
        } else {
            $page = "home";
        }
        return $page;
    }
    function getSection() {
        $page = getPage();
        $section = "";
        switch($page){
            case "home":
                $section = "Dit is de inhoud van de home pagina.
                <br><br><br>Welkom
                <br><br><br>Welkom
                <br><br><br>Welkom";
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