<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include "db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];


    $sql = "INSERT INTO hallgtaok (nev, szak, atlag) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);

    if ($stmt) {

        $stmt->bind_param("ssd", $nev, $szak, $atlag);


        if ($stmt->execute()) {
            echo "Új hallgató sikeresen hozzáadva!";
        } else {
            echo "Hiba történt: " . $stmt->error;
        }


        $stmt->close();
    } else {
        echo "Hiba történt az előkészített utasítás létrehozásakor: " . $con->error;
    }


    $con->close();

    echo "<br><a href='listazas.php'>Vissza a főoldalra</a>";
} else {
    ?>

    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Új Hallgató Hozzáadása</title>
    </head>
    <body>
    <h2>Új Hallgató Hozzáadása</h2>
    <form action="bevitel.php" method="POST">
        <label for="nev">Név:</label>
        <input type="text" id="nev" name="nev" required><br><br>

        <label for="szak">Szak:</label>
        <input type="text" id="szak" name="szak" required><br><br>

        <label for="atlag">Átlag:</label>
        <input type="number" step="0.01" id="atlag" name="atlag" required><br><br>

        <input type="submit" value="Hozzáadás">
    </form>
    </body>
    </html>

    <?php
}
?>
