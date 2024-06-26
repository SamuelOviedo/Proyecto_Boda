<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotos subidas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>
    <?php include './widgets/header.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Fotos subidas</h1>
        <div id="images-grid"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'retrieve_images.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var users = {};
                    // Agrupar imágenes por usuario
                    data.forEach(function(item) {
                        if (!users[item.userId]) {
                            users[item.userId] = [];
                        }
                        users[item.userId].push(item);
                    });

                    // Renderizar las imágenes agrupadas por usuario
                    var imagesGrid = $('#images-grid');
                    for (var userId in users) {
                        var userSection = $('<div class="user-section"></div>');
                        var userTitle = $('<div class="user-title"></div>').text('Usuario: ' + userId);
                        userSection.append(userTitle);

                        var userImages = $('<div class="user-images"></div>');
                        users[userId].forEach(function(image) {
                            var imageContainer = $('<div class="image-container"></div>');
                            var img = $('<img>').attr('src', 'data:image/png;base64,' + image.imageData);
                            var hoverInfo = $('<div class="hover-info"></div>').text('Subido el: ' + new Date(image.timestamp * 1000).toLocaleString());
                            imageContainer.append(img).append(hoverInfo);
                            userImages.append(imageContainer);
                        });

                        userSection.append(userImages);
                        imagesGrid.append(userSection);
                    }
                },
                error: function(error) {
                    console.error('Error al recuperar las imágenes:', error);
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>