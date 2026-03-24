function searchText() {

  console.log("Search function called");
  let input = document.getElementById("searchbox").value.toLowerCase();
  const content = document.getElementById('latnivalok_main');




  content.querySelectorAll("span.highlight").forEach(span => {
    span.replaceWith(span.textContent);
  });


  if (!input) return;
  setTimeout(() => {
    
  }, 1000);
  
  let innerHTML2 = content.innerHTML;  
  let regex = new RegExp(`(${input})`, "gi");

  content.innerHTML = innerHTML2.replace(regex, '<span class="highlight">$1</span>');

  setTimeout(() => {
    let firstMatch = content.querySelector(".highlight");
    
    if (firstMatch) {
      firstMatch.scrollIntoView({
        behavior: "auto",
        block: "center"
    });
    

    }
    
}, 20);

  
   
}

document.getElementById('searchbutton').addEventListener('click', searchText);




