<?php
include "db_connection.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: listazas.php");
    } else {
        echo "Hibás felhasználónév vagy jelszó.";
    }

    $stmt->close();
    $con->close();
}
?>

<form method="post" action="login.php">
    Felhasználónév: <input type="text" name="username" required><br>
    Jelszó: <input type="password" name="password" required><br>
    <input type="submit" value="Bejelentkezés">
</form>
