<?php
    include('connection.php');
    session_start();
    $anwsernum = $_SESSION['answernum'];
    $commandbox = $_POST['commandbox'];
    $_SESSION['commandbox'] = $commandbox;
    $answersql = "SELECT * FROM answers WHERE answernum = '{$anwsernum}'";
    $answerresult = mysqli_query($conn,$answersql) or die("Error returning data");
    while ($register = mysqli_fetch_array($answerresult)) {

    }

    $dialoguesql = "SELECT * FROM dialogue WHERE dialoguenum = '{$anwsernum}' AND dialogueoption = '{$commandbox}'";
    $dialogueresult = mysqli_query($conn,$dialoguesql) or die("Error returning data");
    while ($register = mysqli_fetch_array($dialogueresult)) {
        $dialoguecharresp = $register['dialoguechar'];
        $dialoguemessageresp = $register['dialoguemessage'];
        $dialoguenumresp = $register['dialoguenum'];
        
        $_SESSION['dialoguecharresp'] = $dialoguecharresp;
        $_SESSION['dialoguemessageresp'] = $dialoguemessageresp;
        $_SESSION['dialoguenumres'] = $dialoguenumresp;
        
        echo $dialoguemessageresp;
        $_SESSION['dialoguemessageresp'] = $dialoguemessageresp;

        $sql = "UPDATE answers SET answernum = '{$commandbox}'";
    
        if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
        } else {
            //echo "Error updating record: " . $conn->error;
        }
    }

    //SELECT dialogue WHERE answer resp = dialoguenum;
    // answernum - answercommand - answersequence
?>