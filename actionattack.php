<?php
    //JEGUE! O NAME DO SELECT JÁ DEFINE QUAL SKILL ESTÁ SENDO USADA, O OPTION VAI SÓ DEFINIR O ALVO!
    include('connection.php');
    //$quickkey = $_POST['quickkey1'];
    //$quickkey = 'basicattack';
    $member = 'Kassar';
    session_start();
    if ($_POST['quickkey1'] != 'empty'){
        //$attack = $skilldamage;
            $quickkey = 'quickkey1';
            $enemyfocused = $_POST['quickkey1'];
    }
    if ($_POST['quickkey2'] != 'empty'){
        $quickkey = 'quickkey2';
    }

    //Detecta qual habilidade foi usada
    $sql = "SELECT * FROM skillbar WHERE ptmusing = '{$member}' AND quickkey = '{$quickkey}'";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
        while ($register = mysqli_fetch_array($result)){
            $skillused = $register['skillname'];
        }

    //Busca a habilidade que foi usada
    $sql = "SELECT * FROM skills WHERE skillname = '{$skillused}'";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
        while ($register = mysqli_fetch_array($result)){
            $skilldamage = $register['skilldamage'];
            echo $skilldamage;
        }
    
    //Busca o inimigo atacado
    $sql = "SELECT * FROM enemies WHERE enemyid = '{$enemyfocused}'";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
        while ($register = mysqli_fetch_array($result)){
            $enemytargetname = $register['enemyname'];
            $enemytargetnamevisual = $register['enemyvisualname'];
            $enemytargetlifetotal = $register['enemylife'];
            $enemytargetlife = $register['enemylifecurrent'];
            $enemytargetdifficultyhit = $register['enemydifficultyhit'];
            $enemyid = $register['enemyid'];
            echo $enemytargetname;
        }
    
    //Calcula o dano do ataque
    $damagedone = $skilldamage - $enemytargetdifficultyhit;

    //Calcula se o ataque acerta ou se o DH é maior
    if($damagedone >= 1){
        $enemylifecurrent = $enemytargetlife - $damagedone;
        if ($enemylifecurrent <= 0)
        echo 'enemy dead';
    }else{
        echo $enemylifecurrent;
    }

    //Altera a vida atual do alvo
    $sql = "UPDATE enemies SET enemylifecurrent = '{$enemylifecurrent}' WHERE enemyid = '{$enemyid}'";
    
    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
      } else {
        //echo "Error updating record: " . $conn->error;
    }

    //Cria um registro escrito para o DB
    if($enemylifecurrent > 0){
        $dbregistry = $enemytargetnamevisual . '&nbsp' . 'current' . '&nbsp' . 'life:' . '&nbsp' . '(' . $enemylifecurrent . ')';
    }else{
        $dbregistry = $enemytargetnamevisual . '&nbsp' . 'died.';
    }
    //Envia registro escrito para o DB
    $sql = "INSERT INTO registrygame (registrygamewords)
    VALUES ('$dbregistry')";

    if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //Busca registros escritos
    $deletereg = "SELECT registrygameid FROM registrygame";
    $deleteresult = mysqli_query($conn,$deletereg) or die("Error returning data");
    $deletecont = mysqli_num_rows($deleteresult);

    //Deleta registros antigos
    if($deletecont > 30){
        $sql = "DELETE FROM registrygame";

        if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
    }
    header('Location: index.php');









    //$enemylife = 3;
    //$damage = $enemylife - $skilldamage;

    //ATENÇÃO, JEGUE! PARA O OPTION FICAR SELECIONADO NO CLOSE PRECISA DAR UM HEADER NA PÁGINA, BURRO!
    //Header('Location: index.php');
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

//REGISTRY HUD = SÓ COLOCAR UMA VÁRIAS VARIÁVEIS DE AVISO DENTRO DO ECHO E CRIAR UMA SESSION
//CRIAR UMA TABELA DE REGISTROS
//IF $REGISTRYGAMEID > 30 >>> DELETE
?>