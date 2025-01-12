<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </header>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "futbol");
            $sql1 = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG';";
            $wynik1 = mysqli_query($conn, $sql1);
            while($row = mysqli_fetch_array($wynik1)){
                echo "<section class='mecze'>
                <h3>$row[0] $row[1]</h3>
                <h4>$row[2]</h4>
                <p>w dniu: $row[3]</p>
                </section>";
            }
        ?>
    <section class="main">
        <h2>Reprezentacja Polski</h2>
    </section>
    <section class="left">
        <p>Podaj pozycje zawodników (1-bramkarze, 2-obroncy, 3-pomobnicy, 4-napastnicy)</p>
        <form action="futbol.php" method="post">
            <input type="number" name="numer" id="numer">
            <button type="submit">Sprawdź</button>
        </form>
        <ul>
            <?php
                if(!empty($_POST["numer"])){
                    $numer = $_POST["numer"];
                }
                $sql2 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $numer;";
                $wynik2 = mysqli_query($conn, $sql2);
                while($row = mysqli_fetch_array($wynik2)){
                    echo "<li><p>$row[0] $row[1]</p></li>";
                }
                mysqli_close($conn);
            ?>
        </ul>
    </section>
    <section class="right">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: Maksymilian Fikus</p>
    </section>
</body>
</html>