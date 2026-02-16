document.addEventListener("DOMContentLoaded", async () => {
  const params = new URLSearchParams(location.search);
  const id = params.get("id");

  const setText = (selector, value) => {
    const el = document.querySelector(selector);
    if (el && value != null) el.textContent = value;
  };

  const setImg = (selector, src, alt) => {
    const el = document.querySelector(selector);
    if (!el) return;
    if (src) el.src = src;
    if (alt) el.alt = alt;
  };

  if (!id) {
    const content = document.getElementById("latnivalokAl_content");
    if (content) content.innerHTML = "<h1>Hiba: nincs id a linkben.</h1>";
    return;
  }

  try {
    const res = await fetch("tartalom.json");
    const data = await res.json();

    const place = data.places.find(p => p.id === id);
    if (!place) {
      const content = document.getElementById("latnivalokAl_content");
      if (content) content.innerHTML = "<h1>Hiba: Látnivaló nem található.</h1>";
      return;
    }

    setText("#placeTitle", place.title);
    setText("#p1", place.p1);
    setText("#p2", place.p2);
    setText("#p3", place.p3);

    setImg("#img1", place.img1, place.alt1 || place.title);
    setImg("#img2", place.img2, place.alt2 || place.title);
    setImg("#img3", place.img3, place.alt3 || place.title);
    setImg("#img4", place.img4, place.alt4 || place.title);
    setImg("#img5", place.img5, place.alt5 || place.title);
    setImg("#img6", place.img6, place.alt6 || place.title);

  } catch (err) {
    console.error(err);
    const content = document.getElementById("latnivalokAl_content");
    if (content) content.innerHTML = "<h1>Hiba történt a tartalom betöltésekor.</h1>";
  }
});
