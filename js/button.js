function clickButton(buttonId) {
  let buttons = document.getElementsByClassName("bi");
  for (let i = 0; i < buttons.length; i++) {
    buttons[i].classList.remove("green-background");
  }

  // Zoek de button die is aangeklikt
  var button = document.getElementById(buttonId);

  // Zoek het icon element binnen de button
  var icon = button.querySelector(".bi");

  // Voeg de groene achtergrond kleur klasse toe aan het icon element
  icon.classList.add("green-background");
}

/* function Deselect(buttonId) {
  var button = document.getElementById(buttonId);

  // Zoek het icon element binnen de button
  var icon = button.querySelector(".bi");

  icon.classList.add("white-background");
} */
