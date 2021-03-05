<?php
    session_start();
    include('enemyloader.php');
    include('./scripts/general/party.php');
    include('connection.php');
    //include('actionattack.php');
    //$id = $_GET['id'];

    //Busca quem está no seu grupo
    $sql = "SELECT * FROM partymembers";
    $result = mysqli_query($conn,$sql) or die("Error returning data");

    //Busca os registros escritos
    $registrysql = "SELECT * FROM registrygame";
    $registryresult = mysqli_query($conn,$registrysql) or die("Error returning data");

    //Busca registro dos dialógos
    $dialoguesql = "SELECT * FROM dialogue";
    $dialogueresult = mysqli_query($conn,$dialoguesql) or die("Error returning data");

    //Busca registro de respostas
    $answersql = "SELECT * FROM answers";
    $answerresult = mysqli_query($conn,$answersql) or die("Error returning data");

    //$damage = 1;
    $gamestagedialogue = 'starting';
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="icon" type="imagem/png" href="logo.png" />
    </head>
    <body>
        <div class = "partyhud">
            <h2>Party</h2>
            <p1><?php while ($register = mysqli_fetch_array($result)) {
                    $ptmname = $register['ptmname'];
                    $ptmicon = $register['ptmicon'];
                    //echo $ptmname;?>
                    <div class = "pmicon">
                        <img src="<?php echo $ptmicon?>">
                    </div>           
                <?php }?>
            </p1>
        </div>
        <div class = "minimap">
        </div>
        <div class = "registryhud">
            <p>
               <?php
                    while ($register = mysqli_fetch_array($registryresult)) {
                        $registrygamewords = $register['registrygamewords'];
                        $registrygameid = $register['registrygameid'];
                        echo $registrygamewords;?><br><?php
                    }
               ?>
            </p>
                <?php
                    while ($register = mysqli_fetch_array($dialogueresult)) {
                        $dialoguechar = $register['dialoguechar'];
                        $dialoguemessage = $register['dialoguemessage'];
                        $dialoguenum = $register['dialoguenum'];
                        $dialoguesituation = $register['dialoguesituation'];
                        //$dialoguecharresp = $_SESSION['dialoguecharresp'];
                        //$dialoguemessageresp = $_SESSION['dialoguemessageresp'];
                        $dialoguenumres = $_SESSION['dialoguenumres'];
                        //$dialoguesituation = $_SESSION['dialoguesituation'];
                        if($dialoguesituation == 'active'){
                            ?><p2> <?php echo $dialoguechar . '&nbsp' . 'speaks' . ':' . '&nbsp' . $dialoguemessage;?></p2><br>
                            <p2> <?php echo $_SESSION['dialoguemessageresp'];?></p2><br><?php
                            //echo $dialoguecharresp . '&nbsp' . 'speaks' . ':' . '&nbsp' . $dialoguemessageresp;
                        }
                    }
                ?>
            <p3>
                <?php
                    while ($register = mysqli_fetch_array($answerresult)) {
                        $answertxt = $register['answertxt'];
                        $answernum = $register['answernum'];
                        $answeroption = $register['answeroption'];
                        //$_SESSION['answernum'] = $answernum;
                        if($answernum == $dialoguenum && $_SESSION['commandbox'] == $answeroption){
                            echo $answertxt;?><br><?php
                        }
                    }
                ?>
            </p3>
        </div>
        <div class = "commandbox">
            <form name="actionattack" method="POST" action="actiondialogue.php">
                <input type="text" name="commandbox"><br>
                <button></button>
            </form>
        </div>
        <div class = "footerhud">
                <div class = "actionicon1">
                </div>
                <div class = "actionicon2">
                </div>
        </div>
        <div class = "interfacehud">
            <div class = "worldmapicon">
                <img src="./style/icons/mapicon.png" width="50" height="50">
            </div>
            <div class = "partyicon">
            </div>
            <div class = "inventoryicon">
                <img src="./style/icons/bagicon.png" width="50" height="50">
            </div>
            <div class = "questsicon">
            </div>
        </div>
        <div class = "board">
            <h2></h2>
        </div>
    </body>
<html>
    