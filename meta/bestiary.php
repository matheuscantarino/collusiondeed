<?php
    include('../connection.php');
    $sql = "SELECT * FROM partymembers";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
    while ($register = mysqli_fetch_array($result)) {
        $ptmname = $register['ptmname'];
        $ptmicon = $register['ptmicon'];
 }
?>
<link rel="stylesheet" href="../css/bestiary.css">
<html>
    <body>
    <div class = "beastiarylefthud">
        <div class = "beasttypehud">
            <p>Dragons</p>
        </div>
    </div>
    </body>
</html>