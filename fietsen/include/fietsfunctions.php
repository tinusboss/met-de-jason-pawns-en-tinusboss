<?php 
    function dBConnect() {

        if ($_SERVER['SERVER_NAME'] == "localhost"){
            
            DEFINE( "USER", "ROOT");
            DEFINE( "PASSWORD", "");
            DEFINE( "HOST", "localhost");
            DEFINE( "DBNAME", "fietsenwinkel");
        } else {

            DEFINE( "USER", "157472.ao-alkmaar.nl/fietsenwinkel");
            DEFINE( "PASSWORD", "fietsenwinkel");
            DEFINE( "HOST", "localhost");
            DEFINE( "DBNAME", "fietsenwinkel");
        }

        try {
            $connString = "mysql:host=" . HOST . ";dbname=fietsenwinkel" . DBNAME;
            $conn = new PDO( "$connString" , USER, PASSWORD );
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conn;
        } catch( PDOException $e ) {
            echo $e->getMessage();
            echo "Kon geen verbinding maken";
        }

    }
    function getHeader() {
        return "Dit is de fietsen pagina";
    }
    function getFooter() {
        return "Dit is de footer";
    }
    function getNav() {
        $menu = "<a href='index.php'>Home</a>";
        $menu .= "<a href='fietsen.php?>page=Fietsen'>Fietsen</a>";
        $menu .= "<a href='index.php?>page=menu'>Menu2</a>";
        $menu .= "<a href='index.php?>page=fietsen'>Fietsen</a>";
        $menu .= "<a href='index.php?>page=test'>Test</a>";
        $menu .= "<a href='index.php?>page=inloggen'>Inloggen</a>";

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
    function getFietsen() {
        $conn=DBconnect();
        $query = "SELECT * FROM fietsen";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fietsen = $stmt->fetchall();
        return $fietsen;
    }
    function showFietsen($fietsen) {
        $overzichtFietsen = "";
        foreach($fietsen as $fiets){
            $overzichtFietsen .=$fiets['merk'] . " - " . $fiets['type'] . "<br>";
        }
        return $overzichtFietsen;
    }

?>