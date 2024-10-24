<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    if (empty($_POST['firstName'])) {
        $errors[] = "The first name is required.";
    }
    if (empty($_POST['lastName'])) {
        $errors[] = "The last name is required.";
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }

    if (empty($_POST['attend'])) {
        $errors[] = "You must select at least one event to attend.";
    }

    if (isset($_FILES['abstract']) && $_FILES['abstract']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['abstract']['tmp_name'];
        $fileName = $_FILES['abstract']['name'];
        $fileSize = $_FILES['abstract']['size'];
        $fileType = $_FILES['abstract']['type'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExtensions = ['pdf'];
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[] = "Only PDF files are allowed for abstract.";
        }

        if ($fileSize > 3 * 1024 * 1024) {
            $errors[] = "File size exceeds the maximum allowed size of 3MB.";
        }
    } else {
        $errors[] = "You must upload an abstract.";
    }

    if (!isset($_POST['terms'])) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {

        echo "<p>First Name: " . htmlspecialchars($_POST['firstName']) . "</p>";
        echo "<p>Last Name: " . htmlspecialchars($_POST['lastName']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p>Attending: " . implode(", ", $_POST['attend']) . "</p>";
        echo "<p>T-Shirt Size: " . htmlspecialchars($_POST['tshirt']) . "</p>";
    }
}
?>
