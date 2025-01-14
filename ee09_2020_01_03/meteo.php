<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prognoza pogody Poznań</title>
        <link rel="stylesheet" href="styl4.css">
    </head>
    <body>
        <header class="baner1">
            <p>maj, 2019r.</p>
        </header>
        <header class="baner2">
            <h2>Prognoza dla Poznania</h2>
        </header>
        <header class="baner3">
            <img src="logo.png" alt="prognoza">
        </header>
        <section class="left">
            <a href="kwerendy.txt">Kwerendy</a>
        </section>
        <section class="right">
            <img src="obraz.jpg" alt="Polska, Poznań">
        </section>
        <section class="main">
            <table>
                <tr>
                    <th>Lp.</th>
                    <th>DATA</th>
                    <th>NOC - TEMPERATURA</th>
                    <th>DZIEŃ - TEMPERATURA</th>
                    <th>OPADY [mm/h]</th>
                    <th>CIŚNIENIE [hPa]</th>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "prognoza");
                    $sql = "SELECT * FROM pogoda where miasta_id = 2 ORDER BY data_prognozy DESC;";
                    $wynik = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($wynik)){
                        echo "<tr>
                            <td>$row[0]</td>    
                            <td>$row[2]</td>    
                            <td>$row[3]</td>    
                            <td>$row[4]</td>    
                            <td>$row[5]</td>    
                            <td>$row[6]</td>    
                        </tr>";
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </section>
        <footer> 
            <p>Stronę wykonał: Maksymilian Fikus</p>
        </footer>
    </body>
</html>