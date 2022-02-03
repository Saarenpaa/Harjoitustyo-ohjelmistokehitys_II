
// Nappi joka poistaa seuraavan divin näkyvistä tai tuo sen takaisin.
// Käytän tätä lähinnä kommenttien ja aiheiden luomisessa.
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

// Highlighttaa uusimman postauksen
function glow(){
  setTimeout(() => {
      let hash = window.location.hash;
      if(hash != ''){
          latestElement = document.getElementById(hash.substring(1).toString());

          latestElement.style.backgroundColor = 'rgba(255, 255, 255, 0.1)';
          alert("postaus onnistui!")
      }
  }, 2);
}

// Scrollaa ikkunan hieman ylemmäs, ettei postaus ole täysin kiinni sivun yläreunassa
function fixPos(){
  setTimeout(() => {
    let hash = window.location.hash
    if(hash != ''){
      let offset = document.documentElement.scrollTop - 120;
      window.scrollTo({
        top: offset
      });
    }
  }, 2);
}