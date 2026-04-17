<?php
// include DB config
include 'db.php';

// DSN String
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// Options for PDO error handling
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

try {
    // Establish Connection
    $pdo = new PDO($dsn, $user, $pass, $options);
    // Prepare and execute query
    $stmt = $pdo->query("SELECT id , name, price, stock_count, description FROM products");
    // Fetch all products into an array
    $products = $stmt->fetchAll();
} catch (PDOException $e){
    die("Database Connection Failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body { margin: 15px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #333; color: white; }
        tr:hover { background-color: #f1f1f1; }
    .stock_low { color: #d95344; font-weight: bold; }
    </style>
</head>
<body>
    <h3>Current Product Inventory</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
                        <td>$<?= number_format($row['price'], 2) ?></td>
                        <td class="<?= $row['stock_count'] < 5 ? 'stock_low' : '' ?>">
                            <?= htmlspecialchars($row['stock_count']) ?></td>
                            <td><?= htmlspecialchars($row['description']) ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No Products Found</td>
                </tr>
                <?php endif; ?>
        </tbody>
    </table>
<tbody>
</body>
</html>