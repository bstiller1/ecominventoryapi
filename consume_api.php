<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body { margin: 15px; }
        </style>
</head>
<body>
    
</body>
</html>
<?php
// Define our route target
$api_url = "http://localhost:3000/api/products";
// Setup Request options
$options = [
    "http" => [
        "method" => "GET",
        "header" => "Content-Type: application/json\r\n" . "Accept: application/json\r\n",
        "timeout" => 5 // Stop waiting after 5 seconds
    ]
];

// Create the stream context
$context = stream_context_create($options);
// Fetch the data
$response = @file_get_contents($api_url, false, $context);
// Error handling & processing
if ($response === FALSE){
    $error = error_get_last();
    echo "<h3>Error: Unable to connect to API</h3>";
    echo "<p>" . htmlspecialchars($error['message']) . "</p>";
} else {
    // Decode JSON string into PHO associative array
    $data = json_decode($response, true);

    // Check if JSON is valid
    if (json_last_error() === JSON_ERROR_NONE) {
        renderUI($data);
    } else {
        echo "Error: Received invalid JSON format";
    }
}
// Function to render into HTML
function renderUI($products){
    echo "<h3>Product Catalog</h3>";
    echo "<div style='display:flex; gap: 20px; flex-wrap: wrap;'>";

    foreach($products as $item) {
        echo "<div style='border: 1px solid #ccc; padding: 15px; border-radius: 8px; width: 200px;'>
        <h4>" . htmlspecialchars($item['name']) . "</h4>
        <p><strong>Price:</strong> $" .number_format($item['price'], 2) . "</p>
        <p><strong>Stock:</strong> " . (int)$item['stock_count'] . "</p>
        <p><em>" . htmlspecialchars($item['description']) . "</em></p></div>";
    }
}
?>
</body>
</html>