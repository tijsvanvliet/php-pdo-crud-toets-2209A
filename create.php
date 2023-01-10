<?php
// var_dump($_POST);exit();
include('config.php');

// DSN staat voor data sourcename.
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    echo "Er is een verbinding met de database";
} catch(PDOException $e) {
    echo "Er is helaas geen verbinding met de database.<br>
          Neem contact op met de Administrator<br>";
    echo "Systeemmelding: " . $e->getMessage();
}
// Maak de sql query voor het inserten van een record
$sql = "INSERT INTO Persoon (Id
                            ,merk
                            ,modelen
                            ,topsnelheid
                            ,prijs)
        VALUES              (NULL
                            ,:brand
                            ,:model
                            ,:topspeed
                            ,:price);";
// Maak de query gereed met de prepare-method van het $pdo-object
$statement = $pdo->prepare($sql);
$statement->bindValue(':brand', $_POST['brand'], PDO::PARAM_STR);
$statement->bindValue(':model', $_POST['model'], PDO::PARAM_STR);
$statement->bindValue(':topspeed', $_POST['topspeed'], PDO::PARAM_STR);
$statement->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
// Vuur de query af op de database...
$statement->execute();



