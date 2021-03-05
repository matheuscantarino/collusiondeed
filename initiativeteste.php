<?php 
    include('connection.php');
    //$sql = "SELECT * FROM partymembers";

    $sql = "SELECT dexterity FROM partymembers
            UNION
            SELECT dexterity FROM enemies
            ORDER BY dexterity";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
        while ($register = mysqli_fetch_array($result)) {
            $dxt = $register['dexterity'];;
            echo $dxt;?><br><?php
        }
?>