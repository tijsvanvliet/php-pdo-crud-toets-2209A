<?php
/**
 * Maak een verbinding met de mysqlserver en database
 */

include('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
//echo $dsn;exit();
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Er is een verbinding met de mysql server";
    } else {
        echo "Er is een interne server error opgetreden"; 
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

/**
 * Maak een select query om de gegevens uit de tabel Persoon te halen
 */

$sql = "SELECT Id
              ,merk
              ,model
              ,topsnelheid
              ,prijs
        FROM DureAuto";

//Bereid de de query voor met de method prepare
$statement = $pdo->prepare($sql);

// Voer de query uit
$statement->execute();

// Zet de opgehaalde gegevens in een array van objecten
$result = $statement->fetchAll(PDO::FETCH_OBJ);
// var_dump($result);

$tableRows = "";

foreach($result as $info) {
    $tableRows .= "<tr>
                        <td>$info->merk</td>
                        <td>$info->model</td>
                        <td>$info->topsnelheid</td>
                        <td>$info->prijs</td>
                        <td>
                            <a href='delete.php?Id=$info->Id''>
                                <img src='img/b_drop.png' alt='cross'>
                            </a>
                        </td>
                   </tr>";
}
?>
<h3>autos</h3>

<table border='1'>
    <thead>
        <th>merk</th>
        <th>model</th>
        <th>topsnelheid</th>
        <th>prijs</th>
        <th></th>
    </thead>
    <tbody>
        <?php echo $tableRows; ?>
    </tbody>
</table>



