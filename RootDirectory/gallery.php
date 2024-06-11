<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Nagłówek -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="navbar-brand" href="index.html">
                        <img src="images/logo.png" alt="Adelina" height="80">
                    </a></li>
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary nav-link mx-2" href="materials.html">Materiały</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary nav-link mx-2" href="techniques.html">Techniki</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary nav-link mx-2" href="projects.html">Projekty</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary nav-link mx-2" href="tips.html">Triki</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary nav-link mx-2" href="gallery.html">Galeria</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="search-section py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj obrazy...">
                </div>
                <div class="col-md-2">
                    <select id="materialFilter" class="form-select">
                        <option value="">Wszystkie materiały</option>
                        <option value="jersey">Jersey</option>
                        <option value="dresówka">Dresówka</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" onclick="filterImages()">Szukaj</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Sekcja Galeria -->
    <section class="gallery-section py-5">
        <div class="container">
            <div class="row" id="galleryContainer">
                <?php
                $dir = 'images/materials/';
                $files = array_diff(scandir($dir), array('.', '..'));

                foreach ($files as $file) {
                    $filePath = $dir . $file;
                    $fileTitle = pathinfo($file, PATHINFO_FILENAME);
                    echo "
                    <div class='col-md-4 gallery-item' data-material='' data-title='$fileTitle'>
                        <a href='$filePath' data-lightbox='gallery' data-title='$fileTitle'>
                            <img src='$filePath' class='img-fluid' alt='$fileTitle'>
                        </a>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Stopka -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Adelina. Wszelkie prawa zastrzeżone.</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Lightbox JS -->
    <script src="path/to/lightbox.js"></script>
    <!-- Custom JS -->
    <script>
        function filterImages() {
            var input, filter, select, materialFilter, gallery, items, title, material, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            select = document.getElementById('materialFilter');
            materialFilter = select.value.toUpperCase();
            gallery = document.getElementById('galleryContainer');
            items = gallery.getElementsByClassName('gallery-item');

            for (i = 0; i < items.length; i++) {
                title = items[i].getAttribute('data-title').toUpperCase();
                material = items[i].getAttribute('data-material').toUpperCase();

                if ((title.indexOf(filter) > -1 || filter === "") && (material.indexOf(materialFilter) > -1 || materialFilter === "")) {
                    items[i].style.display = '';
                } else {
                    items[i].style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>
