document.addEventListener("DOMContentLoaded", function () {
  var duration = 1800; // Duration in seconds (30 minutes)
  var progressBar = document.getElementById("progress-bar");
  var timer = document.getElementById("timer");
  var remaining = duration;
  var width = 100;

  var interval = setInterval(function () {
    remaining--;
    width = (remaining / duration) * 100;
    progressBar.style.width = width + "%";
    progressBar.setAttribute("aria-valuenow", width);

    var minutes = Math.floor(remaining / 60);
    var seconds = remaining % 60;
    var timeText = minutes + "m " + (seconds < 10 ? "0" : "") + seconds + "s";

    timer.textContent = timeText;

    if (remaining <= 0) {
      clearInterval(interval);
      timer.textContent = "0m 00s";
    }
  }, 1000);
});
