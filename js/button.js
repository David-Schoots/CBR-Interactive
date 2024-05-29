function clickButton(buttonId) {
  // Zoek de button die is aangeklikt
  var button = document.getElementById(buttonId);

  // Zoek het icon element binnen de button
  var icon = button.querySelector(".bi");

  // Voeg de groene achtergrond kleur klasse toe aan het icon element
  icon.classList.add("green-background");
}
