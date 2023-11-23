<?php

function connectToDatabase()
{
    try {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=OnlineStore', 'root', 'mysqlKHANH1104');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->exec("CREATE DATABASE IF NOT EXISTS OnlineStore");
        // echo "Database 'OnlineStore' created successfully.";
        return $pdo;
    } catch (PDOException $e) {
        die("Error creating database: " . $e->getMessage());
    }
}


function createTables()
{
    $pdo = connectToDatabase();
    try {

        $pdo->exec("CREATE TABLE IF NOT EXISTS products (
            productID INT AUTO_INCREMENT PRIMARY KEY,
            productName VARCHAR(255) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            image VARCHAR(255) NOT NULL,
            sales INT NOT NULL
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            userID INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL,
            level VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )");

        // echo "Tables 'products' and 'users' created successfully.";
    } catch (PDOException $e) {
        die("Error creating tables: " . $e->getMessage());
    }
}

function insertSampleProduct()
{
    $pdo = connectToDatabase();

    try {
        $stmt = $pdo->prepare("INSERT INTO products (productName, price, image, sales) VALUES (?, ?, ?, ?)");

        $products = [
            ["WAVELINES SWEATER - GRAY/BLACK", 10.99, "https://product.hstatic.net/1000344185/product/2_f41300beec0542fe9874e44223a91fa8.jpg", 100],
            ["WAVELINES CARDIGAN - GRAY", 19.99, "https://product.hstatic.net/1000344185/product/2_e1428424946b4dd59a2699acbe69af66.jpg", 50],
            ["WING HOODIE - TAN", 29.99, "https://product.hstatic.net/1000344185/product/3_46d4f96381944c2fa2a158efa17b95bc.jpg", 75],
            ["TYPE BABY TEE - PINK", 12.99, "https://product.hstatic.net/1000344185/product/2_4d4c5805efc0432d9e4b57ab56be7d4d.jpg", 100],
            ["HAPPY TEE - WHITE", 18.99, "https://product.hstatic.net/1000344185/product/103a6c49-f3b6-4a06-9141-e619715747d1_81118271dfd241678090c95034ee2edc.jpeg", 50],
        ];

        foreach ($products as $product) {
            $stmt->execute($product);
        }

        // echo "Sample products inserted successfully.";
    } catch (PDOException $e) {
        die("Error inserting sample products: " . $e->getMessage());
    }
}

function existUser($email, $username)
{
    $pdo = connectToDatabase();

    try {
        // Check if the username or email already exists
        $checkUser = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email OR username = :username");
        $checkUser->bindParam(':email', $email);
        $checkUser->bindParam(':username', $username);
        $checkUser->execute();
        $userCount = $checkUser->fetchColumn();

        return ($userCount > 0);
    } catch (PDOException $e) {
        die("Error checking user existence: " . $e->getMessage());
    }

    return false;
}

function insertUser($email, $username, $password, $level)
{
    $pdo = connectToDatabase();

    if (existUser($email, $username)) {
        // User already exists
        return false;
    }

    try {
        $insertUser = $pdo->prepare("INSERT INTO users (email, username, level, password) VALUES (:email, :username, :level, :password)");

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $insertUser->bindParam(':email', $email);
        $insertUser->bindParam(':username', $username);
        $insertUser->bindParam(':level', $level);
        $insertUser->bindParam(':password', $hashedPassword);
        $insertUser->execute();

        return true;
    } catch (PDOException $e) {
        die("Error inserting user: " . $e->getMessage());
    }

    return false;
}
