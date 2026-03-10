document.addEventListener("click", (e) => {
  const btn = e.target.closest(".megtekitentesGomb");
  if (!btn) return;

  const id = btn.dataset.id;
  window.location.href = `ajanlatok_minta.html?id=${encodeURIComponent(id)}`;
});
