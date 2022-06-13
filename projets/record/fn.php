<?php
// Détruire proprement une session
function cleandesctructsession(){
    unset($_SESSION["login"]); // destruction de la variable
    unset($_SESSION["role"]);
    if (ini_get("session.use_cookies")) // destruction des coockies
        {
        setcookie(session_name(), '', time()-42000);// setcoockie permet de forcer la date d'expiration
        }
    session_destroy(); // destruction du reste
}

// Envoyé un mail

function sendmail() {
    $destinataire = 'Dave Loper <dave.loper@afpa.fr>';
    $objet = 'Validation de votre inscription';
    $message = 'Merci de votre incription.';
    $message = ' ';
    $message = 'Velvet Record';
}
?>