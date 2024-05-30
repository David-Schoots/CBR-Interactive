<?php
        include "config.php";

        $offset = $_GET["nextQuestion"];
        $valueAnswer = $_GET["answerValue"];
        $correctValue = $_GET["correctValue"];
        $pastQuestion = $_GET["pastQuestionId"];

        if($valueAnswer == $correctValue){
        
            $_SESSION["vragen"][$offset]["goedFout"] = true;
            $_SESSION["vragen"][$offset]["id"] = $pastQuestion;
        } else{
            
            $_SESSION["vragen"][$offset]["goedFout"] = false;
            $_SESSION["vragen"][$offset]["id"] = $pastQuestion;
        }



        if($offset < 25) {
            $sqli_question = $conn->prepare("SELECT id,type,image,question FROM cbr_question WHERE id = ? LIMIT 1");
            $sqli_question->bind_param("i", $_SESSION["gevaarHerkenning"][$offset]);

            $typeVraag = "Gevaarherkenning";
        } else if($offset >= 25 && $offset < 37) {
            $sqli_question = $conn->prepare("SELECT id,type,image,question FROM cbr_question WHERE id = ? LIMIT 1");
            $sqli_question->bind_param("i", $_SESSION["kennis"][$offset]);
            
            $typeVraag = "Kennis";
        }else if($offset >= 37 && $offset < 65) {
            $sqli_question = $conn->prepare("SELECT id,type,image,question FROM cbr_question WHERE id = ? LIMIT 1");
            $sqli_question->bind_param("i", $_SESSION["inzicht"][$offset]);

            $typeVraag = "Inzicht";
        }

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
                       <?php }
                        }
                        $sqli_answers->close();
                    }
                    
                    }
                } 
            $sqli_question->close();
            }
        
    ?>    