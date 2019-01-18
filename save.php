<?php
echo "<pre>";print_R($_POST['data']);echo "</pre>";
die();
$data = $_POST['data'];
$data = substr($data,strpos($data,",")+1);
$data = base64_decode($data);
$file = $_POST['code'].'.png';
file_put_contents($file, $data);
echo "Success!";
?>