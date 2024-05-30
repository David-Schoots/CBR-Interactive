<?php
        include "config.php";

        $offset = $_GET["nextQuestion"];
        echo $offset;
        $valueAnswer = $_GET["answerValue"];
        $correctValue = $_GET["correctValue"];
        $pastQuestion = $_GET["pastQuestionId"];

        if($valueAnswer == $correctValue){
            echo "je hebt vraag " . $pastQuestion . " goed";
            $_SESSION["vragen"][$offset]["goedFout"] = true;
            $_SESSION["vragen"][$offset]["id"] = $pastQuestion;
        } else{
            echo "je hebt vraag " . $pastQuestion . " fout";
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
                        
                            <p><?= $typeVraag; ?></p>
                            <p class="testButton"><?= $question; ?></p>
        
                            <?php 
                                if($question_A != "") { ?>
                                        <button class="testButton" value="1" name="question" onclick="submitQuestion(<?= $offset + 1; ?>,1,<?= $type ?>,<?= $id ?>)"><?= $question_A; ?></button>
                            <?php }
                                if($question_B != "") { ?>
                                        <button class="testButton" value="2" name="question" onclick="submitQuestion(<?= $offset + 1; ?>,2,<?= $type ?>,<?= $id ?>)"><?= $question_B; ?></button>

                            <?php }
                                if($question_C != "") { ?>
                                        <button class="testButton" value="3" name="question" onclick="submitQuestion(<?= $offset + 1; ?>,3,<?= $type ?>,<?= $id ?>)"><?= $question_C; ?></button>
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