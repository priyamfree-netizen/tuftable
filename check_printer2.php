<?php
$pdo = new PDO('pgsql:host=localhost;dbname=laravel', 'postgres', '2653');

echo "=== ORDER_PLACES TABLE ===\n";
$stmt = $pdo->query("SELECT column_name, data_type FROM information_schema.columns WHERE table_name='order_places' ORDER BY ordinal_position");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['column_name']} => {$row['data_type']}\n";
}

echo "\n=== ORDER_PLACES DATA ===\n";
$stmt = $pdo->query("SELECT * FROM order_places LIMIT 10");
$cols = [];
for ($i = 0; $i < $stmt->columnCount(); $i++) {
    $cols[] = $stmt->getColumnMeta($i)['name'];
}
echo implode(' | ', $cols) . "\n";
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    echo implode(' | ', array_map(fn($v) => $v ?? 'NULL', $row)) . "\n";
}

echo "\n=== PRINTERS ALL COLUMNS ===\n";
$stmt = $pdo->query("SELECT column_name, data_type FROM information_schema.columns WHERE table_name='printers' ORDER BY ordinal_position");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['column_name']} => {$row['data_type']}\n";
}
