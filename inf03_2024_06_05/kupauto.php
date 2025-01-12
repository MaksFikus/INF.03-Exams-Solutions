<?php
    $conn = mysqli_connect("localhost", "root", "", "kupauto");
?>
<!DOCTYPE html>
<html lang="pl-pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>
    <main id="pierwszy">
        <?php
            $sql1 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id=10;";
            $wynik1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_array($wynik1);
            echo "<img src='$row[5]' alt='oferta dnia'>";
            echo "<h4>Oferta dnia: Toyota $row[0]</h4>";
            echo "<p>Rocznik $row[1], przebieg $row[2], rodzaj paliwa $row[3]";
            echo "<h4>Cena: $row[4]";
        ?>
    </main>
    <main id="drugi">
        <h2>Oferty Wyróżnione</h2>
        <section id="oferty">
            <?php
                $sql2 = "SELECT nazwa, model, rocznik, cena, zdjecie FROM samochody JOIN marki ON samochody.marki_id = marki.id WHERE wyrozniony=1 LIMIT 4;";
                $wynik2 = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_array($wynik2)){
                    echo "<section class='oferta'>";
                    echo "<img src='$row[4]' alt='$row[1]'>";
                    echo "<h4>$row[0] $row[1]</h4>";
                    echo "<p>Rocznik: $row[2]";
                    echo "<h4>Cena: $row[3]";
                    echo "</section>";
                }
            ?>
        </section>
    </main>
    <main id="trzeci">
        <h2>Wybierz markę</h2>
        <form action="" method="post">
            <select name="marka" id="">
                <?php
                    $sql3 = "SELECT nazwa FROM marki;";
                    $wynik3 = mysqli_query($conn, $sql3);
                    while ($row = mysqli_fetch_array($wynik3)){
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                ?>
            </select>
            <button type="submit" name="wyslij">Wyszukaj</button>
        </form>
        <section id="oferty">
        <?php
            if(isset($_POST['wyslij'])){
                $marka = $_POST["marka"];
                $conn = mysqli_connect("localhost", "root", "", "kupauto");
                $sql4 = "SELECT model, cena, zdjecie FROM samochody JOIN marki ON samochody.marki_id = marki.id WHERE marki.nazwa = '$marka'";
                $wynik4 = mysqli_query($conn, $sql4);
                while ($rekord = mysqli_fetch_assoc($wynik4)) {
                    echo "<section class='oferta'>";
                    $zdjecie = $rekord['zdjecie'];
                    echo "<img src='$zdjecie'>";
                    $model = $rekord['model'];
                    echo "<h4>$marka $model</h4>";
                    $cena = $rekord['cena'];
                    echo "<h4>$cena</h4>";
                    echo "</section>";
                    }
                }
            mysqli_close($conn);
        ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Maksymilian Fikus</p>
        <p>
            <a href="http://firmy.pl/komis">Znajdź nas także</a>
        </p>
    </footer>
</body>
</html>