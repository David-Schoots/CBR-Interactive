<?php
  $url = explode("/", $_SERVER['SCRIPT_FILENAME']);
  $currentpage = str_replace(".php", "", array_pop($url));
  
  switch($currentpage) {
    case "questions":
      $title = "Questions";
      $logo = "../assets/logo/cbr-logo.png";
      break;
  default:
      $logo = "assets/logo/cbr-logo.png";
      break;
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CBR - Theorie examen: Rijbewijs B | <?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  </head>
  <body class = "vh-100 d-flex flex-column justify-content-between overflow-hidden">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


 
 <nav class="navbar navbar-expand-lg" style="background:#009ddf"> 
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <img src="<?= $logo ?>" class="rounded" alt="logo" height="30px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <h4 class="h4 text-center text-white">Theorie examen: Rijbewijs B</h4>
        </li>
      </ul>
    </div>
  </div>
</nav>
