<?php
// place_order.php
session_start();
header('Content-Type: application/json');

// If db.php is in the root and this file is in script/, use '../db.php'
// If db.php is in the same folder, use 'db.php'
require_once 'db.php';

// 1. Guard check: Must be logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'You must be logged in to place an order.'
    ]);
    exit;
}

// 2. Decode incoming JSON payload from your-order.html
$data = json_decode(file_get_contents('php://input'), true);

$itemsSummary = trim($data['items_summary'] ?? '');
$totalAmount  = floatval($data['total_amount'] ?? 0);

if (empty($itemsSummary) || $totalAmount <= 0) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Cart is empty or invalid order amount.'
    ]);
    exit;
}

$userId = $_SESSION['user_id'];

// 3. Insert into MySQL database
try {
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, items_summary, total_amount) VALUES (?, ?, ?)");
    $stmt->execute([$userId, $itemsSummary, $totalAmount]);

    $newOrderId = $pdo->lastInsertId();

    echo json_encode([
        'status' => 'success',
        'message' => 'Order successfully placed!',
        'order_id' => $newOrderId
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>