<?php 
include "config.php";

$offset = 0;

$_SESSION["gevaarHerkenning"] = [];
    $_SESSION["kennis"] = [];
        $_SESSION["inzicht"] = [];
            $_SESSION["voornaam"] = [];
                $_SESSION["achternaam"] = [];

if(isset($_POST['submitButton'])) {
    $_SESSION["voornaam"] = $_POST['voornaam'];
    $_SESSION["achternaam"] = $_POST['achternaam'];
}

$_SESSION["correctFalseQuestions"] = [];

$_SESSION["overigeVragen"] = [];
$_SESSION["overigeVragen"] = 1;
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
<?php
    include_once("header.php");
?>


<div class="container">
    <div id="containerTest">
<?php
        include "config.php";

        

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
                                    <div class="row">
                                        <div class="col-md-6 image-container">
                                            <div class="mb-3">
                                                <!-- Photo -->
                                                <img src="../assets/logo/<?= $image ?>" class="img-fluid rounded" alt="Vraag" style="width: 80%; height: auto;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 text-center">
                                                <!-- Vragen -->
                                                <h3><?= $question ?></h3>
                                            </div>
                                            <!-- Antwoord Knoppen -->
                                            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                                            
                                        <?php if($question_A != "") { ?>
                                                <button onclick="submitQuestion(<?= $offset + 1; ?>,1,<?= $type; ?>,<?= $id; ?>)" class="btn btn-primary mb-2" id="1" style="width: 50%;">
                                                    <span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span>
                                                    <span class="text"><?= $question_A; ?></span>
                                                </button>
                                          <?php }
                                                if($question_B != "") { ?>
                                                <button onclick="submitQuestion(<?= $offset + 1; ?>,2,<?= $type; ?>,<?= $id; ?>)" class="btn btn-primary mb-2" id="2" style="width: 50%;">
                                                    <span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span>
                                                    <span class="text"><?= $question_B; ?></span>
                                                </button>
                                          <?php }
                                                if($question_C != "") { ?> 
                                                <button onclick="submitQuestion(<?= $offset + 1; ?>,3,<?= $type; ?>,<?= $id; ?>)" class="btn btn-primary mb-2" id="3" style="width: 50%;">
                                                    <span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span>
                                                    <span class="text"><?= $question_C; ?></span>
                                                </button>
                                          <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                       <?php }
                        }
                        $sqli_answers->close();
                    }
                    
                    }
                } 
            $sqli_question->close();
            }
    ?>    

     


<?php
    include_once("footer.php");
?>
