<?php
    session_start();
    include_once("header.php");
?>
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
   if($gevaarherkennigFout > 12 || $kennisFout > 2 || $inzichtFout > 3) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 image-container">
                <div class="mb-3">
                    <!-- Photo -->
                    <img src="../assets/logo/gezakt.png" class="img-fluid rounded" alt="Vraag" style="width: 50%; height: auto;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 text-center">
                    <!-- Vragen -->
                 <h3>Beste <?= $_SESSION['voornaam']; ?> <?= $_SESSION['achternaam']; ?></h3>
                    <h5>Helaas heb je het Theorie examen: Rijbewijs B niet gehaald.<br><br></h5>
                    <h5>Je hebt <?= $gevaarherkennigFout; ?>/25 Gevaarherkenning's vragen fout</h6>
                    <h5>Je hebt <?= $kennisFout; ?>/12 Kennis vragen fout</h6>
                    <h5>Je hebt <?= $inzichtFout; ?>/28 Inzicht vragen fout</h6>
                    <br>
                    <button onclick="exitExamen()" class="btn btn-primary mb-2" id="1" style="width: 50%;">
                        <span class="text">Examen eindigen</span>
                    </button>
                </div>
                <!-- Antwoord Knoppen -->
            </div>
         </div>
    </div>
   <?php } else { ?>
<!-- geslaagd -->
<div class="container">
        <div class="row">
            <div class="col-md-6 image-container">
                <div class="mb-3">
                    <!-- Photo -->
                    <<img src="../assets/logo/geslaagd.png" class="img-fluid rounded" alt="Vraag" style="width: 50%; height: auto;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 text-center"> 
                    <!-- Vragen -->
                         <h3>Beste <?= $_SESSION['voornaam']; ?> <?= $_SESSION['achternaam']; ?></h3>
                    <h5>Gefeliciteerd met het behalen van het Theorie examen: Rijbewijs B.<br><br></h5>
                    <h5>Je hebt <?= $gevaarherkennigFout; ?>/25 Gevaarherkenning's vragen fout</h6>
                    <h5>Je hebt <?= $kennisFout; ?>/12 Kennis vragen fout</h6>
                    <h5>Je hebt <?= $inzichtFout; ?>/28 Inzicht vragen fout</h6>
                    <br>
                    <button onclick="exitExamen()" class="btn btn-primary mb-2" id="1" style="width: 50%;">
                        <span class="text">Examen eindigen</span>
                    </button>
                </div>
                <!-- Antwoord Knoppen -->
           </div>
         </div>
    </div>

   <?php }
   ?>

<!-- gezakt -->
    





<?php
    include_once("footer.php");
?>

