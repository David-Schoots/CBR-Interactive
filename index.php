<?php
    include_once("php/header.php");
    include_once("php/footer.php");
?>

<!-- Begin Form -->
<div class="login-form text-center">
  <form class="p-3 border rounded" action="" method="post" name="inlog-kandidaat">
    <div class="mb-3">
      <label for="voornaam" class="form-label">Voornaam:</label>
      <input type="text" class="form-control" id="voornaam" name="voornaam" aria-describedby="voornaam">
    </div>
    <div class="mb-3">
      <label for="achternaam" class="form-label">Achternaam:</label>
      <input type="password" class="form-control" id="achternaam" name="achternaam">
    </div>
    <div class="mb-3">
      <label for="examennummer" class="form-label">Examen Nummer:</label>
      <input type="number" class="form-control" id="examennummer" name="examennummer">
      <div id="examennummer" class="form-text">Het examen nummer heb je ontvangen bij het aanmelden!</div>
    </div>
    <button type="submit" class="btn btn-success">Begin Examen</button>
  </form><!-- einde Form -->
</div>