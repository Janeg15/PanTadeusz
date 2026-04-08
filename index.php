<?php include('header.php'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <a href="./" class="list-group-item list-group-item-action <?php echo (!isset($_GET['k'])) ? 'active' : ''; ?>">
                    Strona główna
                </a>
                <?php
                for ($k = 1; $k <= 12; $k++) {
                    $class = (isset($_GET['k']) && $_GET['k'] == $k) ? 'active' : '';
                    echo "<a href='./?k=$k' class='list-group-item list-group-item-action $class'>Księga $k</a>";
                }
                ?>
            </div>
        </div>

        <div class="col-md-8">
            <?php
            if (isset($_GET['k'])) {
                $k = $_GET['k'];
                // Sprawdzamy czy plik istnieje, żeby nie było błędu
                if (file_exists("./k$k.php")) {
                    include_once("./k$k.php");
                } else {
                    echo "<h2>Błąd: Nie znaleziono treści Księgi $k</h2>";
                }
            } else {
                // To wyświetli się na stronie głównej
                echo '<h2>Witaj w cyfrowej wersji epopei</h2>';
                echo '<img src="pantadeo.jpg" alt="Pan Tadeusz" class="img-fluid mb-4">';
                echo '<p>Wybierz odpowiednią księgę z menu po lewej stronie.</p>';
            }
            ?>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>