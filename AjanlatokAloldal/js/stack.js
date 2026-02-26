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