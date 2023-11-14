document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.getElementById("save");

    const nomperm = document.getElementById("nomperm").value;
    const prenomperm = document.getElementById("prenomperm").value;
    const emailperm = document.getElementById("emailperm").value;
    const login = document.getElementById("login").value;
    const axePerm = document.getElementById("axePerm").value;

 
        
    
    submitButton.addEventListener("click", function (event) {             
        
        (function () {
            'use strict'
          
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
          
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
              .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                  if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                  }
          
                  form.classList.add('was-validated')
                }, false)
              })
          })()

        // Réinitialiser les messages d'erreur
        document.getElementById("nompermError").innerHTML = "";
        document.getElementById("prenompermError").innerHTML = "";
        document.getElementById("emailpermError").innerHTML = "";
        document.getElementById("loginError").innerHTML = "";
        document.getElementById("axeError").innerHTML = "";
        console.log("test2");

        // Variable pour vérifier si le formulaire est valide
        var isValid = true;

        // Validation du champ nomperm
        if (nomperm === "") {
            document.getElementById("nompermError").innerHTML = "Veuillez saisir le nom du permanent pour continuer.";
            isValid = false;
        }else if (nomperm.length < 2) {
            document.getElementById("nompermError").innerHTML = "Le nom du permanent doit contenir au moins 2 caractères.";
            isValid = false;
        }

        // Validation du champ prenomperm
        if (prenomperm.trim() === "") {
            document.getElementById("prenompermError").innerHTML = "Veuillez entrer le prénom du permanent.";
            isValid = false;
        }

        // Validation du champ emailperm
        if (emailperm.trim() === "") {
            document.getElementById("emailpermError").innerHTML = "Veuillez entrer une adresse e-mail pour le permanent.";
            isValid = false;
        }

        // Validation du champ login
        if (login.trim() === "") {
            document.getElementById("loginError").innerHTML = "Veuillez renseigner le login du permanent.";
            isValid = false;
        }

        // Validation du champ axePerm
        if (axePerm === "") {
            document.getElementById("axeError").innerHTML = "Veuillez choisir une équipe de recherche.";
            isValid = false;
        }

        if (isValid) {
            document.getElementById("addPermForm").submit();
        }

    });

   
});
