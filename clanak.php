<?php
include 'connect.php';
$id = $_GET['id'];
$query = "SELECT * FROM vijesti WHERE id = ?;";
$stmt = mysqli_stmt_init($dbc);
if (!mysqli_stmt_prepare($stmt, $query)) {
    echo "failed";
} else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>

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
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php echo "${row['kategorija']}" ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>
                        <?php echo "${row['naslov']}" ?>
                    </h2>
                    <p>
                        <?php echo date('d/m/o', strtotime($row['datum'])) ?>
                    </p>
                    <?php echo "<img src='img/${row['slika']}' alt='${row['slika']}'>" ?>
                    <div class="text-white mt-3 mb-3 p-2 subtitle">
                        <?php echo "${row['kategorija']}" ?>
                        </h2>
                    </div>
                    <p>
                        <?php echo "${row['tekst']}" ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
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