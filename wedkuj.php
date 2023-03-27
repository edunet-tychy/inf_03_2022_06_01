<?php
    $con = mysqli_connect('localhost', 'root', '', 'wedkowanie');
    $res_1 = "";
    $res_2 = "";
    if($con){
        $sql_1 = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM lowisko JOIN ryby ON ryby.id=lowisko.Ryby_id WHERE lowisko.rodzaj=3";
        $sql_2 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia=1";
        
        $query_1 = mysqli_query($con, $sql_1);
        $query_2 = mysqli_query($con, $sql_2);

        while($row = mysqli_fetch_row($query_1)){
            $res_1 .= '<li>'.$row[0].'pływa w rzece '.$row[1].', '.$row[2].'</li>';
        }

        while($row = mysqli_fetch_row($query_2)){
            $res_2 .= '</td><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td></tr>';
        }

        mysqli_close($con);
    } else {
        echo "Brak połączenia";
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="./styl_1.css">
</head>
<body>
    <header class="header">
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div class="container">
        <div class="left">
            <section class="left--top">
                <h3>Ryby zamieszkujące rzeki</h3>
                <ol>
                    <?= $res_1; ?>
                </ol>
            </section>
            <section class="left--bottom">
                <h3>Ryby drapieżne naszych wód</h3>
                <table>
                    <tr class="th">
                        <th>L.p.</th>
                        <th>Gatunek</th>
                        <th>Występowanie</th>
                    </tr>
                    <?= $res_2; ?>
                </table>
            </section>
        </div>
        <div class="right">
            <figure>
                <img src="./ryba1.jpg" alt="Sum">           
            </figure>
            <a href="./kwerendy.txt" target="_blank">Pobierz kwerendy</a>
        </div>        
    </div>

    <footer class="footer">
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>
