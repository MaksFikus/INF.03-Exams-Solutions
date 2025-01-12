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
                $wynik = mysqli_query($conn, $sql1);
                while($rekord = mysqli_fetch_assoc($wynik)){ //Bedzie wypisywac rekordy do momentu kiedy jakis istnieje
                    $rasa = $rekord['rasa']; //Wynik rekordu zapisujemy do zmiennej 
                    echo "<li>$rasa</li>"; //Wyswietlamy elementy listy numerowanej wraz z rasa znajdujaca sie w rekordzie
                }
                mysqli_close($conn);
            ?>
        </ol>
    </section>
    <section id="menu">
        <a href="">Rasa Peruwianka</a>
        <a href="">Rasa American</a>
        <a href="">Rasa Crested</a>
    </section>
    <main>
        <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
        <hr>
        <h2>Świnki w tym miocie</h2>
    </main>
    
    <footer>
        <p>Stronę wykonał: Maksymilian Fikus</p>
    </footer>
</body>
</html>