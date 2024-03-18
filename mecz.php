<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Molkky</title>
</head>

<body>
    <a href="index.php">Strona Główna</a>
    <?php
    
    if (isset ($_GET['id_meczu'])) {
        $id_meczu = $_GET['id_meczu'];
        $con = mysqli_connect("localhost", "root", "", "molkky");
        $playersQuery = "SELECT * FROM `mecz` WHERE `ID` = '$id_meczu'";
        $players = mysqli_query($con, $playersQuery);
        $gracze = mysqli_fetch_assoc($players);

        $player1NameQuery = "SELECT Nazwa FROM `gracze` WHERE `ID` = " . $gracze['ID_G1'];
        $player1Name = mysqli_query($con, $player1NameQuery);
        $gracz1 = "";
        while ($wierszPlayer1 = mysqli_fetch_array($player1Name)) {
            $gracz1 = $wierszPlayer1['Nazwa'];
        }

        $player2NameQuery = "SELECT Nazwa FROM `gracze` WHERE `ID` = " . $gracze['ID_G2'];
        $player2Name = mysqli_query($con, $player2NameQuery);
        $gracz2 = "";
        while ($wierszPlayer2 = mysqli_fetch_array($player2Name)) {
            $gracz2 = $wierszPlayer2['Nazwa'];
        }
    }
    ?>
    <h1>Aktualizacja stanu meczu</h1>
    <div class="gracze">
        <form action="" method="post">
            <?php echo "<td colspan='2'><h1>$gracz1</h1></td>"; ?>
            <table>
                <tr>
                    <td colspan="3">
                        <input type="submit" name="punkty1" value="0">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="punkty1" value="1"></td>
                    <td><input type="submit" name="punkty1" value="2"></td>
                    <td><input type="submit" name="punkty1" value="3"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="punkty1" value="4"></td>
                    <td><input type="submit" name="punkty1" value="5"></td>
                    <td><input type="submit" name="punkty1" value="6"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="punkty1" value="7"></td>
                    <td><input type="submit" name="punkty1" value="8"></td>
                    <td><input type="submit" name="punkty1" value="9"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="punkty1" value="10"></td>
                    <td><input type="submit" name="punkty1" value="11"></td>
                    <td><input type="submit" name="punkty1" value="12"></td>
                </tr>
            </table>
        </form>
        <form action="" method="post">
            <?php echo "<td colspan='2'><h1>$gracz2</h1></td>"; ?>
            <table>
                <tr>
                    <td colspan="3">
                        <input type="submit" name="punkty2" value="0">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="punkty2" value="1"></td>
                    <td><input type="submit" name="punkty2" value="2"></td>
                    <td><input type="submit" name="punkty2" value="3"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="punkty2" value="4"></td>
                    <td><input type="submit" name="punkty2" value="5"></td>
                    <td><input type="submit" name="punkty2" value="6"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="punkty2" value="7"></td>
                    <td><input type="submit" name="punkty2" value="8"></td>
                    <td><input type="submit" name="punkty2" value="9"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="punkty2" value="10"></td>
                    <td><input type="submit" name="punkty2" value="11"></td>
                    <td><input type="submit" name="punkty2" value="12"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="punktacja">
        <table>
            <tr>
            </tr>
            <?php
            if (isset ($_GET['id_meczu'])) {
                $id_meczu = $_GET['id_meczu'];
                $con = mysqli_connect("localhost", "root", "", "molkky");
                $playersQuery = "SELECT * FROM `mecz` WHERE `ID` = '$id_meczu'";
                $players = mysqli_query($con, $playersQuery);
                $gracze = mysqli_fetch_assoc($players);

                $player1PointsQuery = "SELECT punkty FROM `rzuty` WHERE `ID_Meczu` = '$id_meczu' && `ID_Gracza` = " . $gracze['ID_G1'];
                $points = mysqli_query($con, $player1PointsQuery);
                $suma1 = 0;
                $zera = 0;

                echo "<td colspan='2'><h3>$gracz1</h3></td>";
                while ($wiersz1 = mysqli_fetch_array($points)) {
                    $suma1 += $wiersz1['punkty'];
                    if ($suma1 > 50) {
                        $suma1 = 25;
                    }
                    if ($wiersz1['punkty'] == 0) {
                        $zera++;
                    }
                    if($zera > 0 && $wiersz1['punkty'] != 0){
                        $zera = 0;
                    }
                    if ($zera == 3) {
                        $suma1 = 0;
                        echo "<h1>" . $gracz1 . " przegrał</h1>";
                        $updateWinnerQuery = "UPDATE `mecz` SET `Wygrany` = " . $gracze['ID_G2'] . " WHERE `ID` = '$id_meczu'";
                        mysqli_query($con, $updateWinnerQuery);
                    }
                    if ($suma1 == 50) {
                        echo "<h1>" . $gracz1 . " wygrał</h1>";
                        $updateWinnerQuery = "UPDATE `mecz` SET `Wygrany` = " . $gracze['ID_G1'] . " WHERE `ID` = '$id_meczu'";
                        mysqli_query($con, $updateWinnerQuery);
                    }
                    echo "<tr><td>" . $wiersz1['punkty'] . "</td><td>" . $suma1 . "</td></tr>";
                }
            }
            ?>
        </table>
        <table>
            <tr>

                <?php
                if (isset ($_GET['id_meczu'])) {

                    $player2PointsQuery = "SELECT punkty FROM `rzuty` WHERE `ID_Meczu` = '$id_meczu' && `ID_Gracza` = " . $gracze['ID_G2'];
                    $points2 = mysqli_query($con, $player2PointsQuery);

                    $suma2 = 0;
                    $zera2 = 0;
                    echo "<td colspan='2'><h3>$gracz2</h3></td>";
                    while ($wiersz2 = mysqli_fetch_array($points2)) {
                        $suma2 += $wiersz2['punkty'];
                        if ($suma2 > 50) {
                            $suma2 = 25;
                        }
                        if ($wiersz2['punkty'] == 0) {
                            $zera2++;
                        }
                        if($zera2 > 0 && $wiersz2['punkty'] != 0){
                            $zera2 = 0;
                        }
                        if ($zera2 == 3) {
                            $suma2 = 0;
                            echo "<h1>" . $gracz2 . " przegrał</h1>";
                            $updateWinnerQuery = "UPDATE `mecz` SET `Wygrany` = " . $gracze['ID_G1'] . " WHERE `ID` = '$id_meczu'";
                            mysqli_query($con, $updateWinnerQuery);
                        }
                        if ($suma2 == 50) {
                            echo "<h1>" . $gracz2 . " wygrał</h1>";
                        $updateWinnerQuery = "UPDATE `mecz` SET `Wygrany` = " . $gracze['ID_G2'] . " WHERE `ID` = '$id_meczu'";
                        mysqli_query($con, $updateWinnerQuery);
                        }
                        echo "<tr><td>" . $wiersz2['punkty'] . "</td><td>" . $suma2 . "</td></tr>";
                    }
                }
                ?>
            </tr>
        </table>
    </div>
    <?php
    if (isset ($_GET['id_meczu'])) {
        if (isset ($_POST['punkty1'])) {
            $punkty1 = $_POST['punkty1'];
            $sql = "INSERT INTO `rzuty` (`ID_Meczu`, `ID_Gracza`, `punkty`) VALUES ('$id_meczu', " . $gracze['ID_G1'] . ", '$punkty1')";
            mysqli_query($con, $sql);
            header("Location: mecz.php?id_meczu=$id_meczu");
        }
        if (isset ($_POST['punkty2'])) {
            $punkty2 = $_POST['punkty2'];
            $sql = "INSERT INTO `rzuty` (`ID_Meczu`, `ID_Gracza`, `punkty`) VALUES ('$id_meczu', " . $gracze['ID_G2'] . ", '$punkty2')";
            mysqli_query($con, $sql);
            header("Location: mecz.php?id_meczu=$id_meczu");
        }
    }

    ?>
</body>

</html>