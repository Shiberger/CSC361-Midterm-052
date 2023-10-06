<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $dateOfBirth = $_POST["birthday"];
    $mobile = $_POST["mobile"];

    // Perform form validation
    $errors = [];

    if (empty($username) || !filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (strlen($password) < 8 || $password !== $repassword) {
        $errors[] = "Password must be at least 8 characters and match the re-password.";
    }

    if (!preg_match('/^\+66\d{9}$/', $mobile)) {
        $errors[] = "Mobile phone number must start with +66 and contain 9 digits.";
    }

    // Display errors or success message
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
        echo "<p>Registration successful:</p>";
        echo "<p>Username: $username</p>";
        echo "Date of Birth: $dateOfBirth";
        echo "<p>Mobile Phone: $mobile</p>";
    }
} else {
    echo "Invalid request method.";
}
?>
