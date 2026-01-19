let mybutton = document.getElementById("myBtn");

window.onscroll = function() {gorgetes()};

function gorgetes() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function oldalTetejere() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}