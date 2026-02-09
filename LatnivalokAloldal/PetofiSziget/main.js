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