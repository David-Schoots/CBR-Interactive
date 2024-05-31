<?php
    include_once("php/header.php");
    session_start();
?>

<!-- Begin Form -->
<div class="contrainer d-flex justify-content-center  align-items-center text-center">
  <form class="p-3 border rounded" action="php/questions.php" method="post" name="inlog-kandidaat">
    <div class="mb-3 form-group">
      <label for="voornaam" class="form-label">Voornaam:</label>
      <input type="text" class="form-control" id="voornaam" name="voornaam" aria-describedby="voornaam" required>
    </div>
    <div class="mb-3 form-group">
      <label for="achternaam" class="form-label">Achternaam:</label>
      <input type="username" class="form-control" id="achternaam" name="achternaam" required>
    </div>
    <div class="mb-3 form-group">
      <label for="examennummer" class="form-label">Examen Nummer:</label>
      <input type="number" class="form-control" id="examennummer" name="examennummer">
      <div id="examennummer" class="form-text">Het examen nummer heb je ontvangen bij het aanmelden!</div>
    </div>
    <button type="submit" name="submitButton" class="btn btn-success">Begin Examen</button>
  </form><!-- einde Form -->
</div>

<?php
    include_once("php/footer.php");
?>