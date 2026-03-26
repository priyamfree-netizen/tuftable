<?php
$pdo = new PDO('pgsql:host=localhost;dbname=laravel', 'postgres', '2653');

echo "=== PRINTERS TABLE COLUMNS ===\n";
$stmt = $pdo->query("SELECT column_name, data_type FROM information_schema.columns WHERE table_name='printers' ORDER BY ordinal_position");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['column_name']} => {$row['data_type']}\n";
}

echo "\n=== PRINTERS DATA ===\n";
$stmt = $pdo->query("SELECT id, name, printing_choice, kots, orders, branch_id, is_default FROM printers");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID:{$row['id']} | {$row['name']} | {$row['printing_choice']} | kots:{$row['kots']} | orders:{$row['orders']} | branch:{$row['branch_id']} | default:{$row['is_default']}\n";
}

echo "\n=== KOT_PLACES TABLE ===\n";
$stmt = $pdo->query("SELECT column_name, data_type FROM information_schema.columns WHERE table_name='kot_places' ORDER BY ordinal_position");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['column_name']} => {$row['data_type']}\n";
}

echo "\n=== MULTIPLE_ORDERS TABLE ===\n";
$stmt = $pdo->query("SELECT column_name, data_type FROM information_schema.columns WHERE table_name='multiple_orders' ORDER BY ordinal_position");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['column_name']} => {$row['data_type']}\n";
}
