<?php
    $conn = mysqli_connect("localhost", "root", "", "terminarz");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header class="pierwszy">
        <img src="logo1.png" alt="lipiec">
    </header>
    <header class="drugi">
        <h1>TERMINARZ</h1>
        <?php
            echo "<p>najblizsze zadania: ";
            $sql1 = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania <= '2020-07-07' AND wpis <> '';";
            $wynik1 = mysqli_query($conn,$sql1);
            while($row = mysqli_fetch_array($wynik1)){
                echo "$row[0]; ";
            }
            echo "</p>";
        ?>
    </header>
    <section class="main">
        <?php
            $sql2 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac='lipiec';";
            $wynik2 = mysqli_query($conn, $sql2);
            while ($row = mysqli_fetch_array($wynik2)){
                echo " <section class='blok'>
                        <h6>$row[0]</h6>
                        <p>$row[1]</p>
                    </section>";
            }
            mysqli_close($conn);
        ?>
    </section>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: Maksymilian Fikus</p>
    </footer>
</body>
</html>