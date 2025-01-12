<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓZY</h1>
    </header>
    <section class="left">
        <h2>Promocje</h2>
        <table>
            <tr>
                <td>Warszawa</td>
                <td>od 600zł</td>
            </tr>
            <tr>
                <td>Wenecja</td>
                <td>od 1200zł</td>
            </tr>
            <tr>
                <td>Paryz</td>
                <td>od 1200zł</td>
            </tr>
        </table>
    </section>
    <section class="middle">
        <h2>W tym roku jedziemy do...</h2>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "podroze");
            $sql1 = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis;";
            $wynik1 = mysqli_query($conn, $sql1);
            while ($row = mysqli_fetch_array($wynik1)){
                echo "<img src='$row[0]' alt='$row[1]' title='$row[1]'>";
            }
        ?>
    </section>
    <section class="right">
        <h2>Kontakt</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 444555666</p>
    </section>
    <section class="dane">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php
                $sql2 = "SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna = FALSE;";
                $wynik2  = mysqli_query($conn, $sql2);
                while($row = mysqli_fetch_array($wynik2)){
                    echo "<li>Dnia: $row[1] pojechaliśmy do $row[0]</li>";
                }
                mysqli_close($conn);
            ?>
        </ol>
    </section>
    <footer>
        Stronę wykonał: Maksymilian Fikus 
    </footer>
</body>
</html>