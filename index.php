<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomar Fotografía</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #video {
            width: 100%;
            height: auto;
        }

        #canvas {
            display: none;
        }

        #photo {
            display: none;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Tomar Fotografía</h1>
        <div class="text-center">
            <video id="video" playsinline autoplay></video>
            <canvas id="canvas"></canvas>
            <img id="photo" alt="Tu Fotografía">
        </div>
        <div class="text-center mt-3">
            <button id="snap" class="btn btn-primary">Tomar Foto</button>
            <button id="upload" class="btn btn-success" disabled>Subir Foto</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photo = document.getElementById('photo');
        const snap = document.getElementById('snap');
        const upload = document.getElementById('upload');
        const context = canvas.getContext('2d');

        // Acceder a la cámara
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(stream => {
                video.srcObject = stream;
                video.play();
            })
            .catch(err => {
                console.error("Error al acceder a la cámara: ", err);
            });

        // Tomar la foto
        snap.addEventListener('click', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
            const data = canvas.toDataURL('image/png');
            photo.setAttribute('src', data);
            photo.style.display = 'block';
            upload.disabled = false;
        });

        // Subir la foto
        upload.addEventListener('click', () => {
            const dataUrl = canvas.toDataURL('image/png');
            $.ajax({
                type: 'POST',
                url: 'upload.php',
                data: {
                    imgBase64: dataUrl
                }
            }).done(response => {
                alert('Foto subida con éxito.');
            }).fail(error => {
                console.error('Error al subir la foto:', error);
            });
        });
    </script>
</body>

</html>