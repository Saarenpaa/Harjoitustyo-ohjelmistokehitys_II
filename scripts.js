// Funktio joka hakee tyylitiedon CSS tiedostosta. Kopioitu stackoverflowsta.
/*function getStyle(id, name){
  var element = document.getElementById(id);
  return element.currentStyle ? element.currentStyle[name] : window.getComputedStyle ? window.getComputedStyle(element, null).getPropertyValue(name) : null;
};*/

// Nappi joka poistaa seuraavan divin näkyviltä tai tuo sen takaisin. Kätytän tätä lähinnä kommenttien ja aiheiden luomisessa.
function Collapsible(className){
  var buttons = document.getElementsByClassName(className);

  for (var i = 0; i < buttons.length; i++) {
  
  buttons[i].addEventListener("click", function() {
  
      var collapsible = this.nextElementSibling;

      if (collapsible.style.display === "block") {
      collapsible.style.display = "none";
      } else {
      collapsible.style.display = "block";
      }
  });
  };
};

// Ajastin rekisteröitymisen kiitossivulle
function timer(){
    let timer = document.getElementById("timer");

    let seconds = 2;
    setInterval(updateCountdown, 1000);
    
    function updateCountdown(){
        timer.innerHTML = `${seconds}`;
        seconds--;
        console.log(seconds);

        if(seconds < 0){
            window.location.replace("index.php");
        }
      }
}