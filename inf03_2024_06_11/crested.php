<!DOCTYPE html>
<html lang="pl-pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <section id="prawy">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "hodowla");
                $sql1 = "SELECT rasa FROM rasy;";
                $wynik1 = mysqli_query($conn, $sql1);
                while($row = mysqli_fetch_array($wynik1)){
                    echo "<li>$row[0]</li>";
                }
            ?>
        </ol>
    </section>
    <section id="menu">
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </section>
    <main>
        <img src="crested.jpg" alt="Świnka morska rasy crested">
        <?php
            $sql2 = "SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy.id = 7;";
            $wynik2 = mysqli_query($conn, $sql2);
            $row = mysqli_fetch_array($wynik2);
            echo "<h2>Rasa: $row[2]</h2>";
            echo "<p>Data urodzenia: $row[0]</p>";
            echo "<p>Oznaczenie miotu: $row[1]</p>";
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
            $sql3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 7; ";
            $wynik3 = mysqli_query($conn, $sql3);
            while($row = mysqli_fetch_array($wynik3)){
                echo "<h3>$row[0] - $row[1] zł</h3>";
                echo "<p>$row[2]</p>";
            }
            mysqli_close($conn);
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: Maksymilian Fikus</p>
    </footer>
</body>
</html>