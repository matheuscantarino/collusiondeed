<?php

    //JEGUE! O NAME DO SELECT JÁ DEFINE QUAL SKILL ESTÁ SENDO USADA, O OPTION VAI SÓ DEFINIR O ALVO!
    include('connection.php');
    $attack = $_POST['quickid1'];
    $member = 'elliot';
    //echo $attack;

    if ($_POST['quickid1'] != 'empty'){
        echo 'empty1';
    }else{
        if ($_POST['quickid2'] != 'empty'){
        echo 'empty2';
        }
    }
    //carrega a arma utilizada
    //if ($attack == 'basicattack'){
    //    $sql = "SELECT * FROM itens WHERE itemequiped = '{$member}'";
    //    $result = mysqli_query($conn,$sql) or die("Error returning data");
    
    //while ($register = mysqli_fetch_array($result)){
    //    $itemname = $register['itemname'];
    //    $itemnamevisual = $register['itemnamevisual'];
    //    echo $itemname;
    //}
    //}
    //





    //$currentlocation = 'rodfastingfortresshall';
    //$sql = "SELECT * FROM scenarios WHERE scenarioname = '{$currentlocation}'";
    //$result = mysqli_query($conn,$sql) or die("Error returning data");
    //while ($register = mysqli_fetch_array($result)){
    //    $scenarioname = $register['scenarioname'];
    //    $scenarionamevisual = $register['scenarionamevisual'];
//}


//SELECT * FROM SPELL WHERE QUICKID == $QUICKID & MEMBER == $MEMBER;
?>