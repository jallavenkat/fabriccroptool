
<?php
// Create image instances
$src = imagecreatefrompng('image/bg.png');
$dest = imagecreatetruecolor(800, 400);

// Copy
imagecopy($dest, $src, 0, 0, 20, 13, 80, 40);

// Output and free from memory
header('Content-Type: image/png');
imagegif($dest);

imagedestroy($dest);
imagedestroy($src);

// Original image
$filename = 'image/bg.png';

// Get dimensions of the original image
list($current_width, $current_height) = getimagesize($filename);

// The x and y coordinates on the original image where we
// will begin cropping the image
$left = 50;
$top = 50;

// This will be the final size of the image (e.g. how many pixels
// left and down we will be going)
$crop_width = 200;
$crop_height = 200;

// Resample the image
$canvas = imagecreatetruecolor($crop_width, $crop_height);
$current_image = imagecreatefrompng($filename);
imagecopy($canvas, $current_image, 0, 0, $left, $top, $current_width, $current_height);
imagejpeg($canvas, $filename, 100);
?>