const slideshowImages = document.querySelectorAll(".home_slideshow");
let slideIndex = 0;

function updateSlide() {
    // Verberg alle afbeeldingen in de slideshow
    slideshowImages.forEach(image => {image.style.display = "none";});

    // Verander de display van de volgende image naar flex, zodat hij zichtbaar wordt
    slideshowImages[slideIndex].style.display = "flex";

    // Update de index voor de volgende keer dat deze functie wordt gecalled
    slideIndex = (slideIndex + 1) % slideshowImages.length;
}

// Call updateSlide meteen, zodat alle afbeeldingen worden verborgen
updateSlide();

// Start een interval om de slides te updaten hierna
setInterval(updateSlide, 2000);