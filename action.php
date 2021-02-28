<?php
    include('connection.php');
    $attack = $_POST['basicattack'];
    $member = 'elliot';

    //carrega a arma utilizada
    if ($attack == 'basicattack'){
        $sql = "SELECT * FROM itens WHERE itemequiped = '{$member}'";
        $result = mysqli_query($conn,$sql) or die("Error returning data");
    
    while ($register = mysqli_fetch_array($result)){
        $itemname = $register['itemname'];
        $itemnamevisual = $register['itemnamevisual'];
    }
    }
    //





    //$currentlocation = 'rodfastingfortresshall';
    //$sql = "SELECT * FROM scenarios WHERE scenarioname = '{$currentlocation}'";
    //$result = mysqli_query($conn,$sql) or die("Error returning data");
    //while ($register = mysqli_fetch_array($result)){
    //    $scenarioname = $register['scenarioname'];
    //    $scenarionamevisual = $register['scenarionamevisual'];
//}
?>