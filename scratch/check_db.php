<?php
define('ENVIRONMENT', 'development');
require __DIR__ . '/../app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/bootstrap.php';
$db = \Config\Database::connect();
$query = $db->query('SELECT id, name, image FROM categories');
$cats = $query->getResultArray();
foreach ($cats as $c) {
    echo "ID: " . $c['id'] . " | Name: " . $c['name'] . " | Image: " . $c['image'] . "\n";
}
