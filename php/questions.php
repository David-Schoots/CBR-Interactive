<?php
    include_once("header.php");
?>
<!-- begin van de vragen -->
<!-- container voor de photo's -->
<!-- <div class="container">
    <div class="mb-3">
        <img src="../assets/logo/Test-vraag.jpeg" class="img-fluid rounded float-start" style="width: 40%; height: auto;" alt="Vraag">
    </div>
</div>

< container voor de knoppen -->
<!-- 
<div class="container d-flex flex-row justify-content-end">
        <div class="mb-3">
            <input class="btn btn-primary" type="button" value="Antwoord 1">
            <input class="btn btn-primary" type="button" value="Antwoord 2">
            <input class="btn btn-primary" type="button" value="Antwoord 3">

    </div>
</div>  -->


<div class="container">
        <div class="row">
            <div class="col-md-6 image-container">
                <div class="mb-3">
                    <img src="../assets/logo/Test-vraag.jpeg" class="img-fluid rounded" alt="Vraag" style="width: 80%; height: auto;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 text-center">
                    <h3>Wie heeft er Voorrang?</h3>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                    <button class="btn btn-primary  mb-4" style="width: 50%;"><span class="icon"><i class="bi bi-app"></i><span class="slash" style="">|</span></span><span class="text">Rode Auto</span></button>
                    <button class="btn btn-primary  mb-4" style="width: 50%;"><span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span><span class="text">Blauwe Auto</span></button>
                    <button class="btn btn-primary  mb-4" style="width: 50%;"><span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span><span class="text">Witte Auto</span></button>
                    <button class="btn btn-primary  mb-4" style="width: 50%;"><span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span><span class="text">Voetganger</span></button>               
                </div>

            </div>
         </div>
    </div>

<?php
    include_once("footer.php");
?>