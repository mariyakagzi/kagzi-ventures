<?php
define('ENVIRONMENT', 'development');
require __DIR__ . '/../app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/bootstrap.php';
$db = \Config\Database::connect();
$query = $db->query('SELECT id, name, main_image, images FROM products');
$products = $query->getResultArray();
foreach ($products as $p) {
    echo "ID: " . $p['id'] . " | Name: " . $p['name'] . "\n";
    echo "  Main Image: " . $p['main_image'] . "\n";
    echo "  Images: " . $p['images'] . "\n\n";
}
