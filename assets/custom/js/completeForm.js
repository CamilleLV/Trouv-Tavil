document.addEventListener('DOMContentLoaded', function () {
  

document.querySelectorAll('.next1-btn').forEach(function (button) {
  
    button.addEventListener('click', function () {
      
      const currentStep = this.closest('.etape');
      const nextStep = currentStep.nextElementSibling;

      
      let isValid = true;


      /**
       * Traitement pour la validation de la partie 1 du formulaire (identité)
       */
      var nom = document.getElementById('nomComp');
      var prenom = document.getElementById('prenomComp');
      var email = document.getElementById('emailComp');
      var tel = document.getElementById('telComp');

      nom.addEventListener('input', function() {
        validateNom();
      });

      prenom.addEventListener('input', function() {
        validatePrenom();
      });

      email.addEventListener('input', function() {
        validateEmail();
      });

      tel.addEventListener('input', function() {
        validateTel();
      });

      function validateNom() {
        if (nom.validity.valueMissing) {
          nom.setCustomValidity("Le champ nom est obligatoire. Veuillez le renseigner pour continuer.");
          document.getElementById('nomCompError').textContent = "Le champ nom est obligatoire. Veuillez le renseigner pour continuer.";
        } else if (nom.validity.patternMismatch) {
          nom.setCustomValidity("Le champ nom doit comporter au moins deux caractères (lettres, tirets (-) et espaces uniquement).");
          document.getElementById('nomCompError').textContent = "Le champ nom doit comporter au moins deux caractères (lettres, tirets (-) et espaces uniquement).";
        } else {
          nom.setCustomValidity("");
          document.getElementById('nomCompError').textContent = "";
        }
      }

      function validatePrenom() {
        if (prenom.validity.valueMissing) {
          prenom.setCustomValidity("Le champ prénom est obligatoire. Veuillez le renseigner pour continuer.");
          document.getElementById('prenomCompError').textContent = "Le champ prénom est obligatoire. Veuillez le renseigner pour continuer.";
        } else if (prenom.validity.patternMismatch) {
          prenom.setCustomValidity("Le champ prénom doit comporter au moins deux caractères (lettres, tirets (-) et espaces uniquement).");
          document.getElementById('prenomCompError').textContent = "Le champ prénom doit comporter au moins deux caractères (lettres, tirets (-) et espaces uniquement).";
        } else {
          prenom.setCustomValidity("");
          document.getElementById('prenomCompError').textContent = "";
        }
      }

      function validateEmail() {
        if (email.validity.valueMissing) {
          email.setCustomValidity("Le champ email est obligatoire. Veuillez le renseigner pour continuer.");
          document.getElementById('emailCompError').textContent = "Le champ email est obligatoire. Veuillez le renseigner pour continuer.";
        } else if (email.validity.patternMismatch) {
          email.setCustomValidity("L'adresse e-mail doit être au format exemple@domaine.com.");
          document.getElementById('emailCompError').textContent = "L'adresse e-mail doit être au format exemple@domaine.com.";
        } else {
          email.setCustomValidity("");
          document.getElementById('emailCompError').textContent = "";
        }
      }

      function validateTel() {
        if (tel.validity.patternMismatch) {
          tel.setCustomValidity("Le numéro de téléphone ne doit contenir que des chiffres (max 10).");
          document.getElementById('telCompError').textContent = "Le numéro de téléphone ne doit contenir que des chiffres (max 10).";
        } else {
          tel.setCustomValidity("");
          document.getElementById('telCompError').textContent = "";
        }
      }

      if (button.id === 'next1Comp') {
        validateNom();
        validatePrenom();
        validateEmail();
        validateTel();

        if (nom.validity.valid && prenom.validity.valid && email.validity.valid && tel.validity.valid) {
          isValid = true;
        } else {
          isValid = false;
        }
      }

     
      /**
       * Traitement pour la validation de la partie 4 du formulaire (dates)
       */

      var arrivee = document.getElementById('darriveeComp');
      var depart = document.getElementById('departComp');

      arrivee.addEventListener('input', function() {
        arrivee.setCustomValidity("");
        document.getElementById('darriveeCompError').textContent = "";
      });

      depart.addEventListener('input', function() {
        depart.setCustomValidity("");
        document.getElementById('departCompError').textContent = "";
      });

      if (button.id === 'next4Comp') {
        var currentDate = new Date(); // Date du jour
      
        if (arrivee.value !== "" && depart.value !== "" && arrivee.value >= depart.value) {
          depart.setCustomValidity("La date de départ ne doit pas être antérieure à la date d'arrivée.");
          document.getElementById('departCompError').textContent = "La date de départ ne doit pas être antérieure à la date d'arrivée.";
          isValid = false;
        } else if (arrivee.value !== "" && new Date(arrivee.value) < currentDate) {
          arrivee.setCustomValidity("La date d'arrivée ne doit pas être antérieure à la date du jour.");
          document.getElementById('darriveeCompError').textContent = "La date d'arrivée ne doit pas être antérieure à la date du jour.";
          isValid = false;
        } else if (depart.value !== "" && new Date(depart.value) < currentDate) {
          depart.setCustomValidity("La date de départ ne doit pas être antérieure à la date du jour.");
          document.getElementById('departCompError').textContent = "La date de départ ne doit pas être antérieure à la date du jour.";
          isValid = false;
        } else if (arrivee.validity.valid && depart.validity.valid) {
          arrivee.setCustomValidity("");
          depart.setCustomValidity("");
          document.getElementById('darriveeCompError').textContent = "";
          document.getElementById('departCompError').textContent = "";
          isValid = true;
        } else {
          isValid = false;
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
        

      } else {
        currentStep.classList.add('was-validated');
      }


    });

  });




  document.querySelectorAll('.previous1-btn').forEach(function (button) {
 
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


/**
 * Gestion de l'événement pour le choix de la demarche
  */
 const typedComp = document.getElementById('typedComp');
 

const optionVisite = document.getElementById('visite1');
const optionRecrutement = document.getElementById('recrutement1');

const tutSelect = document.getElementById('tutelleComp');
const statusSelect = document.getElementById('statutComp');

const financementSelect = document.getElementById('financementComp');
const financementLabel = document.getElementById('financementCompLabel');

const recrVal = optionRecrutement.value;
const visVal = optionVisite.value;

const optionsMapping = {
   recrVal: ['default', 'Post-Doctorant' , 'Doctorant', 'Alternant', 'Stagiaire', 'IGR', 'IGE', 'ASI', 'Tech', 'Adjoint Tech'],
   visVal: ['default', 'Professeur invité', 'Collaborateur', 'Visite limitée'],
 
 };

 if (typedComp.value === "recrutement") {
    const optionsToKeep = optionsMapping['recrVal'] || [];
   
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
 } else {
  if (tutSelect != null) {
    tutSelect.setAttribute('disabled', 'disabled');
  document.getElementById('tutlabelComp').classList.add('text-muted');
  const optionsToKeep = optionsMapping['visVal'] || [];
 
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
  }
  
 }

optionVisite.addEventListener('click', function(event) {
tutSelect.setAttribute('disabled', 'disabled');
document.getElementById('tutlabelComp').classList.add('text-muted');
  financementSelect.setAttribute('disabled', true);
    financementLabel.classList.add('text-muted');

  const optionsToKeep = optionsMapping['visVal'] || [];

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

   optionRecrutement.addEventListener('click', function(event) {
    tutSelect.removeAttribute('disabled');
    document.getElementById('tutlabelComp').classList.remove('text-muted');
    financementSelect.removeAttribute('disabled');
    financementLabel.classList.add('text-muted');
    const optionsToKeep = optionsMapping['recrVal'] || [];
    
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


   

    const optionENS = document.getElementById('optionENS');
    const optionCNRS = document.getElementById('optionCNRS');
    const optionUCBL = document.getElementById('optionUCBL');

    
    let finENS = {};
document.querySelectorAll('.ENS').forEach(function(option) {
  finENS[option.id] = option;
});

let finCNRS = {};
document.querySelectorAll('.CNRS').forEach(function(option) {
  finCNRS[option.id] = option;
});

let finUCBL = {};
document.querySelectorAll('.UCBL').forEach(function(option) {
  finUCBL[option.id] = option;
});

optionENS.addEventListener('click', function(event) {
  for (let optionId in finUCBL) {
    const option = finUCBL[optionId];
    option.classList.add('d-none');
  }

  for (let optionId in finCNRS) {
    const option = finCNRS[optionId];
    option.classList.add('d-none');
  }

  for(let optionId in finENS) {
    const option = finENS[optionId];
    option.classList.remove('d-none');
  }

  $('#financementComp').selectpicker('refresh');

});


optionCNRS.addEventListener('click', function(event) {
  for (let optionId in finENS) {
    const option = finENS[optionId];
    option.classList.add('d-none');
  }

  for (let optionId in finUCBL) {
    const option = finUCBL[optionId];
    option.classList.add('d-none');
  }

  for(let optionId in finCNRS) {
    const option = finCNRS[optionId];
    option.classList.remove('d-none');
  }

  $('#financementComp').selectpicker('refresh');

});


optionUCBL.addEventListener('click', function(event) {
  for (let optionId in finENS) {
    const option = finENS[optionId];
    option.classList.add('d-none');
  }

  for (let optionId in finCNRS) {
    const option = finCNRS[optionId];
    option.classList.add('d-none');
    
  }

  for(let optionId in finUCBL) {
    const option = finUCBL[optionId];
    option.classList.remove('d-none');
    
  }

  $('#financementComp').selectpicker('refresh');

});



  /**
 * Gestion de l'événement la réponses aux questions supplémentaires sur l'ordinateur du non permanent
 */


const optionOui = document.getElementById('ordiYesComp');
const optionNon = document.getElementById('ordiNoComp');

optionOui.addEventListener('click', function(event) {
  
    document.getElementById('osCompDiv').classList.remove('d-none');
    document.getElementById('langueCompDiv').classList.remove('d-none');
   });

optionNon.addEventListener('click', function(event) {
    document.getElementById('osCompDiv').classList.add('d-none');
    document.getElementById('langueCompDiv').classList.add('d-none');
   });





/**
 * Ecoute de tous les champs du formulaire pour récuperer les valeurs
 */

   const sendBtn = document.getElementById('finalComp');
  let allInputs = document.querySelectorAll('input');
  let allSelects = document.querySelectorAll('select');
  let valeurs = {};

  let ordiAnswer = document.getElementsByName('ordiComp');
  //console.log(ordiAnswer);

  //valeurs['ordiComp'] = radioButton.value;
  ordiAnswer.forEach(function(radioButton) {
    if (radioButton.checked) {
      valeurs['ordiComp'] = radioButton.value;
    }
    radioButton.addEventListener('change', function() {
      valeurs['ordiComp'] = radioButton.value;
      //console.log(valeurs);
      //console.log(radioButton.value);
      });
  });

let chimithAnswer = document.getElementsByName('chimithComp');
chimithAnswer.forEach(function(radioButton) {
  if (radioButton.checked) {
    valeurs['chimithComp'] = radioButton.value;
  }
  radioButton.addEventListener('change', function() {
    valeurs['chimithComp'] = radioButton.value;
    });
});

let cdcAnswer = document.getElementsByName('cdcommComp');
cdcAnswer.forEach(function(radioButton) {
  if (radioButton.checked) {
    valeurs['cdcommComp'] = radioButton.value;
  }
  radioButton.addEventListener('change', function() {
    valeurs['cdcommComp'] = radioButton.value;
    });
});


let SaxsAnswer = document.getElementsByName('SAXSComp');
SaxsAnswer.forEach(function(radioButton) {
  if (radioButton.checked) {
    valeurs['SAXSComp'] = radioButton.value;
  }
  radioButton.addEventListener('change', function() {
    valeurs['SAXSComp'] = radioButton.value;
    });
});

let LaserAnswer = document.getElementsByName('laserComp');
LaserAnswer.forEach(function(radioButton) {
  if (radioButton.checked) {
    valeurs['laserComp'] = radioButton.value;
  }
  radioButton.addEventListener('change', function() {
    valeurs['laserComp'] = radioButton.value;
    });
});

sendBtn.addEventListener('click', function(event) {

  allSelects.forEach(function (select) {
    
      valeurs[select.id] = select.value;
      
    
  });
  allInputs.forEach(function (input) {
   
      valeurs[input.id] = input.value;
      
  });

 
console.log(valeurs);
/**pour toutes les valeurs de valeurs */
  Array.from(document.getElementsByClassName('valeur1')).forEach(function (span) {
    if (valeurs[span.previousElementSibling.classList[0]]) {
      if (valeurs[span.previousElementSibling.classList[0]] != 'default' && valeurs[span.previousElementSibling.classList[0]] != "") {
        span.textContent = valeurs[span.previousElementSibling.classList[0]];

      }
      else {
        span.textContent = 'Non renseigné';
      }

  if (span.previousElementSibling.classList[0] == 'demandeur' && valeurs['demandeur']) {
    span.parentNode.parentNode.classList.remove('d-none');
  }
      if (span.previousElementSibling.classList[0] == 'osComp' || span.previousElementSibling.classList[0] == 'langueComp') {
      
        if (valeurs['ordiComp'] && valeurs['ordiComp'] == 'oui') {
          
          span.parentNode.classList.remove('d-none');
          span.parentNode.classList.add('d-flex');
          
        }else {
          
        }
        
      }
    }else
    {
      span.textContent = 'Non renseigné';
    }
    
    
  });




  
});


});