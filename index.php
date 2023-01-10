<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PDO CRUD</title>
</head>
<body>
    <h1>PDO CRUD</h1>

    <form action="create.php" method="post">
        <label for="brand">merk</label><br>
        <input type="text" name="brand" id="brand"><br>

        <label for="model">modelen</label><br>
        <input type="text" name="model" id="model"><br>

        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname"><br>

        <input type="submit" value="Verstuur">
    </form>
</body>
</html>