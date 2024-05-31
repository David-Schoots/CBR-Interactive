var offset = 0;
var valueAnswer = 0;
var valueCorrectAnswer = 0;
var currentQuestionId = 0;

function submitQuestion(nieuweOffset,answerValue,correctValue,id) {
    offset = nieuweOffset;
    valueAnswer = answerValue;
    valueCorrectAnswer = correctValue;
    currentQuestionId = id;
    typeVraag = "";

    let buttons = document.getElementsByClassName("bi");
  for (let i = 0; i < buttons.length; i++) {
    buttons[i].classList.remove("green-background");
  }

  // Zoek de button die is aangeklikt
  var button = document.getElementById(valueAnswer);

  // Zoek het icon element binnen de button
  var icon = button.querySelector(".bi");

  // Voeg de groene achtergrond kleur klasse toe aan het icon element
  icon.classList.add("green-background");

    
      setTimeout(function () {
        if(offset == 65) {
          window.location.href = "../php/resultaat.php";
        } else {
          newQuestion();
        }
      }, 200);
    

    huidigeVraag = document.getElementById("vraagHuidig");
    huidigeVraag.innerHTML = totaalVraagen + "/65";
        
}

function exitExamen() {
  window.location.href = "../index.php";
}

function newQuestion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // console.log(this.responseText);
        document.getElementById("containerTest").innerHTML = this.responseText;
        
      }  
      
    };
    xhttp.open("GET", "nieuwevraag.php?nextQuestion="+offset+"&answerValue="+valueAnswer+"&correctValue="+valueCorrectAnswer+"&pastQuestionId="+currentQuestionId, true);
    xhttp.send();
  };