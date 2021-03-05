<?php
    include('connection.php');
    $inimigoid = 1;
    $enemyattacksql = "SELECT * FROM enemies WHERE enemyid = '{$inimigoid}'";
    $enemyattackresult = mysqli_query($conn,$enemyattacksql) or die("Error returning data");
        while ($register = mysqli_fetch_array($enemyattackresult)){
            $enemyname = $register['enemyname'];
            echo $enemyname;
        }
?>