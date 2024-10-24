

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztrációs űrlap</title>
</head>
<body>
<h2>Regisztrációs űrlap</h2>
<form method="POST" action="">
    <label for="name">Név:</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Jelszó:</label>
    <input type="password" name="password" id="password" required><br><br>

    <label for="confirm_password">Jelszó megerősítése:</label>
    <input type="password" name="confirm_password" id="confirm_password" required><br><br>

    <label for="dob">Születési dátum:</label>
    <input type="date" name="dob" id="dob" required><br><br>

    <label>Nem:</label><br>
    <input type="radio" name="gender" value="Férfi" required> Férfi<br>
    <input type="radio" name="gender" value="Nő" required> Nő<br>
    <input type="radio" name="gender" value="Egyéb" required> Egyéb<br><br>

    <label>Érdeklődési területek:</label><br>
    <input type="checkbox" name="interests[]" value="Sport"> Sport<br>
    <input type="checkbox" name="interests[]" value="Művészet"> Művészet<br>
    <input type="checkbox" name="interests[]" value="Tudomány"> Tudomány<br><br>

    <label for="country">Ország:</label>
    <select name="country" id="country">
        <option value="">Válassz országot</option>
        <option value="Magyarország">Magyarország</option>
        <option value="Románia">Románia</option>
        <option value="Szlovákia">Szlovákia</option>
    </select><br><br>

    <input type="submit" name="submit" value="Regisztráció">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    if (empty($_POST["name"])) {
        $errors[] = "A név mező nem lehet üres.";
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Az e-mail cím formátuma érvénytelen.";
    }

    $password = $_POST["password"];
    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[\W]/", $password)) {
        $errors[] = "A jelszónak legalább 8 karakterből kell állnia, tartalmaznia kell egy nagybetűt, egy számot és egy speciális karaktert.";
    }

    if ($password !== $_POST["confirm_password"]) {
        $errors[] = "A jelszó és a jelszó megerősítése nem egyezik.";
    }

    if (empty($_POST["dob"])) {
        $errors[] = "A születési dátum érvénytelen.";
    }

    if (!empty($errors)) {
        echo "<h3>Hibák:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {

        echo "<h3>Regisztráció sikeres!</h3>";
        echo "<p><strong>Név:</strong> " . htmlspecialchars($_POST["name"]) . "</p>";
        echo "<p><strong>E-mail:</strong> " . htmlspecialchars($_POST["email"]) . "</p>";
        echo "<p><strong>Születési dátum:</strong> " . htmlspecialchars($_POST["dob"]) . "</p>";
        echo "<p><strong>Nem:</strong> " . htmlspecialchars($_POST["gender"]) . "</p>";

        if (!empty($_POST["interests"])) {
            echo "<p><strong>Érdeklődési területek:</strong> " . implode(", ", $_POST["interests"]) . "</p>";
        }

        if (!empty($_POST["country"])) {
            echo "<p><strong>Ország:</strong> " . htmlspecialchars($_POST["country"]) . "</p>";
        }
    }
}
?>
</body>
</html>
