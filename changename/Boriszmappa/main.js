let felGomb = document.getElementById("felGomb");

window.onscroll = function() {gorgetes()};

function gorgetes() {
  if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
    felGomb.style.display = "block";
  } else {
    felGomb.style.display = "none";
  }
}

function oldalTetejere() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}