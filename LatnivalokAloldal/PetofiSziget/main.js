/*kép lépegetés*/
document.querySelectorAll('[data-stack]').forEach(stack => {
    const imgs = stack.querySelectorAll('.img-stack-img');
    const prev = stack.querySelector('.prev');
    const next = stack.querySelector('.next');  
  
    let index = 0;
  
    function show(i){
      imgs.forEach(img => img.classList.remove('is-front'));
      imgs[i].classList.add('is-front');
      index = i;
    }
  
    prev.addEventListener('click', () => {
      show((index - 1 + imgs.length) % imgs.length);
    });
  
    next.addEventListener('click', () => {
      show((index + 1) % imgs.length);
    });
  
    imgs.forEach((img, i) => {
      img.addEventListener('click', () => show(i));
    });
});


/*fel gomb*/
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



/* */
document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll("#megtekitentesGomb");

  buttons.forEach(button => {
    button.addEventListener("click", () => {
      const id = button.getAttribute("data-id");
      loadContent(id);
    });
  });
});

function loadContent(id) {
  fetch("tartalom.json")
    .then(response => response.json())
    .then(data => {
      const place = data.places.find(p => p.id == id);
      if (place) {
        const contentContainer = document.getElementById("latnivalok_main");
        contentContainer.innerHTML = `
          <div class="place-details">
            <h1>${place.title}</h1>
            <img src="${place.image}" alt="${place.title}">
            <p>${place.description}</p>
          </div>
        `;
      }
    })
    .catch(error => console.error("Error loading content:", error));
}