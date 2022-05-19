// FORMULAIRE

function verifForm(event) {
  // Nom
  var nom = document.getElementById("nom");
  var errorNom = document.getElementById("errorNom");
  if (nom.validity.valueMissing) {
    event.preventDefault();
    errorNom.style.color = "red";
    errorNom.textContent = "Le Nom est requis";
    return;
  }
  var regexNom = new RegExp(/^[A-Za-z-]+$/);
  if (!regexNom.test(nom.value)) {
    event.preventDefault();
    errorNom.style.color = "orange";
    errorNom.textContent = "Nom mal renseigner";
    return;
  }

  // PRENOM
  var prenom = document.getElementById("prenom");
  var errorPrenom = document.getElementById("errorPrenom");
  if (prenom.validity.valueMissing) {
    event.preventDefault();
    errorPrenom.style.color = "red";
    errorPrenom.textContent = "Le prénom est requis";
    return;
  }

  var regexPrenom = RegExp(/^[A-Za-z-\s]+$/);
  if (!regexPrenom.test(prenom.value)) {
    event.preventDefault();
    errorPrenom.style.color = "orange";
    errorPrenom.textContent = "Le prénom est mal renseigné";
    return;
  }

  // SEXE
  let sexe1 = document.getElementById("sexe1");
  let sexe2 = document.getElementById("sexe2");

  if (!sexe1.checked && !sexe2.checked) {
    event.preventDefault();
    errorSexe.textContent = "Cochez votre sexe";
    errorSexe.style.color = "red";
    return;
  }

  // DATE DE NAISSANCE
  var date = document.getElementById("date");
  if (date.validity.valueMissing) {
    event.preventDefault();
    errorDdn.style.color = "red";
    errorDdn.textContent = "La date de naissance est requise";
    return;
  }

  // CODE POSTAL (attn au required dans le html sinon il ne vérifie pas !)
  var cp = document.getElementById("cp");
  var errorCp = document.getElementById("errorCp");
  if (cp.validity.valueMissing) {
    event.preventDefault();
    errorCp.style.color = "red";
    errorCp.textContent = "Le code postal est requis";
    return;
  }
  var regexCp = new RegExp(/^[0-9]{5}$/);
  if (!regexCp.test(cp.value)) {
    event.preventDefault();
    errorCp.style.color = "orange";
    errorCp.textContent = "Code postal erroné";
    return;
  }

  // EMAIL
  var email = document.getElementById("email");
  var errorEmail = document.getElementById("errorEmail");
  if (email.validity.valueMissing) {
    event.preventDefault();
    errorEmail.style.color = "red";
    errorEmail.textContent = "L'email est requis";
    return;
  }
  var regexEmail = RegExp(/^[A-Za-z@.-]+$/);
  if (!regexEmail.test(email.value)) {
    event.preventDefault();
    errorEmail.style.color = "orange";
    errorEmail.textContent = "L'email est mal renseigné";
    return;
  }

  /************************************************************/
  /********************    SUJET       ************************/
  /************************************************************/
  var selection = document.getElementById("sujet");
  var errorSujet = document.getElementById("errorSujet");

  if (selection.value == "") {
    event.preventDefault();
    errorSujet.style.color = "red";
    errorSujet.textContent = "Séléctionner un sujet";
    return;
  }

  // COMMENTAIRE
  var commentaire = document.getElementById("commentaire");
  if (commentaire.validity.valueMissing) {
    event.preventDefault();
    errorCommentaire.style.color = "red";
    errorCommentaire.textContent = "Le commentaire est requis";
    return;
  }
}
document.getElementById("submit").addEventListener("click", verifForm);