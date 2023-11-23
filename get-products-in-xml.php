<?php
include('./database/db_helper.php');
$pdo = connectToDatabase();

try {
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output XML header
    header('Content-Type: application/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<products>';

    // Output each product as XML
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
