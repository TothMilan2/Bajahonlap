function escapeRegExp(string) {
  return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

function searchText() {

  let input = document.getElementById("searchbox").value.toLowerCase();
  const content = document.getElementById("fooldal-main");


  if (!input) return;
  '<span class="highlight">$1</span>'
  content.innerHTML = content.innerHTML.replace(
    /<span class="highlight">(.*?)<\/span>/g,
    '$1'
  ); 

  const safeInput = escapeRegExp(input);

  const regex = new RegExp(`(?![^<]*>)(${safeInput})`, "i");

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

document.getElementById('searchbutton').addEventListener('click', searchText);


