// Funktio joka hakee tyylitiedon CSS tiedostosta. Kopioitu stackoverflowsta.
/*function getStyle(id, name){
  var element = document.getElementById(id);
  return element.currentStyle ? element.currentStyle[name] : window.getComputedStyle ? window.getComputedStyle(element, null).getPropertyValue(name) : null;
};*/

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

/*function commentFilter(){
  var filter = document.getElementById("filter");

  filter.addEventListener("change", function(){

    console.log(filter.value);
    if (filter.value === 'vanhin ensin'){
      window.location.reload();
    }
  });
};*/