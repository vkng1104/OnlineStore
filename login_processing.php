<?php
include('./includes/config_session.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to database
    include('./database/db_helper.php');
    $pdo = connectToDatabase();

    // Replace with your SQL query to fetch the user based on the provided username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Authentication successful
        $_SESSION['user_id'] = $user['userID'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_level'] = $user['level'];

        // Set cookies for user_id and user_name
        setcookie('user_name', $user['username'], time() + 3600, '/');

        // Redirect the user to the home
        header("Location: index.php?page=home");
        exit();
    } else {
        // Authentication failed
        $error = 'Incorrect username or password';
        header("Location: index.php?page=login&username={$username}&error={$error}");
        exit();
    }
} else {
    // If the request method is not POST, redirect to the login form
    header("Location: index.php?page=login");
    exit();
}
