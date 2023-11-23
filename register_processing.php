<?php
include('./database/db_helper.php'); // Adjust the path accordingly

if (isset($_SESSION['user_id'])) {
    header("Location: index.php?page=home");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert the new user into the database
    if (insertUser($email, $username, $password, "user")) {
        // Set cookies for user_id and user_name
        setcookie('user_name', $user['username'], time() + 3600, '/');

        header("Location: index.php?page=login&username={$username}");
        exit();
    } else {
        $error = "Email or username is already used.";
        header("Location: index.php?page=register&error={$error}");
        exit();
    }
}
