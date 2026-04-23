function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

function searchText() {
    let input = document.getElementById("searchbox").value.toLowerCase();
    const content = document.getElementById("latnivalok_main");
  
    clearSelected();

    const safeInput = escapeRegExp(input);
    const regex = new RegExp(`(?![^<]*>)(${safeInput})`, "gi");
  
    content.innerHTML = content.innerHTML.replace(
      regex,
      '<span class="highlight" style="text-decoration: underline;">$1</span>'
    );
  
    const talalat = content.querySelector(".highlight");

    if (talalat) {
      talalat.scrollIntoView({
      behavior: "smooth",
      block: "center"
      });
    } 
  else {
    alert("Nem található");
  }
}
  
function clearSelected() {
  const content = document.getElementById("latnivalok_main");
  
  content.innerHTML = content.innerHTML.replace(
    /<span[^>]*class=["']highlight["'][^>]*>(.*?)<\/span>/g,
    '$1'
  );
}
  

document.getElementById('searchbutton').addEventListener('click', searchText);
  
  
  