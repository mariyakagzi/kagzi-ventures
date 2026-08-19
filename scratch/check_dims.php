<?php
$s1 = getimagesize(__DIR__ . '/../public/assets/images/banners/home-slide-1.jpg');
$s2 = getimagesize(__DIR__ . '/../public/assets/images/banners/home-slide-2.jpg');
echo "Slide 1: " . $s1[0] . "x" . $s1[1] . "\n";
echo "Slide 2: " . $s2[0] . "x" . $s2[1] . "\n";
