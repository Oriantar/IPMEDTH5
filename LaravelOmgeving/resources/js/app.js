import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



document.addEventListener("DOMContentLoaded", function() {
    var button = document.getElementById("alarmButton");
    // var buttonBackground = document.getElementById("alarmButtonBackground");
    var alarmButtonCheckbox = document.getElementById("alarmButtonCheckbox");
    // var alarmValue = {!! json_encode($alarm->alarm) !!};
    // var alarmValue = document.getElementById('alarm').getAttribute('data-alarm');
    var alarmValue = document.getElementById('alarmValue').value;
    var notificatieValue = document.getElementById('notificatieValue').value;
    console.log(alarmValue)

    console.log(button.classList);

    console.log(alarmButtonCheckbox.checked);

    // Check if button state is stored in local storage
    var isButtonGreen = localStorage.getItem("isButtonGreen");
    if (alarmValue == 1) {
        console.log("banaan");
        button.classList.add("button-green");
        alarmButtonCheckbox.checked = true;
        console.log(document.getElementById("alarmButtonCheckbox").checked);
        document.getElementById("alarmButtonCheckbox").checked = true;
        console.log(document.getElementById("alarmButtonCheckbox").checked);
        setTimeout(function() {
            console.log(alarmButtonCheckbox.checked); // Should output true
        }, 1000);
        alarmButtonCheckbox.parentElement.innerHTML += '';
        console.log(alarmButtonCheckbox.checked);
        console.log("banaan");
        // buttonBackground.classList.add("button-background-green")

        var styleElement = document.createElement("style");
        var cssCode = `
        #alarmHandle {
            transform: translateX(45px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), 0 0 0 3px #05c46b;
        }

        #alarmButtonBackground {
            background-color: #05c46b;
            box-shadow: inset 0 0 0 2px #04b360;
        }

        #alarmButton:before {
            color: #05c46b;
            right: -15px;
        }

        #alarmButtonBackground #alarmHandle {
            transform: translateX(40px);
        }
        `;

        // Set the CSS code as the text content of the <style> element
        styleElement.textContent = cssCode;
    
        // Append the <style> element to the document's <head>
        document.head.appendChild(styleElement);
        }

    console.log(alarmButtonCheckbox.checked);

    // Add click event listener to the button
    button.addEventListener("click", function() {
        // Toggle button color
        button.classList.toggle("button-green");

        // Store button state in local storage
        if (button.classList.contains("button-green")) {
            localStorage.setItem("isButtonGreen", "true");
            // alarmButtonCheckbox.checked = false;
        } else {
            localStorage.removeItem("isButtonGreen");
            // alarmButtonCheckbox.checked = true;
        }
        
    });
    if (notificatieValue == 1) {
        var styleElement = document.createElement("style");
        var cssCode = `
        #notificatieHandle {
            transform: translateX(45px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), 0 0 0 3px #05c46b;
        }

        #notificatieButtonBackground {
            background-color: #05c46b;
            box-shadow: inset 0 0 0 2px #04b360;
        }

        #notificatieButton:before {
            color: #05c46b;
            right: -15px;
        }

        #notificatieButtonBackground #notificatieHandle {
            transform: translateX(40px);
        }
        `;

        // Set the CSS code as the text content of the <style> element
        styleElement.textContent = cssCode;
    
        // Append the <style> element to the document's <head>
        document.head.appendChild(styleElement);
        }

    console.log(alarmButtonCheckbox.checked);

    


    
});