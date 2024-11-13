// Wait for the document to fully load
document.addEventListener("DOMContentLoaded", function () {
    // Splash screen fade out and main content fade in
    setTimeout(() => {
        document.querySelector(".splash-screen").style.display = "none"; // Hide splash screen
        document.querySelector(".main-content").style.display = "block"; // Show main content
        document.querySelector(".main-content").classList.add("fade-in");
    }, 2000);
});
