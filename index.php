<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molkky</title>
</head>
<body>
    <form action="" method="post">
        <h1>Dodaj mecz</h1>
        <input type="text" name="player1" required placeholder="Gracz 1 (ID)">
        <input type="text" name="player2" required placeholder="Gracz 2 (ID)">
        <input type="submit" name="dodaj_mecz" value="Dodaj mecz">
    </form>
    <form action="" method="post">
        <h1>Dodaj gracza</h1>
        <input type="text" name="player" required placeholder="Nazwa gracza">
        <input type="submit" name="dodaj_gracza" value="Dodaj gracza">
    </form>

    <h1>Lista meczów</h1>
    <?php
    $data = date("Y-m-d");
    $con = mysqli_connect("localhost", "root", "", "molkky");
    $matchesQuery = "SELECT * FROM `mecz`";
    $matches = mysqli_query($con, $matchesQuery);
    while ($wiersz = mysqli_fetch_array($matches)) {
        $player1NameQuery = "SELECT Nazwa FROM `gracze` WHERE `ID` = " . $wiersz['ID_G1'];
        $player1Name = mysqli_query($con, $player1NameQuery);
        $gracz1 = "";
        while ($wierszPlayer1 = mysqli_fetch_array($player1Name)) {
            $gracz1 = $wierszPlayer1['Nazwa'];
        }

        $player2NameQuery = "SELECT Nazwa FROM `gracze` WHERE `ID` = " . $wiersz['ID_G2'];
        $player2Name = mysqli_query($con, $player2NameQuery);
        $gracz2 = "";
        while ($wierszPlayer2 = mysqli_fetch_array($player2Name)) {
            $gracz2 = $wierszPlayer2['Nazwa'];
        }
        echo "<a href='mecz.php?id_meczu=" . $wiersz['ID'] . "'>" . $gracz1 . " vs " . $gracz2 . " - ".$wiersz['Data']."</a><br>";
    }
    if(isset($_POST['dodaj_mecz'])){
        $player1 = $_POST['player1'];
        $player2 = $_POST['player2'];
        $addMatchQuery = "INSERT INTO `mecz` (`ID_G1`, `ID_G2`, `Data`) VALUES ('$player1', '$player2', '$data')";
        mysqli_query($con, $addMatchQuery);
        header("Location: index.php");
    }
    if(isset($_POST['dodaj_gracza'])){
        $player = $_POST['player'];
        $addPlayerQuery = "INSERT INTO `gracze` (`Nazwa`) VALUES ('$player')";
        mysqli_query($con, $addPlayerQuery);
        header("Location: index.php");
    }
    ?>
</body>
</html>