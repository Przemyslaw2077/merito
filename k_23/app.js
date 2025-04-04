/*let result = document.getElementById("result");

if (!localStorage.getItem("tekstwyswietlony") !== "true"){
    result.textContent = "witamy pierwszy raz na stronie";
    localStorage.setItem("tekstwyswietlony","true");
}

document.getElementById("contactForm").addEventListener("submit", function(event){
    event.preventDefault();
    result.textContent = "dziękujemy za wysłanie formularza";
});
*/
document.getElementById("contactForm").addEventListener("submit", function(event){
    event.preventDefault();
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();

    const gender = document.querySelector('input[name="gender"]:checked')?.value || "Nie podano";

    const interests = Array.from(document.querySelectorAll('input[name="interests"]:checked')).map(checkbox => checkbox.value).join(", ") || "Brak zainteresowań";

    clearErrors();
    let isValid = true;

    if(name.length < 2){
        displayError("name", "Imie musi mieć conajmniej 2 znaki");
        isValid = false;
    }

    if(message.length < 5){
        displayError("message", "wiadomość musi mieć conajmniej 5 znaków");
        isValid = false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailPattern.test(email)){
        displayError("email", "podaj poprawny email");
        isValid = false;
    }




    if(isValid){

        const resultDiv = document.getElementById('result');
        resultDiv.innerHTML = `
        <h3>Podsumowanie</h3>
        
        <p><strong>Imię:</strong> ${name}</p>
        <p><strong>Emial:</strong> ${email}</p>
        <p><strong>płeć:</strong> ${gender}</p>
        <p><strong>Wiadomość:</strong> ${interests}</p>
        <p><strong>Zainteresowania:</strong> ${message}</p>
        `;
    }

    
});

function displayError(fieldId, message){
    const field = document.getElementById(fieldId);
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    errorDiv.style.color = 'red';
    field.parentNode.insertBefore(errorDiv, field.nextSibling);
}

function clearErrors(){
    const errors = document.getElementsByClassName('error-message');
    while(errors.length > 0){
        errors[0].parentNode.removeChild(errors[0]);
    }
}