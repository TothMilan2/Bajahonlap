
function searchText() {
  let input = document.getElementById("searchbox").value.toLowerCase();
  const content=document.getElementById('fooldal-main');

  // Remove previous highlights
  let spans = content.querySelectorAll("span.highlight");
  spans.forEach(span => {
    span.replaceWith(span.textContent);
  });

  if (!input) return;

//   let innerHTML = content.innerHTML;
  let regex = new RegExp(`(${input})`, "gi");

  // Highlight matches
  content.innerHTML = innerHTML.replace(regex, '<span class="highlight">$1</span>');

  // Scroll to first match
  let firstMatch = content.querySelector(".highlight");
  if (firstMatch) {
    firstMatch.scrollIntoView({ behavior: "smooth", block: "center" });
  } else {
    alert("No matches found");
  }
}
document.getElementById('searchButton').addEventListener('click', searchText);