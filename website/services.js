document.addEventListener('DOMContentLoaded', function() {
    const sliders = document.querySelectorAll('.slider');
    
    sliders.forEach(slider => {
        const images = slider.querySelectorAll('.slider-image');
        let currentIndex = 0;
        
        function showNextImage() {
            images[currentIndex].style.opacity = 0;
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].style.opacity = 1;
        }
        
        setInterval(showNextImage, 3000); // Verander afbeelding elke 3 seconden
    });
});
// services.js
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const navbar = document.getElementById('navbar');

    menuToggle.addEventListener('click', function() {
        navbar.classList.toggle('active');
    });
});

