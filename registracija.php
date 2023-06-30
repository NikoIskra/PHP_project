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
    <hr>
    <article>
        <div class="container text-center">
            <div class="row">
                <div class="col d-flex justify-content-center m-4">
                    <form method="post" class="p-4 bg-white">
                        Ime:<br><input type="text" name="ime" id="ime" required>
                        <span id="imemsg"></span><br>
                        Prezime:<br><input type="text" name="prezime" id="prezime" required>
                        <span id="prezimemsg"></span><br>
                        Korisničko ime:<br><input type="text" name="username" id="username" required>
                        <span id="usernamemsg"></span><br>
                        Lozinka:<br><input type="password" name="lozinka" id="lozinka" required><br>
                        Ponovite lozinku:<br><input type="password" name="lozinka_ponovo" id="lozinka_ponovo" required>
                        <hr>
                        <span id="lozinkamsg"></span>
                        <button type="reset" value="reset" name="gumb" class="bg-white">Reset</button>
                        <button type="submit" value="submit" name="gumb" class="bg-white" id="submit">Submit</button>
                    </form>

                    <script type="text/javascript">
                        document.getElementById("submit").onclick = function (event) {
                            var slanje_forme = true; 3
                            var ime = document.getElementById("ime").value;
                            var imeField = document.getElementById("ime");

                            if (ime.length == 0) {
                                slanje_forme = false;
                                document.getElementById("imemsg").innerHTML = "<br>Ime mora biti uneseno";
                                document.getElementById("imemsg").style.color = "red";
                                imeField.style.border = "1px solid red";
                            }

                            var prezime = document.getElementById("prezime").value;
                            var prezimeField = document.getElementById("prezime");
                            if (prezime.length == 0) {
                                slanje_forme = false;
                                document.getElementById("prezimemsg").innerHTML = "<br>Prezime mora biti uneseno";
                                document.getElementById("prezimemsg").style.color = "red";
                                prezimeField.style.border = "1px solid red";
                            }

                            var username = document.getElementById("username").value;
                            var usernameField = document.getElementById("username");
                            if (username.length == 0) {
                                slanje_forme = false;
                                document.getElementById("usernamemsg").innerHTML = "<br>Korisnicko ime mora biti uneseno"
                                document.getElementById("usernamemsg").style.color = "red";
                                usernameField.style.border = "1px solid red";
                            }

                            var lozinka = document.getElementById("lozinka").value;
                            var lozinka_ponovo = document.getElementById("lozinka_ponovo").value;
                            var lozinkaBorder = document.getElementById("lozinka");
                            var lozinka_ponovoBorder = document.getElementById("lozinka_ponovo");
                            if (lozinka.localeCompare(lozinka_ponovo)) {
                                slanje_forme = false;
                                document.getElementById("lozinkamsg").innerHTML = "lozinke se ne poklapaju<br>";
                                document.getElementById("lozinkamsg").style.color = "red";
                                lozinkaBorder.style.border = "1px solid red";
                                lozinka_ponovoBorder.style.border = "1px solid red";
                            } else {
                                document.getElementById("lozinkamsg").innerHTML = "";
                                lozinkaBorder.style.border = "1px solid black";
                                lozinka_ponovoBorder.style.border = "1px solid black";
                            }
                            if (slanje_forme != true) {
                                event.preventDefault();
                            }
                        }
                    </script>

                    <?php
                    include 'connect.php';
                    if (
                        !empty($_POST['ime']) &&
                        !empty($_POST['prezime']) &&
                        !empty($_POST['username']) &&
                        !empty($_POST['lozinka']) &&
                        !empty($_POST['lozinka_ponovo'])
                    ) {
                        $ime = $_POST['ime'];
                        $prezime = $_POST['prezime'];
                        $username = $_POST['username'];
                        if (strcmp($_POST['lozinka'], $_POST['lozinka_ponovo']) === 0) {
                            $lozinka = $_POST['lozinka'];
                            $hashed_lozinka = password_hash($lozinka, CRYPT_BLOWFISH);
                            $razina = 0;
                            $query = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) values (?, ?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($dbc);
                            if (mysqli_stmt_prepare($stmt, $query)) {
                                mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $username, $hashed_lozinka, $razina);
                                mysqli_stmt_execute($stmt);
                            }
                        }

                    }
                    mysqli_close($dbc);
                    ?>
                </div>
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

</body>

</html>