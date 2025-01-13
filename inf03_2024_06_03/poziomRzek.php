<?php
    $conn = mysqli_connect("localhost", "root", "", "rzeki");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy Rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <img src="obraz1.png" alt="Mapa Polski">
    </header>
    <header>
        <h1>Rzeki w województwie w dolnośląskim</h1>
    </header>
    <section class="menu">
        <form action="" method="post">
            <input type="radio" name="opcja" id="wszystkie" value="wszystkie">
            <label for="wszystkie">Wszystkie</label>
            <input type="radio" name="opcja" id="ostrzegawczy" value="ostrzegawczy">
            <label for="ostrzegawczy">Ponad stan ostrzegawczy</label>
            <input type="radio" name="opcja" id="alarmowy" value="alarmowy">
            <label for="alarmowy">Ponad stan alarmowy</label>
            <button type="submit">Pokaz</button>
        </form>
    </section>
    <section class="left">
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <td>Wodomierz</td>
                <td>Rzeka</td>
                <td>Ostrzegawczy</td>
                <td>Alarmowy</td>
                <td>Aktualny</td>
            </tr>
            <?php
                if(isset($_POST["opcja"])){
                    $opcja = $_POST["opcja"];
                    if($opcja == "wszystkie"){
                        $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = wodowskazy_id WHERE dataPomiaru='2022-05-05';";
                    }else if($opcja == "ostrzegawczy"){
                        $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = wodowskazy_id WHERE dataPomiaru='2022-05-05' AND stanWody > stanOstrzegawczy;";
                    }else if($opcja == "alarmowy"){
                        $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = wodowskazy_id WHERE dataPomiaru='2022-05-05' AND stanWody > stanAlarmowy;";
                    }
                    $wynik1 = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($wynik1)){
                        echo "<tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[4]</td>
                            </tr>";
                    }
                }
            ?>
        </table>
    </section>
    <section class="right">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzezeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <?php
            $sql2 = "SELECT dataPomiaru, AVG(stanWody) FROM pomiary GROUP BY dataPomiaru; ";
            $wynik2 = mysqli_query($conn, $sql2);
            while($row = mysqli_fetch_array($wynik2)){
                echo "<p>$row[0] $row[1]</p>";
            }
        ?><br>
        <a href="https://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka">
    </section>
    <footer>
        <p>Stronę wykonał: Maksymilian Fikus</p>
    </footer>
</body>
</html>