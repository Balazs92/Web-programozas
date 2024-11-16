<?php
include "db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Ez a felhasználónév már létezik. Kérlek, válassz másikat.";
    } else {

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Sikeres regisztráció!";
        } else {
            echo "Hiba történt: " . $stmt->error;
        }
    }

    $stmt->close();
    $con->close();
}
?>

<form method="post" action="register.php">
    Felhasználónév: <input type="text" name="username" required><br>
    Jelszó: <input type="password" name="password" required><br>
    <input type="submit" value="Regisztráció">
</form>
