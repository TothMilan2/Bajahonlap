
function setupHoverEffect() {
    const images = document.querySelectorAll("[id^='fooldal-latnivalok2Kep']"); 

    images.forEach((image, index) => {

        const textClass = `textonimage_${index + 1}`; 
        const text = document.getElementsByClassName(textClass)[0];

        if (text) {
            image.onmouseenter = function () {
                text.style.visibility = "visible";
            };

            image.onmouseleave = function () {
                text.style.visibility = "hidden";
            };
        }
    });
}

setupHoverEffect();