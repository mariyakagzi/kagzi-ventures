<?php
$targetWidth = 1024;
$targetHeight = 571;

$srcFile = 'C:\Users\mariy\.gemini\antigravity-ide\brain\45d4245b-0748-46ac-8e63-bfdbbac1af13\.user_uploaded\media_1787156109298.jpg';
$dstFile = __DIR__ . '/../public/assets/images/banners/home-slide-3.jpg';

$srcImg = imagecreatefromjpeg($srcFile);
$origW = imagesx($srcImg);
$origH = imagesy($srcImg);

echo "Original Slide 3 dimensions: " . $origW . "x" . $origH . "\n";

// Create canvas matching Slide 1 & 2 (1024x571) with soft cream background #F7F3ED
$canvas = imagecreatetruecolor($targetWidth, $targetHeight);
$bgColor = imagecolorallocate($canvas, 247, 243, 237); // #F7F3ED
imagefill($canvas, 0, 0, $bgColor);

// Calculate aspect ratio scaling
$scale = min($targetWidth / $origW, $targetHeight / $origH);
$newW = (int)round($origW * $scale);
$newH = (int)round($origH * $scale);

$dstX = (int)round(($targetWidth - $newW) / 2);
$dstY = (int)round(($targetHeight - $newH) / 2);

imagecopyresampled($canvas, $srcImg, $dstX, $dstY, 0, 0, $newW, $newH, $origW, $origH);

imagejpeg($canvas, $dstFile, 95);

imagedestroy($srcImg);
imagedestroy($canvas);

echo "Successfully saved and resized home-slide-3.jpg to " . $targetWidth . "x" . $targetHeight . "!\n";
