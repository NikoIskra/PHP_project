<?php
session_start();
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
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                echo "
                            <form method='post' class='p-4 bg-white'>
                                Korisnicko ime:<br><input type='text' name='username' id='username' required><br>
                                Lozinka:<br><input type='password' name='lozinka' id='lozinka' required><hr>
                                <button type='submit' value='login' name='gumb' class='bg-white'>Sign in</button>
                            </form>
                        ";
                ?>
            </div>
        </div>
    </div>

    <?php

    $logged = true;
    if (isset($_POST['username'], $_POST['lozinka'])) {
        $username = $_POST['username'];
        $lozinka = $_POST['lozinka'];
    } else {
        if (isset($_SESSION['$username'], $_SESSION['$lozinka'], $_SESSION['$level'])) {
            $username = $_SESSION['$username'];
            $lozinka = $_SESSION['$lozinka'];
            $prijava = true;
            if ($_SESSION['$level'] == 1)
                $admin = true;
            else
                $admin = false;
        } else
            $logged = false;
    }

    if ($logged) {
        $query = "SELECT * FROM korisnik WHERE korisnicko_ime = ?;";
        $stmt = mysqli_stmt_init($dbc);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            echo "failed";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            if (isset($row['lozinka'])) {
                if (password_verify($lozinka, $row['lozinka'])) {
                    if ($row['razina'] === 1) {
                        $prijava = TRUE;
                        $admin = TRUE;
                        $_SESSION['$username'] = $row['korisnicko_ime'];
                        $_SESSION['$level'] = $row['razina'];
                        $_SESSION['$lozinka'] = $lozinka;
                    } elseif ($row['razina'] === 0) {
                        $prijava = TRUE;
                        $admin = FALSE;
                        $_SESSION['$username'] = $row['korisnicko_ime'];
                        $_SESSION['$level'] = $row['razina'];
                        $_SESSION['$lozinka'] = $lozinka;
                    }
                }
            } else {
                $prijava = FALSE;
                $admin = FALSE;
                if (isset($_POST['korisnicko_ime'], $_POST['lozinka'])) {
                    $_SESSION['$username'] = $_POST['korisnicko_ime'];
                    $_SESSION['$level'] = 2;
                    $_SESSION['$lozinka'] = $_POST['lozinka'];
                }
            }
        }

        if ($prijava==true && $admin==true) {
            echo "
                        <div class='container'>
                            <div class='row'>
                                <div class='col'>
                                    <p>Prijavljeni ste kao administrator ${_SESSION['$username']} i imate pravo pristupa admistracijskoj stranici.</p>
                                </div>
                            </div>
                        </div>
                    ";
                    echo "
                    <div class='container'>
                        <div class='row'>
                            <div class='col'>
                                <form method='post' class='p-4 mb-5'>
                                    Unesite id od članka koji želite izbrisati
                                    <br><input type='number' name='id' id='id' required><hr>
                                    <button type='submit' value='Brisanje' name='gumb' class='bg-white'>Brisanje</button>
                                </form>
                                <form enctype='multipart/form-data' method='post' class='p-4 mb-5'>
                                    <div class='form-item'>
                                        Unesite id od članka koji želite izmjeniti
                                        <br><input type='number' name='id' id='id' required>
                                    </div>
                                    <div class='form-item'>
                                        <label>Naslov vijesti</label>
                                        <div class='form-field'>
                                            <input type='text' name='title' class='form-field-textual' required>
                                        </div>
                                    </div>
                                    <div class='form-item'>
                                        <label>Datum objave</label>
                                        <div class='form-field'>
                                            <input type='date' name='date' id='date' required>
                                        </div>
                                    </div>
                                    <div class='form-item'>
                                        <label>Kratki sadržaj vijesti (do 50 znakova)</label>
                                        <div class='form-field'>
                                            <textarea name='about' cols='30' rows='8' required></textarea>
                                        </div>
                                    </div>
                                    <div class='form-item'>
                                        <label>Sadržaj vijesti</label>
                                        <div class='form-field'>
                                            <textarea name='content' cols='30' rows='8' class='form-field-textual' required></textarea>
                                        </div>
                                    </div>
                                    <div class='form-item'>
                                        <label>Slika:</label>
                                        <div class='form-field'>
                                            <input type='file' name='slika' required>
                                        </div>
                                    </div>
                                    <div class='form-item'>
                                        <label>Kategorija vijesti</label>
                                        <div class='form-field'>
                                            <select name='category' class='form-field-textual' required>
                                                <option value=''>Odabir kategorije</option>
                                                <option value='U.S.'>U.S.</option>
                                                <option value='World'>World</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-item'>
                                        <label>Spremiti u arhivu:</label>
                                        <div class='form-field'>
                                            <input type='checkbox' name='archive'>
                                        </div>
                                    </div><hr>
                                    <div class='form-item'>
                                        <button type='submit' value='update' name='gumb'>Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                ";
        }
        elseif ($prijava==true && $admin==false) {
            echo "
            <div class='container'>
                <div class='row'>
                    <div class='col d-flex flex-column justify-content-center m-4'>
                        <p>Prijavljeni ste kao korisnik ${_SESSION['$username']} i nemate pravo pristupa admistracijskoj stranici.</p>
                    </div>
                </div>
            </div>
        ";
        }

        elseif($prijava==false) {
            echo "
                        <div class='container'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center m-4'>
                                    <p>Taj korisnik ne postoji u bazi podataka.</p>
                                    <p>Stisnite na gumb kako biste se registrirali.</p>
                                </div>
                            </div>
                        </div>
                    ";
                    echo "
                        <div class='container'>
                            <div class='row'>
                                <div class='col'>
                                    <form method='post' class='p-4 bg-white'>
                                        <button type='submit' class='bg-white'><a href='./registracija.php'>Registrirajte se</a></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
            mysqli_close($dbc);


    if (isset($_POST['gumb'])) {
        if (strcmp($_POST['gumb'], 'Brisanje') === 0) {
            $id = $_POST['id'];
            $query = 'DELETE FROM vijesti WHERE id = ?;';
            $stmt = mysqli_stmt_init($dbc);
            if (!mysqli_stmt_prepare($stmt, $query)) {
                echo "failed";
            } else {
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
            }
        } elseif (strcmp($_POST['gumb'], 'update') === 0) {
            if (!empty($_FILES["slika"]["name"])) {
                $target_file = "img/" . basename($_FILES["slika"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (isset($_POST["gumb"])) {
                    $check = getimagesize($_FILES["slika"]["tmp_name"]);
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
                    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["slika"]["name"])) . " has been uploaded.<br>";
                    } else {
                        // echo "Sorry, there was an error uploading your file.<br>";
                    }
                }
            }
            $id = $_POST['id'];
            $datum = $_POST['date'];
            $naslov = $_POST['title'];
            $sazetak = $_POST['about'];
            $tekst = $_POST['content'];
            $slika = $_FILES["slika"]["name"];
            $kategorija = $_POST['category'];
            if (isset($_POST['archive']))
                $arhiva = 1;
            else
                $arhiva = 0;
            $query = 'UPDATE vijesti SET datum = ?, naslov = ?, sazetak = ?, tekst = ?, slika = ?, kategorija = ?, arhiva = ? WHERE id = ?';
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, 'ssssssii', $datum, $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva, $id);
                mysqli_stmt_execute($stmt);
            }
        }
    }

    ?>

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