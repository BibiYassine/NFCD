function openNav() {
    document.getElementById("sidenav").style.width = "250px"; 
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0"; 
}

AOS.init(); // Initialize animation library

// Function to flip the image on click
function flipImage() {
    const container = document.querySelector('.flip-container');
    container.classList.toggle('flipped');
}
