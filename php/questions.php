<?php
    include_once("header.php");
?>


<div class="container">
        <div class="row">
            <div class="col-md-6 image-container">
                <div class="mb-3">
                    <!-- Photo -->
                    <img src="../assets/logo/Test-vraag.jpeg" class="img-fluid rounded" alt="Vraag" style="width: 80%; height: auto;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 text-center">
                    <!-- Vragen -->
                    <h3>Wie heeft er Voorrang?</h3>
                </div>
                <!-- Antwoord Knoppen -->
                <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                    <button onclick="clickButton('q1')" class="btn btn-primary mb-2" id="q1" style="width: 50%;">
                        <span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span>
                        <span class="text">Rode Auto</span>
                    </button>
                    <button onclick="clickButton('q2')" class="btn btn-primary mb-2" id="q2" style="width: 50%;">
                        <span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span>
                        <span class="text">Blauwe Auto</span>
                    </button>
                    <button onclick="clickButton('q3')" class="btn btn-primary mb-2" id="q3" style="width: 50%;">
                        <span class="icon"><i class="bi bi-app"></i><span class="slash">|</span></span>
                        <span class="text">Witte Auto</span>
                    </button>
                </div>
            </div>
         </div>
    </div>
    <div class="text-center">  
        <button onclick="clickButton('q3')" class="btn btn-primary mb-2" id="N" style="width: 20%;">
            <i class="bi bi-arrow-left">Vorig</i>
        </button>
        <button onclick="clickButton('q3')" class="btn btn-primary mb-2" disabled ="P" style="width: 20%;">
            <i class="bi bi-arrow-right">Next</i>
        </button>
    </div>
    
</button>

     


<?php
    include_once("footer.php");
?>