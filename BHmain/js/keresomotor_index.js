function escapeRegExp(string) {
  return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

function searchText() {

  let input = document.getElementById("searchbox").value.toLowerCase();
  const content = document.getElementById("fooldal-main");

  clearSelected();



  const safeInput = escapeRegExp(input);

  const regex = new RegExp(`(?![^<]*>)(${safeInput})`, "gi");

  // Apply highlight
  content.innerHTML = content.innerHTML.replace(
    regex,
    '<span class="highlight" style="text-decoration: underline;">$1</span>'
  );


  // Scroll to first match
  const talalat = content.querySelector(".highlight");
  

  if (talalat) {

    talalat.scrollIntoView({
    behavior: "smooth",
    block: "center"

  });
} 
else {
  alert("Nem találató");
} 
}



function clearSelected() {
  const content = document.getElementById("fooldal-main");

  content.innerHTML = content.innerHTML.replace(
    /<span[^>]*class=["']highlight["'][^>]*>(.*?)<\/span>/g,
    '$1'
  );
}




document.getElementById('searchbutton').addEventListener('click', searchText);


