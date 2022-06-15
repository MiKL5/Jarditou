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
    $emetteur = '<noreply@mail.fr>';
    $destinataire = 'Dave Loper <dave.loper@afpa.fr>';
    $objet = 'Validation de votre inscription';
    $message = 'Merci de votre incription.';
    $message = ' ';

}

// Tester la session
function testsession(){
session_start();
if ( ! isset($_SESSION["login"]) ) 
{
    header("Location:index.php");
    echo"Veuillez vous authentifier";
    exit;
}
// Reste du code (PHP/HTML)
echo"Bonjour ".$_SESSION["login"];  
}

// Sécurité

// Vérifier les saisies
function verifsaisies(){
    // les saisies à vérifier // ceci s'exécute d'an la deuxième instance du formulaire
    if ($_POST["REQUEST_METHOD"] == "POST"){
        $user = verifyinput($_POST["user"]); // Une ligne pour chaque chose à vérifier
        if (empty($user)){
            $usererror = "L'dentifiant est obligatoire";
        }
        if(empty($password)){
            $passworderror = "Le mot de passe sécirise les données";
        }
    }
    // fonction  de vérification
    function verifyinput($input){
        $înput = trim($input); // supprime les caractères invisibles en début et fin de chaîne
        $input = stripslashes($input); // enlève les antislaches
        $input = htmlspecialchars($input); // enlève les caractères spéciaux
        return $input;
    }

} // fin de la fonction verifsaisies

    // Vérification que l'identification est correcte
    // function userexist($identifier, $passwd)
    // {
        // return (bool) rand(0, 1);
    // }
    // traitement du formulaire
    // if (isset($_POST['connection'])) {
        // récup des saisies
        // $identifier = $_POST['identifier'];
        // $passwd = $_POST['password'];
        // Vérif userexist
        // if (userexist($identifier, $passwd)) {
            // header('location:disc.php'); // envoi un entête brut
            // exit; // affiche un msg et termine le script
        // } else {
            // $msg = 'Identifiant incorrect ou inexistant.';
            // $msg = 'Essayer à nouveau.';
            // le formulaire se réaffichera
        // }
    // }

    
?>