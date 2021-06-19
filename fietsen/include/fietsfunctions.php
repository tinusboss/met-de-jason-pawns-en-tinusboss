<?php 
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