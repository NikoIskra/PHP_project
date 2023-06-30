<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Projekt</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form enctype="multipart/form-data" action="skripta.php" method="POST">
        <label for="title">Naslov vijesti</label>
        <input type="text" id="title" name="title" class="form-field-textual">
        <span id="titlemsg"></span> <br>
        <label for="about">Kratki sadržaj vijesti (do 50
            znakova)</label> <br>
        <textarea name="about" id="about" cols="30" rows="10" class="formfield-textual"></textarea>
        <span id="aboutmsg"></span> <br>
        <label for="content">Sadržaj vijesti</label> <br>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <span id="contentmsg"></span> <br>
        <label for="picture">Slika: </label>
        <input type="file" id="picture" name="picture" />
        <span id="slikamsg"></span> <br>
        <label for="category">Kategorija vijesti</label>
        <select name="category" id="category" class="form-field-textual">
            <option value="sport">Sport</option>
            <option value="kultura">Kultura</option>
            <option value="svijet">Svijet</option>
        </select>
        <span id="categorymsg"></span> <br>
        <label>Spremiti u arhivu:
            <input type="checkbox" name="archive">
        </label> <br>
        <button type="reset" value="reset">Poništi</button>
        <button type="submit" id="submit" value="submit">Prihvati</button>
    </form>


    <script type="text/javascript">
        document.getElementById("submit").onclick = function (event) {
            var slanje_forme = false;
            var title = document.getElementById("title").value;
            var naslovField = document.getElementById("title");
            if (title.length < 5 || title.length > 30) {
                slanje_forme = false;
                document.getElementById("titlemsg").innerHTML = "<br>Naslov mora imati više od 5 i manje od 30 znakova";
                document.getElementById("titlemsg").style.color = "red";
                naslovField.style.border = "1px solid red";
            } else {
                document.getElementById("titlemsg").innerHTML = "";
                naslovField.style.border = "1px solid black";
            }

        


            var about = document.getElementById("about").value;
            var aboutField = document.getElementById("about");
            if (about.length < 10 || about.length > 100) {
                slanje_forme = false;
                document.getElementById("aboutmsg").innerHTML = "<br>Kratki sardzaj vijesti mora imati više od 10 i manje od 100 znakova";
                document.getElementById("aboutmsg").style.color = "red";
                aboutField.style.border = "1px solid red";
            }



            var content = document.getElementById("content").value;
            var contentField = document.getElementById("content");
            if (content.length == 0) {
                slanje_forme = false;
                document.getElementById("contentmsg").innerHTML = "<br>Tekst vijesti nesmije biti prazan";
                document.getElementById("contentmsg").style.color = "red";
                contentField.style.border = "1px solid red";
            }
            
            var slika = document.getElementById("picture").value;
            var slikaField = document.getElementById("picture");
            if (slika) {
                document.getElementById("slikamsg").innerHTML = "";
                slikaField.style.border = "";
            } else {
                slanje_forme = false;
                document.getElementById("slikamsg").innerHTML = "<br>Slika mora biti odabrana";
                document.getElementById("slikamsg").style.color = "red";
                slikaField.style.border = "1px solid red";
            }

            var kategorija = document.getElementById("category").value;
            var kategorijaField = document.getElementById("category");
            if (kategorija == null || kategorija == "") {
                slanje_forme = false;
                document.getElementById("categorymsg").innerHTML = "<br>Kategorija mora biti odabrana";
                document.getElementById("categorymsg").style.color = "red";
                kategorijaField.style.border = "1px solid red";
            }


            if (slanje_forme != true) {
                event.preventDefault();
            }
        };
    </script>
</body>

</html>