<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include "db_connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM hallgtaok WHERE id = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Paraméter kötése (i = integer)
        $stmt->bind_param("i", $id);


        if ($stmt->execute()) {
            //echo "Record deleted successfully";
            header('Location: listazas.php');
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Hiba történt az előkészített utasítás létrehozásakor: " . $con->error;
    }

    $con->close();
}
?>
