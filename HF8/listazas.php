<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); exit; }
include "db_connection.php";


$sql = "SELECT * FROM hallgtaok";
$stmt = $con->prepare($sql);

$stmt->execute();
$result = $stmt->get_result();


echo "<a href='bevitel.php'>Új hallgató</a><br>";


echo "<table border='1'>
<tr>
<th>ID</th>
<th>Név</th>
<th>Szak</th>
<th>Átlag</th>
<th>Műveletek</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nev"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["szak"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["atlag"]) . "</td>";
        echo "<td><a href='update.php?id=" . htmlspecialchars($row["id"]) . "'>Update</a></td>";
        echo "<td><a href='delete.php?id=" . htmlspecialchars($row["id"]) . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nincs adat</td></tr>";
}
echo "</table>";


$stmt->close();


$con->close();
?>
