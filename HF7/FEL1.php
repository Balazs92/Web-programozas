<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Számkitaláló Játék</title>
</head>
<body>

<h2>Találd ki a számot 1 és 100 között!</h2>

<form method="POST" action="">
    <label for="guess">Add meg a tipped:</label>
    <input type="number" name="guess" id="guess" min="1" max="100" required>
    <input type="submit" value="Ellenőrzés">
</form>

<?php

if (!isset($_COOKIE['random_number'])) {
    $random_number = rand(1, 100);
    setcookie('random_number', $random_number, time() + 3600);
    echo "<p>Új szám generálva!</p>";
} else {
    $random_number = $_COOKIE['random_number'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guess'])) {
    $guess = (int)$_POST['guess'];

    if ($guess < $random_number) {
        echo "<p>A megadott szám túl kicsi! Próbáld újra.</p>";
    } elseif ($guess > $random_number) {
        echo "<p>A megadott szám túl nagy! Próbáld újra.</p>";
    } else {
        echo "<p>Gratulálok! Eltaláltad a számot: $random_number</p>";
        setcookie('random_number', '', time() - 3600);
    }
}
?>

</body>
</html>
