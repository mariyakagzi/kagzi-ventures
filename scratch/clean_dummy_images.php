<?php
define('ENVIRONMENT', 'development');
require __DIR__ . '/../app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/bootstrap.php';

$db = \Config\Database::connect();
$query = $db->query("SELECT id, main_image, images FROM products WHERE main_image LIKE 'uploads/products/%'");
$products = $query->getResultArray();

foreach ($products as $p) {
    if (!empty($p['images'])) {
        $decoded = json_decode($p['images'], true);
        if (is_array($decoded)) {
            $filtered = array_values(array_filter($decoded, function($img) {
                return strpos($img, 'assets/images/') === false;
            }));
            $newJson = json_encode($filtered);
            $db->query("UPDATE products SET images = ? WHERE id = ?", [$newJson, $p['id']]);
            echo "Updated Product ID " . $p['id'] . ": New images = " . $newJson . "\n";
        }
    }
}
echo "Database cleanup completed successfully.\n";
