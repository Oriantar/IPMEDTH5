import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function() {
    var button = document.getElementById("myButton");

    // Check if button state is stored in local storage
    var isButtonGreen = localStorage.getItem("isButtonGreen");
    if (isButtonGreen === "true") {
        button.classList.add("button-green");
    }

    // Add click event listener to the button
    button.addEventListener("click", function() {
        // Toggle button color
        button.classList.toggle("button-green");

        // Store button state in local storage
        if (button.classList.contains("button-green")) {
            localStorage.setItem("isButtonGreen", "true");
        } else {
            localStorage.removeItem("isButtonGreen");
        }
    });
});