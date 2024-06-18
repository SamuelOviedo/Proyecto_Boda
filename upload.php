<?php
include("config.php");
include("firebaseBoda.php");

if (isset($_POST['imgBase64'])) {
    $data = $_POST['imgBase64'];
    $userId = isset($_POST['userId']) ? $_POST['userId'] : 'anonimo'; // Default userId if not provided

    // Obtener la parte de los datos de la imagen
    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);

    // Decodificar los datos
    $data = base64_decode($data);

    // Crear una instancia de firebaseBoda
    $conn = new firebaseBoda($dataBaseURL);

    // Asignar un nombre único a la imagen
    $imageName = uniqid();

    // Crear el objeto de datos para almacenar en Firebase
    $imageData = [
        'userId' => $userId,
        'imageData' => base64_encode($data),
        'timestamp' => time()
    ];

    // Insertar la imagen en la base de datos de Firebase
    $result = $conn->insert("images", $imageData);

    if ($result) {
        echo 'Imagen subida con éxito a Firebase: ' . $imageName;
    } else {
        echo 'Error al subir la imagen a Firebase.';
    }
} else {
    echo 'No se recibió ninguna imagen';
}
