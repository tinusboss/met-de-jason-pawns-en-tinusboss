<?php
include('dbfunctions.php');
function getFietsen(){
try {

    $conn = dbConnect();


    $merk = $conn->prepare("SELECT * FROM fietsen LIMIT 6 ");


    $merk->execute();
    return $merk;
} catch (PDOException $e) {
    echo "Faild" . $e->getMessage();
}
    
}

function showFietsen($fietsen)
{ 
// Verbinding maken met de PDO-class, en een table maken met alle informaties die vanuit datebase (schepen) opgehaald zijn.
       
    foreach ($fietsen as $fiets) { ?>
        <div class="fietsen">

            <ul class="list-group ">
                <li class="list-group-item">
                    <p class="p1">
                        <b>Merk:</b>
                        <?php echo $fiets['merk'] ?>
                    </p>
                </li>
                <li class="list-group-item">
                    <p class="p1">
                        <b>Type:</b>
                        <?php echo $fiets['type'] ?>
                    </p>
                </li>
            </ul>

        </div>
<?php
    }
}


