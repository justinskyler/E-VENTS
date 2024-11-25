document.addEventListener("DOMContentLoaded", function(e) {
    e.preventDefault();
    if (Object.keys(errors).length > 0) { // Vérifie si le tableau d'erreurs n'est pas vide
        const firstErrorField = document.querySelector(".error:not(:empty) + input, .error:not(:empty) + select, .error:not(:empty) + textarea");
        if (firstErrorField) {
            firstErrorField.focus();
        }
    }
});
