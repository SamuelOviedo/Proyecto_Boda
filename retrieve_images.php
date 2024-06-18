<?php
include("config.php");
include("firebaseBoda.php");

$conn = new firebaseBoda($dataBaseURL);

// Recuperar todas las imágenes de Firebase
$imagesData = $conn->retrieve("images");
$images = json_decode($imagesData, true);

$imagesList = [];
foreach ($images as $imageId => $image) {
    $imagesList[] = [
        'userId' => $image['userId'],
        'imageData' => $image['imageData'],
        'timestamp' => $image['timestamp']
    ];
}

// Devolver los datos como JSON
header('Content-Type: application/json');
echo json_encode($imagesList);
