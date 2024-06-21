<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio de Boda</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>
    <?php include './widgets/header.php'; ?>
    <main class="container">
        <section id="home" class="text-center my-5">
            <div class="">
                <!-- Espacio para imagen principal -->
                <h1 class="display-4">Bienvenidos a Nuestra Boda</h1>
                <p class="lead">Fecha: Domingo 7 de Julio</p>
                <p class="lead">Ubicación: Colegio de abogados</p>
            </div>
        </section>
        <section id="about" class="my-5">
            <h2 class="text-center">Sobre Nosotros</h2>
            <p class="text-center">Nuestra historia...</p>
            <!-- Espacio para imagen sobre la pareja -->
        </section>
        <section id="gallery" class="my-5">
            <h2 class="text-center">Galería</h2>
            <div class="row">
                <!-- Espacios para imágenes de la galería -->
                <div class="col-6 col-md-3 mb-4">
                    <div class="gallery-item bg-tertiary p-4 rounded"></div>
                </div>
                <div class="col-6 col-md-3 mb-4">
                    <div class="gallery-item bg-tertiary p-4 rounded"></div>
                </div>
                <div class="col-6 col-md-3 mb-4">
                    <div class="gallery-item bg-tertiary p-4 rounded"></div>
                </div>
                <div class="col-6 col-md-3 mb-4">
                    <div class="gallery-item bg-tertiary p-4 rounded"></div>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-light text-center py-3">
        <p>&copy; 2024 Nuestra Boda</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>