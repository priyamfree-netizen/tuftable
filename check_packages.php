<?php
$pdo = new PDO('pgsql:host=localhost;dbname=laravel', 'postgres', '2653');

echo "=== RESTAURANTS ===\n";
$stmt = $pdo->query("SELECT r.id, r.name, r.package_id, p.package_name, r.license_expire_on, r.trial_ends_at FROM restaurants r LEFT JOIN packages p ON p.id = r.package_id ORDER BY r.id");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "R[{$row['id']}] {$row['name']} => Pkg: {$row['package_name']} (ID: {$row['package_id']}) | License: {$row['license_expire_on']} | Trial: {$row['trial_ends_at']}\n";
}
