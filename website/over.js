// JavaScript for hamburger menu
function openNav() {
    document.getElementById("sidenav").style.width = "250px"; // Set width for side menu
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0"; // Reset width to hide side menu
}

// Initialize AOS (Animate On Scroll Library)
AOS.init();

// Function to flip the image on click
function flipImage() {
    const container = document.querySelector('.flip-container');
    container.classList.toggle('flipped');
}
