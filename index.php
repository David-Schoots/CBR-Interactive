<?php
    include_once("php/header.php");
?>

<!-- Begin Form -->
<div class="contrainer d-flex justify-content-center  align-items-center text-center">
  <form class="p-3 border rounded" action="" method="post" name="inlog-kandidaat">
    <div class="mb-3 form-group">
      <label for="voornaam" class="form-label">Voornaam:</label>
      <input type="text" class="form-control" id="voornaam" name="voornaam" aria-describedby="voornaam">
    </div>
    <div class="mb-3 form-group">
      <label for="achternaam" class="form-label">Achternaam:</label>
      <input type="username" class="form-control" id="achternaam" name="achternaam">
    </div>
    <div class="mb-3 form-group">
      <label for="examennummer" class="form-label">Examen Nummer:</label>
      <input type="number" class="form-control" id="examennummer" name="examennummer">
      <div id="examennummer" class="form-text">Het examen nummer heb je ontvangen bij het aanmelden!</div>
    </div>
    <button type="submit" class="btn btn-success">Begin Examen</button>
  </form><!-- einde Form -->
</div>

<?php
    include_once("php/footer.php");
?>

<?php 
include "config.php";
$_SESSION["gevaarHerkenning"] = [];
    $_SESSION["kennis"] = [];
        $_SESSION["inzicht"] = [];

$_SESSION["correctFalseQuestions"] = [];
$questionCount = 0;

$sqli_question = $conn->prepare("SELECT id FROM cbr_question WHERE category='J' ORDER BY RAND() LIMIT 25");
$sqli_question->bind_result($id);

if($sqli_question === false) {
    echo mysqli_error($conn); 
    } else{
        if($sqli_question->execute()) { 
            while($sqli_question->fetch()){ 
                $_SESSION["gevaarHerkenning"][$questionCount] = $id;
                $questionCount++;
            }
        }
        $sqli_question->close();
        
    }

$sqli_question = $conn->prepare("SELECT id FROM cbr_question WHERE category='A' OR category='B' OR category='C' OR category='D' OR category='E' OR category='F' OR category='G' OR category='K' OR category='L' OR category='R' OR category='S' OR category='T' OR category='U' OR category='V' OR category='W' OR category='X' OR category='Y' ORDER BY RAND() LIMIT 12");
$sqli_question->bind_result($id);

if($sqli_question === false) {
    echo mysqli_error($conn); 
    } else{
        if($sqli_question->execute()) { 
         
            while($sqli_question->fetch()){ 
                $_SESSION["kennis"][$questionCount] = $id;
                $questionCount++;
            }
        }
        $sqli_question->close();
       
    }

$sqli_question = $conn->prepare("SELECT id FROM cbr_question WHERE category='I' OR category='M' OR category='N' OR category='O' OR category='P' OR category='Q' OR category='Z' ORDER BY RAND() LIMIT 28");
$sqli_question->bind_result($id);

if($sqli_question === false) {
    echo mysqli_error($conn); 
    } else{
        if($sqli_question->execute()) { 
       
            while($sqli_question->fetch()){ 
                $_SESSION["inzicht"][$questionCount] = $id;
                $questionCount++;
            }
        }
        $sqli_question->close();
       
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/test.css">
    <script src="assets/js/script.js" defer></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <div id="test">

    <?php
        include "config.php";

        $offset = 0;

        $sqli_question = $conn->prepare("SELECT id,type,image,question FROM cbr_question WHERE id = ? LIMIT 1");
        $sqli_question->bind_param("i", $_SESSION["gevaarHerkenning"][$offset]);

        if($sqli_question === false) {
            echo mysqli_error($conn); 
            } else{
                if($sqli_question->execute()) { 
                $sqli_question->bind_result($id,$type,$image,$question);
                    
                while($sqli_question->fetch()){

                
                $sqli_answers = $con->prepare("SELECT question_A,question_B,question_C FROM `cbr_answers` WHERE question_id = $id;");

                if($sqli_answers === false) {
                    echo mysqli_error($con); 
                    } else{
                        if($sqli_answers->execute()) { 
                            $sqli_answers->bind_result($question_A,$question_B,$question_C); 
                                
                                while($sqli_answers->fetch()){ ?>
                        
                            
                            <p class="testButton"><?= $question; ?></p>
        
                            <?php 
                                if($question_A != "") { ?>
                                    <button class="testButton" value="1" name="question" onclick="submitQuestion(<?= $offset + 1; ?>,1,<?= $type; ?>,<?= $id; ?>)"><?= $question_A; ?></button>
                            
                            <?php }
                                if($question_B != "") { ?>
                                    <button class="testButton" value="2" name="question" onclick="submitQuestion(<?= $offset + 1; ?>,2,<?= $type; ?>,<?= $id; ?>)"><?= $question_B; ?></button>
                           
                            <?php }
                                if($question_C != "") { ?>    
                                    <button class="testButton" value="3" name="question" onclick="submitQuestion(<?= $offset + 1; ?>,3,<?= $type; ?>,<?= $id; ?>)"><?= $question_C; ?></button>
                            <?php }

                        
                 


                                }
                        }
                        $sqli_answers->close();
                    }
                    
                    }
                } 
            $sqli_question->close();
            }
    ?>    
    </div>
</body>
</html>