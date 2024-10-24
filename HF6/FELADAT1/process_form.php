<?php

$firstName = $lastName = $email = $tshirt = "";
$attend = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['firstName'])) {
        $errors[] = "The first name is required.";
    } else {
        $firstName = htmlspecialchars($_POST['firstName']);
    }


    if (empty($_POST['lastName'])) {
        $errors[] = "The last name is required.";
    } else {
        $lastName = htmlspecialchars($_POST['lastName']);
    }


    if (empty($_POST['email'])) {
        $errors[] = "The email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['attend'])) {
        $errors[] = "You must select at least one event to attend.";
    } else {
        $attend = $_POST['attend'];
    }


    $tshirt = htmlspecialchars($_POST['tshirt']);


    if (isset($_FILES['abstract']) && $_FILES['abstract']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['abstract']['tmp_name'];
        $fileName = $_FILES['abstract']['name'];
        $fileSize = $_FILES['abstract']['size'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExtensions = ['pdf'];
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[] = "Only PDF files are allowed for abstract.";
        }

        if ($fileSize > 3 * 1024 * 1024) { // 3MB max
            $errors[] = "File size exceeds the maximum allowed size of 3MB.";
        }
    } else {
        $errors[] = "You must upload an abstract.";
    }


    if (!isset($_POST['terms'])) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    if (empty($errors)) {
        echo "<h2>Registration Details</h2>";
        echo "<p><strong>First Name:</strong> $firstName</p>";
        echo "<p><strong>Last Name:</strong> $lastName</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Attending:</strong> " . implode(", ", $attend) . "</p>";
        echo "<p><strong>T-Shirt Size:</strong> $tshirt</p>";
    }
}
?>

<h3>Online conference registration</h3>
<form method="POST" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName" value="<?php echo $firstName; ?>">
    </label><br><br>

    <label for="lname"> Last name:
        <input type="text" name="lastName" value="<?php echo $lastName; ?>">
    </label><br><br>

    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email; ?>">
    </label><br><br>

    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1" <?php if(in_array("Event1", $attend)) echo 'checked'; ?>>Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2" <?php if(in_array("Event2", $attend)) echo 'checked'; ?>>Event 2<br>
        <input type="checkbox" name="attend[]" value="Event3" <?php if(in_array("Event3", $attend)) echo 'checked'; ?>>Event 3<br>
        <input type="checkbox" name="attend[]" value="Event4" <?php if(in_array("Event4", $attend)) echo 'checked'; ?>>Event 4<br>
    </label><br><br>

    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P" <?php if ($tshirt == "P") echo 'selected'; ?>>Please select</option>
            <option value="S" <?php if ($tshirt == "S") echo 'selected'; ?>>S</option>
            <option value="M" <?php if ($tshirt == "M") echo 'selected'; ?>>M</option>
            <option value="L" <?php if ($tshirt == "L") echo 'selected'; ?>>L</option>
            <option value="XL" <?php if ($tshirt == "XL") echo 'selected'; ?>>XL</option>
        </select>
    </label><br><br>

    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label><br><br>

    <input type="checkbox" name="terms" <?php if (isset($_POST['terms'])) echo 'checked'; ?>> I agree to terms & conditions.<br><br>

    <input type="submit" name="submit" value="Send registration">
</form>

<?php

if (!empty($errors)) {
    echo "<h3>Errors:</h3>";
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
}
?>
