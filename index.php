<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL - injection</title>
</head>
<body>
    <?php
    include("app/Database.php");
    /*
    SQL INJECTION
    vymena frajerok - pomocou SQL kodu urobim naviac funkciu ako by mal
    POSTfname je meno podla ktoreho hladame typka a vymenime
    */

    //porovnaj meno v databaze a zadane meno
    
if(isset($_POST["fname"])){
    $conn = (new Database())->createConnection();

//osetrenie start 1/2
/*
    $sql1 = "SELECT * FROM zapocet_tabulka";
    $stm1 = $conn->prepare($sql1);
    $stm1->execute();

    $chalani_v_databaze = $stm1->fetchAll(PDO::FETCH_ASSOC);

    foreach($chalani_v_databaze as $chalan){
        if( $chalan["Chlapec"] == $_POST["fname"] ){
*/
//osetrenie end 1/2

            //nespravna
            //DO SQL ZADAT --- Rado' OR 'a' = 'a ---> Rado alebo 'a' = 'a' to plati stale ... cize plati stale 
            // $sql = "SELECT * FROM zapocet_tabulka WHERE Chlapec = 'Majo' OR 'hack' = 'hack'";

            //nespravna
            //DO SQL ZADAT --- chalan' OR 1 = 1; UPDATE zapocet_tabulka SET Frajerka = 'Paulina' WHERE Chlapec = 'Rado'; UPDATE zapocet_tabulka SET Frajerka = 'Laura' WHERE Chlapec = 'Marko
            // $sql = "SELECT * FROM zapocet_tabulka WHERE Chlapec = 'chalan' OR 1 = 1; UPDATE zapocet_tabulka SET Frajerka = 'Paulina' WHERE Chlapec = 'Marko'; UPDATE zapocet_tabulka SET Frajerka = 'Laura' WHERE Chlapec = 'Rado'";

            //spravna
            $sql = "SELECT * FROM zapocet_tabulka WHERE Chlapec = '$_POST[fname]'";

            $stm = $conn->prepare($sql);
            $stm->execute();

            $chalani = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach($chalani as $chalan){
                echo $chalan["Chlapec"]." + ".$chalan["Frajerka"]."<br/>";
            }
        //osetrenie start 2/2
        /*}
    }*/
    //osetrenie end 2/2
}
    ?>

    <form action="index.php" method="post">
        <!-- chalan ktoreho chceme zistit frajerku -->
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>

        <input type="submit" value="submit">
    </form>
</body>
</html>