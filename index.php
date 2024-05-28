<?php
    include_once("php/header.php");
    include_once("php/footer.php");
?>

<!-- Begin Form -->
<form action="" method="post" name="inlog-kandidaat">
  <div class="mb-3">
    <label for="voornaam" class="form-label">Voornaam:</label>
    <input type="username" class="form-control" id="voornaam" aria-describedby="voornaam">
  </div>
  <div class="mb-3">
    <label for="achternaam" class="form-label">Achternaam:</label>
    <input type="password" class="form-control" id="achternaam">
  </div>
  <div class="mb-3">
    <label for="examennummer" class="form-label">Examen Nummer:</label>
    <input type="number" class="form-control" id="examennummer">
    <div id="examennummer" class="form-text">Het examen nummer heb je ontvangen bij het aanmelden!</div>
  </div>
  <button type="submit" class="btn btn-success">Begin Examen</button>
</form><!-- einde Form -->