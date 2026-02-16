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
  