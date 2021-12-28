// Funktio joka hakee tyylitiedon CSS tiedostosta. Kopioitu stackoverflowsta.
function getStyle(id, name){
  var element = document.getElementById(id);
  return element.currentStyle ? element.currentStyle[name] : window.getComputedStyle ? window.getComputedStyle(element, null).getPropertyValue(name) : null;
};

// Funktio joka näyttää kommentti-kentän nappia painamalla.
function newComment(){
  
  var new_thread = document.getElementById('new_thread');
  var display_style = getStyle('new_thread', 'display');

  if(display_style == 'none'){
      new_thread.style.display = 'block';
      setTimeout(new_thread.style.maxHeight = '1500px',1000);
      //new_thread.style.transition = 'max-height 0.25s ease-in';
  }
  else{
      new_thread.style.maxHeight = '0px';
      new_thread.style.display = 'none';
      //new_thread.style.transition = 'max-height 0.15s ease-out';
  };
};