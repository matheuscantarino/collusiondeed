<?php
    //para carregar todos os inimigos do cenário basta eu criar uma coluna da tabela com a localspawn, e depois colocar um WHERE localspawn = localspawn
    include('connection.php');
    $currentlocation = 'rodfastingfortresshall';
    $sql = "SELECT * FROM enemies WHERE localspawn = '{$currentlocation}'";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
?>
<link rel="stylesheet" href="./css/index.css">
    <div class = "rollbutton">
    <form name="actionattack" method="POST" action="actionattack.php">
        <select name="quickkey1" id="quickkey1">
        <option value="empty">Close</option>
            <?php
                while ($register = mysqli_fetch_array($result)){
                        $enemyicon = $register['enemyicon'];
                        $enemyname = $register['enemyname'];
                        $enemyvisualname = $register['enemyvisualname'];
                        $enemylife = $register['enemylife'];
                        $enemylifecurrent = $register['enemylifecurrent'];
                        $enemyid = $register['enemyid'];
                        if($enemylifecurrent > -1000){
                        ?>
                        <option value="<?php echo $enemyid;?>"><?php echo $enemyvisualname;?></option><?php
                }
                }
            ?>
        </select>
        <select name="quickkey2" id="quickkey2">
            <option value="empty">Close</option>
            <option value="enemy">Enemy</option>
        </select>
        <button>Roll!</button>
    </form>
    </div>