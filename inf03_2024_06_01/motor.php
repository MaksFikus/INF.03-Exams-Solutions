<?php
    $conn = mysqli_connect("localhost", "root", "", "motory");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <section class="left">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
                $sql1 = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM wycieczki JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;";
                $wynik1 = mysqli_query($conn, $sql1);
                while($row = mysqli_fetch_array($wynik1)){
                    echo "<dt>$row[0], rozpoczyna się w $row[2] <a href='$row[3].jpg'>zobacz zdjecie</a></dt>
                    <dd>$row[1]</dd>";
                }                
            ?>
        </dl>
    </section>
    <section class="right1">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section class="right2">
        <h2>Statystyki</h2>
            <p>Wpisanych wycieczek:
                <?php
                    $sql2 = "SELECT count(*) FROM wycieczki;";
                    $wynik2 = mysqli_query($conn, $sql2);
                    $row = mysqli_fetch_array($wynik2);
                    echo "$row[0]";
                    mysqli_close($conn);
                ?>
            </p>
            <p>Uzytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
    </section>
    <footer>
        <p>Stronę wykonał: Maksymilian Fikus</p>
    </footer>
</body>
</html>