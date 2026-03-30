function escapeRegExp(string) {
  return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

function searchText() {
  let input = document.getElementById("searchbox").value.toLowerCase();
  const content = document.getElementById("fooldal-main");

  if (!input) return;

  content.innerHTML = content.innerHTML.replace(
    /<span class="highlight">(.*?)<\/span>/g,
    '$1'
  ); // ezt itt még 

  const safeInput = escapeRegExp(input);

  const regex = new RegExp(`(?![^<]*>)(${safeInput})`, "gi");

  // Apply highlight
  content.innerHTML = content.innerHTML.replace(
    regex,
    '<span class="highlight" style="text-decoration: underline; background-color: red">$1</span>'
  );


  // Scroll to first match
  const firstMatch = content.querySelector(".highlight");
  

  if (firstMatch) {

    firstMatch.scrollIntoView({
    behavior: "smooth",
    block: "center"

  });
} 
else {
  alert("Hiba");
} 
}

document.getElementById('searchbutton').addEventListener('click', searchText);


