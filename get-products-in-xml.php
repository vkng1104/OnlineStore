<?php
// Connect to database
include('./database/db_helper.php');
$pdo = connectToDatabase();

// Check if a search query is provided
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

try {
    // Modify the SQL query to include the search condition
    $stmt = $pdo->prepare("SELECT * FROM products WHERE productName LIKE :searchQuery");
    $stmt->bindValue(':searchQuery', "%$searchQuery%", PDO::PARAM_STR);
    $stmt->execute();

    // Fetch products as an associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the XML response
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<products>';
    foreach ($products as $product) {
        echo '<product>';
        echo '<productName>' . htmlspecialchars($product['productName']) . '</productName>';
        echo '<price>' . htmlspecialchars($product['price']) . '</price>';
        echo '<image>' . htmlspecialchars($product['image']) . '</image>';
        echo '<sales>' . htmlspecialchars($product['sales']) . '</sales>';
        echo '</product>';
    }
    echo '</products>';
} catch (PDOException $e) {
    die("Error retrieving products: " . $e->getMessage());
}
