<?php
    session_start();
    include('enemyloader.php');
    include('./scripts/general/party.php');
    include('connection.php');
    //$id = $_GET['id'];
    $sql = "SELECT * FROM partymembers";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
    //$damage = 1;
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/index.css">
    <head>
    <body>
        <div class = "partyhud">
            <h2>Party<h2>
            <p1><?php while ($register = mysqli_fetch_array($result)) {
                    $ptmname = $register['ptmname'];
                    $ptmicon = $register['ptmicon'];
                    echo $ptmname;?><br>
                <?php }?>
            </p1>
            <div class = "pmicon">
            </div>
            <div class = "pmicon2">
            </div>
        </div>
        <div class = "minimap">
        </div>
        <div class = "registryhud">
                <div class = "commandbox">
                    <form>
                        <input type="text" id="fname" name="fname"><br>
                    </form>
                </div>
        </div>
        <div class = "footerhud">
                <div class = "actionicon">
                </div>
                <div class = "interacticon">
                </div>
                <div class = "basicattackicon">
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
    