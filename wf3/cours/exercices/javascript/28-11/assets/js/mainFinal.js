window.onload = function() {
	var formulaire = document.getElementById('formulaire');
	var labels     = formulaire.getElementsByTagName('label');
	var inputs     = formulaire.getElementsByTagName('input');
	var select     = formulaire.getElementsByTagName('select');

	var errorsArray = [];

	function checkError(errorMessage) {
		if (errorsArray.length > 0) {
			for (var i = 0 ; i < errorsArray.length ; i++) {
				if (errorsArray[i] === errorMessage) {
					return true; // L'erreur courante est déjà dans notre array
				}
			}

			return false;
		} else {
			return false;
		}
	}

	function validateEmail(email) {
   		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   		return re.test(email);
	}

	function checkIfValid(champName,errorMessage,condition,nextElement,champ) {
		if (condition === true) { // Si l'utilisateur n'a pas rempli le champ correctement...
			if (checkError(errorMessage) === false) { // Si l'erreur n 'existe pas déjà, on l'ajoute au tableau et on créé un div pour l'afficher
				var errorDiv       = document.createElement('div'); // Création du div
				errorDiv.className = 'alert alert-danger'; // Attribution d'une classe "error" pour le CSS
				errorDiv.setAttribute('id', champName + '_error'); // Attribution d'un id pour retrouver le div plus facilement pour le supprimer plus tard
				errorDiv.innerHTML = '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> ' + errorMessage; // Et on inscrit l'erreur dans le div

				formulaire.insertBefore(errorDiv, nextElement); // Finalement, on ajoute l'erreur dans le DOM, juste avant le prochain champ du formulaire

				errorsArray.push(errorMessage); // Et on ajoute l'erreur dans le tableau pour tester son existence plus tard

				champ.className += ' error-input';
			}
		} else { // Sinon, s'il a bien rempli le champ, on vérifie s'il y avait une erreur à retirer
			errorDiv = document.getElementById(champName + '_error');

			if (errorDiv) {
				formulaire.removeChild(errorDiv); // On retire le div du DOM

				var index = errorsArray.indexOf(errorMessage);
				errorsArray.splice(index, 1); // Et on retire l'erreur de l'array

				champ.className = 'form-control';
			}
		}
	}

	formulaire.addEventListener('submit', function(event) {
		event.preventDefault();

		// Vérification du genre
		checkIfValid('gender','Vous devez sélectionnez votre genre',!inputs[0].checked && !inputs[1].checked,labels[3],inputs[0]);

		// Vérification du nom
		checkIfValid('lastName','Votre nom ne peut pas faire moins de 2 caractère',inputs[2].value.length < 2,labels[4],inputs[2]);

		// Vérification du prénom
		checkIfValid('firstName','Votre prénom ne peut pas faire moins de 2 caractère',inputs[3].value.length < 2,labels[5],inputs[3]);

		// Vérification de l'âge
		checkIfValid('age','Votre âge doit être compris entre 5 et 140',inputs[4].value < 5 || inputs[4].value > 140,labels[6],inputs[4]);

		// Vérification du pays
		checkIfValid('country','Vous devez sélectionner votre pays de résidence',select[0].value === '',labels[7],select[0]);

		// Vérification du mail
		checkIfValid('email','Vous devez insérer une adresse e-mail valide',inputs[5].value === '',labels[8],inputs[5]);

		// Vérification du password
		checkIfValid('password','Votre mot de passe doit faire au moins 6 caractères',inputs[6].value < 6,labels[9],inputs[6]);
		console.log(validateEmail(inputs[6].value));

		// Vérification de la vérification du password
		checkIfValid('passwordConfirmation','Le mot de passe de confirmation doit être identique à celui d\'origine',inputs[6].value != inputs[7].value,labels[10],inputs[7]);
	});
}
