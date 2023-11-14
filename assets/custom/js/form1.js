document.addEventListener('DOMContentLoaded', function () {
    
    const currentStep = document.querySelector('.etape.active');
    let inputs = currentStep.querySelectorAll('input');
    let selects = currentStep.querySelectorAll('select');

    const excludedFields = ['financement', 'tutelle', 'status', 'equipe', 'tel', 'code'];
    
    selects.forEach(function (select) {
      select.addEventListener('change', function () {
        validateField(select);
        
      });
    });
    inputs.forEach(function (input) {
      input.addEventListener('input', function () {
        validateField(input);
        
      });
    });
  
    const civ = document.getElementById('genre');
    const nom = document.getElementById('nom');
    const prenom = document.getElementById('prenom');
    const pays = document.getElementById('pays');
    const email = document.getElementById('email');
    const tel = document.getElementById('tel');
    const code = document.getElementById('code');

    const champs = [civ, nom, prenom, pays, email, tel, code];      

    const benef = document.getElementById('beneficiaire');
   
    benef.addEventListener('change', function () {
      
      const beneficiaire = benef.value;
      if (benef.selectedIndex != 0) {
        champs.forEach(function (champ) {
          champ.removeAttribute('required');
          champ.setAttribute('disabled', 'disabled');
          isValid = true;
        });          
      }else{
        champs.forEach(function (champ) {
          champ.setAttribute('required', 'required');
          champ.removeAttribute('disabled');
        });

      }
    });
    document.querySelectorAll('.next-btn').forEach(function (button) {
  
      button.addEventListener('click', function () {
       
        const currentStep = this.closest('.etape');
        const nextStep = currentStep.nextElementSibling;
  
        
        let isValid = true;

        /**
         * étape de l'identité
         */


        if (button.id === 'next') {
          if (benef.value == null || benef.value == "") {        
                  
            civ.addEventListener('change', function() {
              validateCiv();
            });
      
            nom.addEventListener('input', function() {
              validateNom();
            });
      
            prenom.addEventListener('input', function() {
              validatePrenom();
            });
      
            pays.addEventListener('change', function() {
              validatePays();
            });

            email.addEventListener('input', function() {
              validateEmail();
            });

            tel.addEventListener('input', function() {
              validateTel();
            });
            
            validateNom();
            validatePrenom();
            validateEmail();
            validateTel();
            validateCiv();
            validatePays();

            
            if (nom.validity.valid && prenom.validity.valid && email.validity.valid && tel.validity.valid && civ.validity.valid && pays.validity.valid) {
              isValid = true;
            } else {
              isValid = false;
            }
          }
          
          if( document.getElementById('demandeur') != null){
            
            const demandeur = document.getElementById('demandeur');
            validateDemandeur(demandeur);
            demandeur.addEventListener('change', function() {
              validateDemandeur(demandeur);
            });
          if (demandeur.selectedIndex !== 0) {
            isValid = true;
          } else {
            isValid = false;
          }
            
          }

          function validateDemandeur(demandeur) {
            
            if (demandeur.selectedIndex === 0) {
             
              demandeur.setCustomValidity("Veuillez renseigner la personne pour laquelle vous souhaitez faire la demande pour continuer.");
              document.getElementById('demandeurError').textContent = "Veuillez renseigner la personne pour laquelle vous souhaitez faire la demande pour continuer.";
            } else {
              demandeur.setCustomValidity("");
              document.getElementById('demandeurError').textContent = "";
            }
          }

          function validateCiv() {
            if (civ.selectedIndex === 0) {
              civ.setCustomValidity("Le champ civilité est obligatoire. Veuillez le renseigner pour continuer.");
              document.getElementById('genreError').textContent = "Le champ civilité est obligatoire. Veuillez le renseigner pour continuer.";
            } else {
              civ.setCustomValidity("");
              document.getElementById('genreError').textContent = "";
            }
          }

          function validateNom() {
            if (nom.validity.valueMissing) {
              nom.setCustomValidity("Le champ nom est obligatoire. Veuillez le renseigner pour continuer.");
              document.getElementById('nomError').textContent = "Le champ nom est obligatoire. Veuillez le renseigner pour continuer.";
            } else if (nom.validity.patternMismatch) {
              nom.setCustomValidity("Le champ nom doit orter au moins deux caractères (lettres, tirets (-) et espaces uniquement).");
              document.getElementById('nomError').textContent = "Le champ nom doit orter au moins deux caractères (lettres, tirets (-) et espaces uniquement).";
            } else {
              nom.setCustomValidity("");
              document.getElementById('nomError').textContent = "";
            }
          }
    
          function validatePrenom() {
            if (prenom.validity.valueMissing) {
              prenom.setCustomValidity("Le champ prénom est obligatoire. Veuillez le renseigner pour continuer.");
              document.getElementById('prenomError').textContent = "Le champ prénom est obligatoire. Veuillez le renseigner pour continuer.";
            } else if (prenom.validity.patternMismatch) {
              prenom.setCustomValidity("Le champ prénom doit orter au moins deux caractères (lettres, tirets (-) et espaces uniquement).");
              document.getElementById('prenomError').textContent = "Le champ prénom doit orter au moins deux caractères (lettres, tirets (-) et espaces uniquement).";
            } else {
              prenom.setCustomValidity("");
              document.getElementById('prenomError').textContent = "";
            }
          }
    
          function validatePays() {
            if (pays.selectedIndex === 0) {
              pays.setCustomValidity("Le champ pays est obligatoire. Veuillez le renseigner pour continuer.");
              document.getElementById('paysError').textContent = "Le champ pays est obligatoire. Veuillez le renseigner pour continuer.";
            } else {
              pays.setCustomValidity("");
              document.getElementById('paysError').textContent = "";
            }
          }

          function validateEmail() {
            if (email.validity.valueMissing) {
              email.setCustomValidity("Le champ email est obligatoire. Veuillez le renseigner pour continuer.");
              document.getElementById('emailError').textContent = "Le champ email est obligatoire. Veuillez le renseigner pour continuer.";
            } else if (email.validity.patternMismatch) {
              email.setCustomValidity("L'adresse e-mail doit être au format exemple@domaine.com.");
              document.getElementById('emailError').textContent = "L'adresse e-mail doit être au format exemple@domaine.com.";
            } else {
              email.setCustomValidity("");
              document.getElementById('emailError').textContent = "";
            }
          }
      
          function validateTel() {
            if (tel.validity.patternMismatch) {
              tel.setCustomValidity("Le numéro de téléphone ne doit contenir que des chiffres (max 10).");
              document.getElementById('telError').textContent = "Le numéro de téléphone ne doit contenir que des chiffres (max 10).";
            } else {
              tel.setCustomValidity("");
              document.getElementById('telError').textContent = "";
            }
          }
          
              
        }    

    /**
         * Gestion de l'événement pour le choix de la demarche
         */
        // Sélection des éléments HTML correspondant aux options
        const typed = document.getElementById('typed');
        // pour valider dès que la valeur change
        typed.addEventListener('change', function() {
          validateDemarche();
        });

        if (button.id === 'next1') {
          validateDemarche();
          if (typed.selectedIndex !== 0) {
            isValid = true;
          } else {
            isValid = false;
          }

        }

        function validateDemarche() {
          if (typed.selectedIndex === 0) {
            typed.setCustomValidity("Le type de démarche est obligatoire. Veuillez le renseigner pour continuer.");
            document.getElementById('typedError').textContent = "Le type de démarche est obligatoire. Veuillez le renseigner pour continuer.";
          } else {
            typed.setCustomValidity("");
            document.getElementById('typedError').textContent = "";
          }
        }
        const optionVisite = document.getElementById('visite');
        const optionRecrutement = document.getElementById('recrutement');

        const tutSelect = document.getElementById('tutelle');
        const statusSelect = document.getElementById('status');

        const financementSelect = document.getElementById('financement');
        const financementLabel = document.getElementById('financementLabel');

        const optionENS = document.getElementById('optENS');
        const optionCNRS = document.getElementById('optCNRS');
        const optionUCBL = document.getElementById('optUCBL');


        // Mapping des options à conserver pour chaque choix
        const optionsMapping = {
            recrVal: ['default', 'Post-Doctorant', 'Doctorant', 'Alternant', 'Stagiaire', 'IGR', 'IGE', 'ASI', 'Tech', 'Adjoint Tech'],
            visVal: ['default', 'Professeur invité', 'Collaborateur', 'Visite limitée'],
        };

        // Gestionnaire d'événement pour l'option "Visite"
        optionVisite.addEventListener('click', function(event) {
            // Désactiver la sélection de la tutelle et du financement
            tutSelect.setAttribute('disabled', 'disabled');
            financementSelect.setAttribute('disabled', true);
            financementLabel.classList.add('text-muted');
            document.getElementById('tutlabel').classList.add('text-muted');

            const optionsToKeep = optionsMapping['visVal'] || [];

            // Parcourir toutes les options de la liste déroulante du statut
            for (let i = 0; i < statusSelect.options.length; i++) {
                const option = statusSelect.options[i];
                const optionValue = option.value;

                // Vérifier si l'option doit être conservée ou supprimée
                if (optionsToKeep.includes(optionValue)) {
                    option.classList.remove('d-none'); // Affiche l'option
                } else {
                    option.classList.add('d-none'); // Masque l'option
                }
            }

          });

        optionRecrutement.addEventListener('click', function(event) {
          // Activer la sélection de la tutelle et du financement
          tutSelect.removeAttribute('disabled');
          financementSelect.removeAttribute('disabled');
          financementLabel.classList.add('text-muted');
          document.getElementById('tutlabel').classList.remove('text-muted');

          const optionsToKeep = optionsMapping['recrVal'] || [];

          // Parcourir toutes les options de la liste déroulante du statut
          for (let i = 0; i < statusSelect.options.length; i++) {
              const option = statusSelect.options[i];
              const optionValue = option.value;
              
              // on vérifie si l'option doit être conservée ou supprimée
              if (optionsToKeep.includes(optionValue)) {
              option.classList.remove('d-none'); // Affiche l'option
              } else {
              option.classList.add('d-none'); // Masque l'option
              }
          }
          });


        // Création d'un objet pour stocker les options de financement pour l'ENS
        let finENS = {};
        document.querySelectorAll('.ENS').forEach(function(option) {
          finENS[option.id] = option;
        });

        // Création d'un objet pour stocker les options de financement pour le CNRS
        let finCNRS = {};
        document.querySelectorAll('.CNRS').forEach(function(option) {
          finCNRS[option.id] = option;
        });

        // Création d'un objet pour stocker les options de financement pour l'UCBL
        let finUCBL = {};
        document.querySelectorAll('.UCBL').forEach(function(option) {
          finUCBL[option.id] = option;
        });

        // Gestionnaire d'événement pour l'option "ENS" : si on choisit comme tutelle ENS
        optionENS.addEventListener('click', function(event) {
          // Masquer les options de financement pour UCBL
          for (let optionId in finUCBL) {
            const option = finUCBL[optionId];
            option.classList.add('d-none');
          }

          // Masquer les options de financement pour CNRS
          for (let optionId in finCNRS) {
            const option = finCNRS[optionId];
            option.classList.add('d-none');
          }

          // Afficher les options de financement pour ENS
          for (let optionId in finENS) {
            const option = finENS[optionId];
            option.classList.remove('d-none');
          }

          // Rafraîchir le sélecteur de financement
          $('#financement').selectpicker('refresh');
        });

        // Gestionnaire d'événement pour l'option "CNRS" : si on choisit comme tutelle CNRS
        optionCNRS.addEventListener('click', function(event) {
          // Masquer les options de financement pour ENS
          for (let optionId in finENS) {
            const option = finENS[optionId];
            option.classList.add('d-none');
          }

          // Masquer les options de financement pour UCBL
          for (let optionId in finUCBL) {
            const option = finUCBL[optionId];
            option.classList.add('d-none');
          }

          // Afficher les options de financement pour CNRS
          for (let optionId in finCNRS) {
            const option = finCNRS[optionId];
            option.classList.remove('d-none');
          }

          // Rafraîchir le sélecteur de financement pour qu'il n'affiche que les options qui sont à afficher
          $('#financement').selectpicker('refresh');
        });

        // Gestionnaire d'événement pour l'option "UCBL" : si on choisit comme tutelle UCBL
        optionUCBL.addEventListener('click', function(event) {
          // Masquer les options de financement pour ENS
          for (let optionId in finENS) {
            const option = finENS[optionId];
            option.classList.add('d-none');
          }

          // Masquer les options de financement pour CNRS
          for (let optionId in finCNRS) {
            const option = finCNRS[optionId];
            option.classList.add('d-none');
          }

          // Afficher les options de financement pour UCBL
          for (let optionId in finUCBL) {
            const option = finUCBL[optionId];
            option.classList.remove('d-none');
          }

          // Rafraîchir le sélecteur de financement
          $('#financement').selectpicker('refresh');
        });

        /**
         * étape des dates
         */
        if (button.id === 'next4') {
          const inputs = document.getElementsByClassName('date');
          
          arrivee = inputs[0];
          depart = inputs[1];
          validateField(depart);
          validateField(arrivee);
          
          var currentdate = new Date();
         

          arrivee.addEventListener('input', function() {
            arrivee.setCustomValidity("");
            document.getElementById('darriveeError').textContent = "";
          });
          
          depart.addEventListener('input', function() {
            depart.setCustomValidity("");
            document.getElementById('departError').textContent = "";
          });

            if ((arrivee.value !== "" && depart.value !="") && arrivee.value >= depart.value) {
              depart.classList.add('is-invalid');
              depart.setCustomValidity("La date de départ ne doit pas être antérieure à la date d'arrivée.");
              document.getElementById('departError').textContent = "La date de départ ne doit pas être antérieure à la date d'arrivée.";
              isValid = false;
            }else if (currentdate >= new Date(arrivee.value)) {
              arrivee.classList.add('is-invalid');
              arrivee.setCustomValidity("La date d'arrivée ne doit pas être antérieure à la date du jour.");
              document.getElementById('darriveeError').textContent = "La date d'arrivée ne doit pas être antérieure à la date du jour.";
              isValid = false;
            } 
            else if (currentdate >= new Date(depart.value)) {
              depart.classList.add('is-invalid');
              depart.setCustomValidity("La date de départ ne doit pas être antérieure à la date du jour.");
              document.getElementById('departError').textContent = "La date de départ ne doit pas être antérieure à la date du jour.";
              isValid = false;
            } 
            else{
              depart.classList.remove('is-invalid');
              depart.setCustomValidity(""); // Réinitialiser le message d'erreur personnalisé
              arrivee.classList.remove('is-invalid');
              arrivee.setCustomValidity(""); 
              isValid = true;
            }
          
        }

     
       
  
        if (isValid) {
          currentStep.classList.remove('active');
          currentStep.classList.add('d-none');
          if(nextStep != null){
            nextStep.classList.add('active');
            nextStep.classList.remove('d-none');
          }


          /**
           * pour mettre à jour la couleur de l'étape active
           */

          if (currentStep.classList.contains("1")) {
          
            document.querySelector('.c1').classList.remove('d-none');
            document.querySelector('.n1').parentNode.parentNode.classList.add('active');
            document.querySelector('.n1').classList.add('d-none');
            document.querySelector('.t1').classList.remove('text-primary');
            document.querySelector('.t1').classList.add('text-dark');
            document.querySelector('.n2').classList.add('bg-primary');
            document.querySelector('.n2').classList.add('border-primary');
            document.querySelector('.n2').classList.remove('bg-secondary');
            document.querySelector('.n2').classList.remove('border-secondary');
            document.querySelector('.t2').classList.remove('text-muted');
            document.querySelector('.t2').classList.add('text-primary');
          }else if (currentStep.classList.contains("2")) {
            document.querySelector('.c2').classList.remove('d-none');
            document.querySelector('.n2').parentNode.parentNode.classList.add('active');
            document.querySelector('.n2').classList.add('d-none');
            document.querySelector('.t2').classList.remove('text-primary');
            document.querySelector('.t2').classList.add('text-dark');
            document.querySelector('.n3').classList.add('bg-primary');
            document.querySelector('.n3').classList.add('border-primary');
            document.querySelector('.n3').classList.remove('bg-secondary');
            document.querySelector('.n3').classList.remove('border-secondary');
            document.querySelector('.t3').classList.remove('text-muted');
            document.querySelector('.t3').classList.add('text-primary');

          }else if (currentStep.classList.contains("3")) {
            document.querySelector('.c3').classList.remove('d-none');
            document.querySelector('.n3').parentNode.parentNode.classList.add('active');
            document.querySelector('.n3').classList.add('d-none');
            document.querySelector('.t3').classList.remove('text-primary');
            document.querySelector('.t3').classList.add('text-dark');
            document.querySelector('.n4').classList.add('bg-primary');
            document.querySelector('.n4').classList.add('border-primary');
            document.querySelector('.n4').classList.remove('bg-secondary');
            document.querySelector('.n4').classList.remove('border-secondary');
            document.querySelector('.t4').classList.remove('text-muted');
            document.querySelector('.t4').classList.add('text-primary');

          }else if (currentStep.classList.contains("4")) { 
            document.querySelector('.c4').classList.remove('d-none');
            document.querySelector('.n4').parentNode.parentNode.classList.add('active');
            document.querySelector('.n4').classList.add('d-none');
            document.querySelector('.t4').classList.remove('text-primary');
            document.querySelector('.t4').classList.add('text-dark');
            document.querySelector('.n5').classList.add('bg-primary');
            document.querySelector('.n5').classList.add('border-primary');
            document.querySelector('.n5').classList.remove('bg-secondary');
            document.querySelector('.n5').classList.remove('border-secondary');
            document.querySelector('.t5').classList.remove('text-muted');
            document.querySelector('.t5').classList.add('text-primary');

          }
          
          //currentStep = nextStep;
  
          } else {
          currentStep.classList.add('was-validated');
        }
      });
    });
  


    document.querySelectorAll('.previous-btn').forEach(function (button) {
      console.log(button.parentNode.parentNode);
        button.addEventListener('click', function () {
          
          const currentStep = this.closest('.etape');
          const nextStep = currentStep.previousElementSibling;
    

            currentStep.classList.remove('active');
            currentStep.classList.add('d-none');
            if(nextStep != null){
              nextStep.classList.add('active');
              nextStep.classList.remove('d-none');
            }
    
            /**
             * pour mettre à jour la couleur de l'étape active quand on recule (clic sur precedent) 
             */
    
            if (currentStep.classList.contains("2")) {
              document.querySelector('.n1').parentNode.parentNode.classList.remove('active');
    
              document.querySelector('.t2').classList.remove('text-primary');
              document.querySelector('.t2').classList.add('text-muted');
    
              document.querySelector('.n2').classList.remove('bg-primary');
              document.querySelector('.n2').classList.remove('border-primary');
              document.querySelector('.n2').classList.add('bg-secondary');
              document.querySelector('.n2').classList.add('border-secondary');
              
            }else if (currentStep.classList.contains("3")) {
              document.querySelector('.n2').parentNode.parentNode.classList.remove('active');
    
              document.querySelector('.c2').classList.add('d-none');
              document.querySelector('.n2').classList.remove('d-none');
              document.querySelector('.t2').classList.remove('text-dark');
              document.querySelector('.t2').classList.add('text-primary');
              document.querySelector('.n2').classList.add('bg-primary');
    
              document.querySelector('.t3').classList.remove('text-primary');
              document.querySelector('.t3').classList.add('text-muted');
    
              document.querySelector('.n3').classList.remove('bg-primary');
              document.querySelector('.n3').classList.remove('border-primary');
              document.querySelector('.n3').classList.add('bg-secondary');
              document.querySelector('.n3').classList.add('border-secondary');
    
            }else if (currentStep.classList.contains("4")) {
              document.querySelector('.n3').parentNode.parentNode.classList.remove('active');
    
              document.querySelector('.c3').classList.add('d-none');
              document.querySelector('.n3').classList.remove('d-none');
              document.querySelector('.t3').classList.remove('text-dark');
              document.querySelector('.t3').classList.add('text-primary');
              document.querySelector('.n3').classList.add('bg-primary');
    
              document.querySelector('.t4').classList.remove('text-primary');
              document.querySelector('.t4').classList.add('text-muted');
    
              document.querySelector('.n4').classList.remove('bg-primary');
              document.querySelector('.n4').classList.remove('border-primary');
              document.querySelector('.n4').classList.add('bg-secondary');
              document.querySelector('.n4').classList.add('border-secondary');
    
            }else if (currentStep.classList.contains("5")) { 
              document.querySelector('.n4').parentNode.parentNode.classList.remove('active');
    
              document.querySelector('.c4').classList.add('d-none');
              document.querySelector('.n4').classList.remove('d-none');
              document.querySelector('.t4').classList.remove('text-dark');
              document.querySelector('.t4').classList.add('text-primary');
              document.querySelector('.n4').classList.add('bg-primary');
    
              document.querySelector('.t5').classList.remove('text-primary');
              document.querySelector('.t5').classList.add('text-muted');
    
              document.querySelector('.n5').classList.remove('bg-primary');
              document.querySelector('.n5').classList.remove('border-primary');
              document.querySelector('.n5').classList.add('bg-secondary');
              document.querySelector('.n5').classList.add('border-secondary');
    
            }
          
        });
      });
  
  
    function validateField(field) {
      const excludedFields = ['tel', 'financement', 'tutelle', 'status', 'equipe', 'code'];
  
      if (excludedFields.includes(field.id)) {
        return; // Ignorer la vérification des champs exclus
      }
  
      
      const fieldMessages = {
        // Messages d'erreur pour chaque champ de saisie
        demandeur: [
            "Veuillez choisir le demandeur.",
            "Le champ demandeur est obligatoire. Veuillez le renseigner pour continuer."
          ],
        genre: [
          "Veuillez sélectionner la civilité de votre choix.",
          "Le champ civilité est obligatoire. Veuillez le renseigner pour continuer."
        ],
        nom: [
          "Le champ nom est obligatoire. Veuillez le renseigner pour continuer.",
          "Le champ nom doit orter au moins deux caractères (lettres, tirets (-) et espaces uniquement)."
        ],
        prenom: [
          "Le champ prénom est obligatoire. Veuillez le renseigner pour continuer.",
          "Le champ prénom doit orter au moins deux caractères (lettres, tirets (-) et espaces uniquement)."
        ],
        pays: [
          "Veuillez sélectionner le pays de votre choix.",
          "Le champ pays est obligatoire. Veuillez le renseigner pour continuer."
        ],
        email: [
          "Le champ email est obligatoire. Veuillez le renseigner pour continuer.",
          "L'adresse e-mail doit être au format exemple@domaine.com."
        ],
        tel: [
          "Veuillez renseigner un numéro de téléphone.",
          "Le numéro de téléphone ne doit contenir que des chiffres (max 10)."
        ],
        typed:[
            "Veuillez sélectionner le type de demande.",
            "Le champ type de demande est obligatoire. Veuillez le renseigner pour continuer."
        ],
        depart: [
            "La date de départ ne doit pas être antérieure à la date d'arrivée.",
            "Le champ date de départ est obligatoire. Veuillez le renseigner pour continuer."
        ],
      };
  


      if (fieldMessages[field.id]) {
        const messages = fieldMessages[field.id];
        const errorElement = document.getElementById(field.id + 'Error');
      
        if (field.tagName.toLowerCase() === 'select') {
          const select = field;
          if (select.selectedIndex === 0) {
            select.classList.add('is-invalid');
            select.classList.remove('is-valid');
            errorElement.textContent = messages[0];
          } else {
            select.classList.remove('is-invalid');
            select.classList.add('is-valid');
            select.setCustomValidity('');
            errorElement.textContent = '';
          }
        } else {
          // Validation pour les autres types de champs (input, textarea, etc.)
          if (field.validity.valueMissing) {
            field.setCustomValidity(messages[0]);
            errorElement.textContent = messages[0];
          } else if (field.validity.patternMismatch) {
            field.setCustomValidity(messages[1]);
            errorElement.textContent = messages[1];
          } else {
            field.setCustomValidity('');
            errorElement.textContent = '';
          }
        }
      }
      
      
    }
    
  });
  

  document.addEventListener('DOMContentLoaded', function() {

  
    // Gestion de l'événement pour le bouton "Précédent"
    document.querySelectorAll('.previous-btn').forEach(function(button) {
      button.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher la soumission du formulaire par défaut
  
        // pour revenir à l'étape précédente du formulaire
        // Masquer l'étape actuelle et afficher l'étape précédente
        const currentStep = this.closest('.etape');
        const previousStep = currentStep.previousElementSibling;
  
        currentStep.classList.remove('active');
        currentStep.classList.add('d-none');
        previousStep.classList.add('active');
        previousStep.classList.remove('d-none');
      });
    });    
  
    
    /**
     * pour l'ordinateur
     */

    document.getElementById('ordiYes').addEventListener('click', function(event) {
      document.getElementById('os').classList.remove('d-none');
      document.getElementById('langue').classList.remove('d-none');
      document.getElementById('langue').classList.add('d-flex');
      document.getElementById('os').classList.add('d-flex');
    });

    document.getElementById('ordiNo').addEventListener('click', function(event) {
      document.getElementById('os').classList.add('d-none');
      document.getElementById('langue').classList.add('d-none');
      document.getElementById('langue').classList.remove('d-flex');
      document.getElementById('os').classList.remove('d-flex');
    });

    /**
     * Ecoute de tous les champs du formulaire pour récuperer les valeurs
     */


    const sendBtn = document.getElementById('final');
    let allInputs = document.querySelectorAll('input');
    let allSelects = document.querySelectorAll('select');
    let valeurs = {};

    let ordiAnswer = document.getElementsByName('ordi');
    ordiAnswer.forEach(function(radioButton) {
      radioButton.addEventListener('change', function() {
        valeurs['ordi'] = radioButton.value;
        });
    });

    let chimithAnswer = document.getElementsByName('chimith');
    chimithAnswer.forEach(function(radioButton) {
      radioButton.addEventListener('change', function() {
        valeurs['chimith'] = radioButton.value;
        });
    });

    let cdcAnswer = document.getElementsByName('cdcomm');
    cdcAnswer.forEach(function(radioButton) {
      radioButton.addEventListener('change', function() {
        valeurs['cdcomm'] = radioButton.value;
        });
    });

    let SaxsAnswer = document.getElementsByName('SAXS');
    SaxsAnswer.forEach(function(radioButton) {
      radioButton.addEventListener('change', function() {
        valeurs['SAXS'] = radioButton.value;
        });
    });

    let LaserAnswer = document.getElementsByName('laser');
    LaserAnswer.forEach(function(radioButton) {
      radioButton.addEventListener('change', function() {
        valeurs['laser'] = radioButton.value;
        });
    });

    sendBtn.addEventListener('click', function(event) {

      allSelects.forEach(function (select) {
          valeurs[select.id] = select.value;
      });

      allInputs.forEach(function (input) {
          valeurs[input.id] = input.value;
      });


    /**pour toutes les valeurs de valeurs 
     * pour transmettre les valeurs à la modale de confirmation
    */
    let getValueSpans = document.getElementsByClassName('valeur');
    Array.from(document.getElementsByClassName('valeur')).forEach(function (span) {
      if (valeurs[span.previousElementSibling.classList[0]]) {
        if (valeurs[span.previousElementSibling.classList[0]] != 'default' 
          && valeurs[span.previousElementSibling.classList[0]] != "") {
          span.textContent = valeurs[span.previousElementSibling.classList[0]];
        }
        else {
          span.textContent = 'Non renseigné';
        }

    if (span.previousElementSibling.classList[0] == 'demandeur' && valeurs['demandeur']) {
      span.parentNode.parentNode.classList.remove('d-none');
    }
        if (span.previousElementSibling.classList[0] == 'os' 
          || span.previousElementSibling.classList[0] == 'langue') {
        
          if (valeurs['ordi'] && valeurs['ordi'] == 'oui') {
            
            span.parentNode.classList.remove('d-none');
            span.parentNode.classList.add('d-flex');

          }else {
            
          }
          
        }
        
      }else
      {

        if (span.previousElementSibling.classList[0] == 'genre' 
          || span.previousElementSibling.classList[0] == 'nom'
          || span.previousElementSibling.classList[0] == 'prenom'
          || span.previousElementSibling.classList[0] == 'pays'
          || span.previousElementSibling.classList[0] == 'email'
          || span.previousElementSibling.classList[0] == 'tel') {
            if (valeurs['beneficiaire'] != null && valeurs['beneficiaire'] != "") {
              
              span.parentNode.classList.remove('d-flex');
              span.parentNode.classList.add('d-none');
  
            }else {
              
            }
          }else {
            span.textContent = 'Non renseigné';
          }
        
      }
      
      console.log(span.previousElementSibling);
    });

      
    });


});

