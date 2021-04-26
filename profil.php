<?php
    include("app/Database.php");
    echo "123";
    echo "123456";
    // $conn = (new Database())->createConnection();

    // $sql = "SELECT * FROM zapocet_tabulka";
    // $stm = $conn->prepare($sql1);
    // $stm->execute();

    // $priklad = $stm->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Steal</title>
</head>
<body>
    <form action="profil.php" method="post">
        <!-- chalan ktoreho chceme zistit frajerku -->
        <label for="fname">First name: </label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="heslo">Password: </label><br>
        <input type="password" id="heslo" name="heslo"><br>
        
        <input type="submit" value="submit">
    </form>
</body>
</html>