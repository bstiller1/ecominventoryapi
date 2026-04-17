<?php
// Set headers to output JSON
header("Content-Type: application/json");

// include DB config
include 'db.php';

try {
    // Setup the PDO to securely connect to MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    // Set the error mode to expections for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Find products that are running low on stock (less than 5)
    $stmt = $pdo->prepare("SELECT id, name, stock_count FROM products WHERE stock_count < ?");
    $low_stock_threshold = 5;
    $stmt->execute([$low_stock_threshold]);
    $low_stock_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results as a JSON object
    echo json_encode([
        "status" => "success",
        "report_type" => "low_stock_alert",
        "data" => $low_stock_items
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "PHP Service Connection failed: " . $e->getMessage()]);
}

?>