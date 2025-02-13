let images = {
    "classic": ["images/classicskoda.png", "images/before1.png", "images/after1.png", "images/before2.png", "images/after2.png"],
    "refresh": ["images/alcantara.png", "images/polo1.png" , "images/polo.png", "images/matten.jpg"],
    "diamond": ["images/ext.png", "images/refresh.png" , "images/beforeja.png", "images/afterja.png"],
    "extra": ["images/motorkap1.png", "images/motorkap2.png"],
};

let currentIndex = 0;
let currentCategory = "";

function openLightbox(category) {
    currentCategory = category;
    currentIndex = 0;
    updateLightbox();
    document.getElementById("lightbox").style.display = "flex";
}

function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
}

function changeImage(direction) {
    currentIndex += direction;
    if (currentIndex < 0) currentIndex = images[currentCategory].length - 1;
    if (currentIndex >= images[currentCategory].length) currentIndex = 0;
    updateLightbox();
}

function updateLightbox() {
    document.getElementById("lightbox-img").src = images[currentCategory][currentIndex];
}
