<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $counter = 0;
    $gevaarherkennigFout = 0;
    $kennisFout = 0;
    $inzichtFout = 0;
    foreach ($_SESSION["vragen"] as $offset => $value) { 
        
        if($value["goedFout"] == false && $counter < 25) {
            $gevaarherkennigFout++;
        } else if($value["goedFout"] == false && $counter >= 25 && $counter < 37) {
            $kennisFout++;
        } else if($value["goedFout"] == false && $counter) {
            $inzichtFout++;
        }
       
        $counter++;

    }
   if($gevaarherkennigFout > 12 || $kennisFout > 2 || $inzichtFout > 3) {
    echo "je bent gezakt";
   }  
    ?>
</body>
</html>