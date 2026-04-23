function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

function searchText() {

  let input = document.getElementById("searchbox").value.toLowerCase();
  if (!input.trim()) { 
    alert("Kérlek, írj be valamit a kereséshez!");
    return;
  }

  const content = document.getElementsByName("esemenyek_main");

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
  } else {
    alert("Nem található");
  }
}
  
  
function clearSelected() {
  const content = document.getElementsByClassName("esemenyek_main");
  
  content.innerHTML = content.innerHTML.replace(
    /<span[^>]*class=["']highlight["'][^>]*>(.*?)<\/span>/g,
    '$1'
  );
}
  
document.getElementById('searchbutton').addEventListener('click', searchText);