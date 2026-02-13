
function keresesiFunkcio(inputId) {
    const searchInput = document.getElementById(inputId);
    const cards = document.querySelectorAll('#latnivalok_card');
  
    searchInput.addEventListener('input', function () {
      const searchValue = this.value.toLowerCase();
  
      cards.forEach(card => {
        const cardText = card.innerText.toLowerCase();
        if (cardText.includes(searchValue)) {
          card.style.display = ''; 
        } else {
          card.style.display = 'none'; 
        }
      });
    });
  }
  

  keresesiFunkcio('navbarSearchInput'); 
  keresesiFunkcio('offcanvasSearchInput'); 