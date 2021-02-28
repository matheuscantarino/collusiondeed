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
        <select name="quickid1" id="quickid1">
            <?php
                while ($register = mysqli_fetch_array($result)){
                        $enemyname = $register['enemyname'];
                        $enemyvisualname = $register['enemyvisualname'];
                        ?>
                        <option value="<?php echo $enemyname;?>"><?php echo $enemyvisualname;?></option><?php
                }
            ?>
            <option value="empty">Close</option>
        </select>
        <select name="quickid2" id="quickid2">
                        <option value="enemy">Enemy</option>
            </select>
        <button>Roll!</button>
    </form>
    </div>