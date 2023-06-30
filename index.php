<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Projekt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles2.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col text-center text-white naslov">
                    <h1 class="display-1">Newsweek</h1>
                    <h6 class="text-start">
                        <?php echo date('D, M j, Y') ?>
                    </h6>
                </div>
            </div>
        </div>
    </header>
    <div class="container text-center">
        <div class="row">
            <div class="col-xxl-3">
                <a href="index.php">
                    <div class="m-2">
                        Home
                    </div>
                </a>
            </div>
            <div class="col-xxl-2">
                <a href="kategorija.php?category=U.S.">
                    <div class="m-2">
                        U.S.
                    </div>
                </a>
            </div>
            <div class="col-xxl-2">
                <a href="kategorija.php?category=World">
                    <div class="m-2">
                        World
                    </div>
                </a>
            </div>
            <div class="col-xxl-2">
                <a href="administracija.php">
                    <div class="m-2">
                        Administracija
                    </div>
                </a>
            </div>
            <div class="col-xxl-3">
                <a href="unos.php">
                    <div class="m-2">
                        Unos
                    </div>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <article>
        <div class="container bg-white mt-1">
            <div class="row">
                <div class="col fs-5 fw-bold text-danger mb-1 mt-1">
                    U.S.
                </div>
            </div>
        </div>
        <div class="container bg-white">
            <div class="parent text-center">
                <?php
                $arhiva = 0;
                $category = "U.S.";
                $query = "SELECT * FROM vijesti WHERE kategorija = ? AND arhiva = ?;";
                $stmt = mysqli_stmt_init($dbc);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    echo "failed";
                } else {
                    mysqli_stmt_bind_param($stmt, "si", $category, $arhiva);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                                <div class='child'>
                                    <a href='./clanak.php?id=${row['id']}'>
                                        <img src='img/${row['slika']}' alt='${row['slika']}'>
                                        <h4>${row['naslov']}</h4>
                                    </a>
                                </div>
                            ";
                    }
                }
                ?>
            </div>
        </div>
        <div class="container bg-white">
            <div class="row">
                <div class="col fs-5 fw-bold text-danger mb-1 mt-1">
                    World
                </div>
            </div>
        </div>
        <div class="container bg-white">
            <div class="parent text-center">
                <?php
                $arhiva = 0;
                $category = "World";
                $query = "SELECT * FROM vijesti WHERE kategorija = ? AND arhiva = ?;";
                $stmt = mysqli_stmt_init($dbc);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    echo "failed";
                } else {
                    mysqli_stmt_bind_param($stmt, "si", $category, $arhiva);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                                <div class='child'>
                                    <a href='./clanak.php?id=${row['id']}'>
                                        <img src='img/${row['slika']}' alt='${row['slika']}'>
                                        <h4>${row['naslov']}</h4>
                                    </a>
                                </div>
                            ";
                    }
                }
                ?>
            </div>
        </div>
    </article>

    <footer>
        <div class="container bg-white mt-1 p-4">
            <div class="row">
                <div class="col">
                    &copy;
                    <?php echo date('Y') ?> NEWSWEEK
                </div>
            </div>
        </div>
    </footer>
    <?php
    mysqli_close($dbc);
    ?>

</body>

</html>