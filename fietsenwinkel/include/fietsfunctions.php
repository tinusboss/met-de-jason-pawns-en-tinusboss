<?php
function getFietsen()
{

}

function showFietsen($fietsen)
{ 
    {
        // xampp datebase
        // $dsn = "mysql:host=localhost;dbname=fietsenwinkel";
        // $username = "root";
        // $password = "";

        // ao-alkmaar datebase 
        $dsn = "mysql:host=localhost;dbname=s157472_fietsenwinkel";
        $username = "s157472_fietsenwinkel";
        $password = "fietsen";

        // Verbinding maken met de PDO-class, en een table maken met alle informaties die vanuit datebase (schepen) opgehaald zijn.
        try {

            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $merk = $conn->prepare("SELECT * FROM fietsen LIMIT 6 ");


            $merk->execute();
        } catch (PDOException $e) {
            echo "Faild" . $e->getMessage();
        }
    }
    foreach ($merk->fetchAll() as $k => $v) { ?>
        <div class="fietsen">

            <ul class="list-group ">
                <li class="list-group-item">
                    <p class="p1">
                        <b>Merk:</b>
                        <?php echo $v['merk'] ?>
                    </p>
                </li>
                <li class="list-group-item">
                    <p class="p1">
                        <b>Type:</b>
                        <?php echo $v['type'] ?>
                    </p>
                </li>
            </ul>

        </div>
<?php
    }
}


