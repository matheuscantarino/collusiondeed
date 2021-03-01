<?php
    //JEGUE! O NAME DO SELECT JÁ DEFINE QUAL SKILL ESTÁ SENDO USADA, O OPTION VAI SÓ DEFINIR O ALVO!
    include('connection.php');
    //$quickkey = $_POST['quickkey1'];
    //$quickkey = 'basicattack';
    $member = 'Kassar';
    
    if ($_POST['quickkey1'] != 'empty'){
        //$attack = $skilldamage;
            $quickkey = 'quickkey1';
    }else{
        if ($_POST['quickkey2'] != 'empty'){
            $quickkey = 'quickkey2';
        }
    }

    //Detecta qual habilidade foi usada
    $sql = "SELECT * FROM skillbar WHERE ptmusing = '{$member}' AND quickkey = '{$quickkey}'";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
        while ($register = mysqli_fetch_array($result)){
            echo $register['quickkey'];
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

//SELECT * FROM PARTYMEMBERS WHERE QUICKID == $QUICKID & MEMBER == $MEMBER;
        //SELECT * FROM SKILLS WHERE SKILLNAME == $SKILLNAME;
//SELECT * FROM SPELL WHERE QUICKID == $QUICKID & MEMBER == $MEMBER;
?>