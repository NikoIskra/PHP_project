<?php
include 'connect.php';

if (!empty($_FILES["picture"]["name"])) {
    $target_file = "img/" . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["button"])) {
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    } else {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
}
if (
    !empty($_POST['title']) &&
    !empty($_POST['about']) &&
    !empty($_POST['content']) &&
    !empty($_FILES["picture"]["name"]) &&
    !empty($_POST['category'])
)
{
    $datum = date("Y-m-d");
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $photo = $_FILES["picture"]["name"];
    $kategorija = $_POST['category'];
    if (isset($_POST['archive'])) $arhiva = 1;
    else $arhiva = 0;
    $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ssssssi', $datum, $title, $about, $content, $photo, $kategorija, $arhiva);
        mysqli_stmt_execute($stmt);
    }
}
mysqli_close($dbc);

?>

<!DOCTYPE html>
<html lang="zxx">
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
    <section role="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <p class="category text-decoration-underline"><?php echo $kategorija;?></p>
                        <h1><?php echo $title;?></h1>
                        <p>AUTOR:</p>
                        <p>
                            OBJAVLJENO:
                            <?php echo date('d/m/o', strtotime($datum));?>
                        </p>
                    </div>
                    <section>
                        <?php echo "<img src='img/$photo'";?>
                    </section>
                    <section>
                        <p><?php echo $about;?></p>
                    </section>
                    <section>
                        <p><?php echo $content;?></p>
                    </section>
                </div>
            </div>
        </div>
    </section>
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
</body>
</html>