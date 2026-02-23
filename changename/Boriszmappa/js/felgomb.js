document.addEventListener("DOMContentLoaded", function () {

    const felGomb = document.getElementById("felGomb");
    if (!felGomb) return;
  
    window.addEventListener("scroll", function () {
      if (window.scrollY > 150) {
        felGomb.style.display = "block";
      } else {
        felGomb.style.display = "none";
      }
    });
  
    window.oldalTetejere = function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    };
  
  });
  

  /*let felGomb = document.getElementById("felGomb");

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
} */