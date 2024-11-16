<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include "db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    // Előkészített SQL utasítás
    $sql = "UPDATE hallgtaok SET nev=?, szak=?, atlag=? WHERE id=?";
    $stmt = $con->prepare($sql);

    if ($stmt) {

        $stmt->bind_param("ssdi", $nev, $szak, $atlag, $id);


        if ($stmt->execute()) {
            header("Location: listazas.php");
        } else {
            echo "Hiba történt: " . $stmt->error;
        }


        $stmt->close();
    } else {
        echo "Hiba történt az előkészített utasítás létrehozásakor: " . $con->error;
    }


    $con->close();
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];


        $sql = "SELECT * FROM hallgtaok WHERE id=?";
        $stmt = $con->prepare($sql);

        if ($stmt) {

            $stmt->bind_param("i", $id);


            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();


            $stmt->close();
        } else {
            echo "Hiba történt az előkészített utasítás létrehozásakor: " . $con->error;
        }

        $con->close();
    } else {
        echo "Hiba történt: az 'id' paraméter hiányzik.";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    Név:<input type="text" name="nev" value="<?php echo htmlspecialchars($row["nev"]); ?>"><br>
    Szak:<input type="text" name="szak" value="<?php echo htmlspecialchars($row["szak"]); ?>"><br>
    Átlag:<input type="text" name="atlag" value="<?php echo htmlspecialchars($row["atlag"]); ?>"><br>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
    <input type="submit" name="submit" value="Elküld">
</form>
