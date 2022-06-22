<?php
// Tester la session
function testsession(){
session_start();
if ( ! isset($_SESSION["login"]) ) {
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
    } // fin de request_method
    // fonction  de vérification
    function verifyinput($input){
        $înput = trim($input); // supprime les caractères invisibles en début et fin de chaîne
        $input = stripslashes($input); // enlève les antislaches
        $input = htmlspecialchars($input); // enlève les caractères spéciaux
        return $input;
    } // fun de verifyinput
} // fin de la fonction verifsaisies

// Détruire proprement une session
function cleandesctructsession(){
    session_start();
    unset($_SESSION["login"]); // destruction de la variable
    unset($_SESSION["role"]);
    if (ini_get("session.use_cookies")) // destruction des coockies
        {
        setcookie(session_name(), '', time()-42000);// setcoockie permet de forcer la date d'expiration
        }
    session_destroy(); // destruction du reste
}

function logout(){
    cleandesctructsession();
    header("Location: index.php");
    exit;
}

// le mail
function sendmailsubscribe($destinataire){
    // Objet
    $subject = 'Merci de votre inscription';
    // -> origine du message 
    $header  = 'From: \'Velvet Record\' <suscribe.noreply@velvetrecord.com>'.'<br>';  
    // -> message au format Multipart MIME 
    $header .= 'MIME-Version: 1.0'.'<br>'; 
    $header .= 'Content-Type: multipart/mixed;'.'<br>'; 
    $header .= 'boundary=\'ligne\''.'<br>'; 
    $header .= 'Content-Type: text/html'.'<br>'; //text/plain
    $header .= 'charset=iso-8859-1'.'<br>'; 
    $header .= 'Content-Transfer-Encoding: 8bit'.'<br>'; 
    
    $message  = 'Vous pouvez maintenant vous connecter avec votre mail et le mot de passe.'.'<br>'; 
    $message .= 'Cordialement'.'<br>';
    $message .= ''.'<br>';   // ligne vide 
    $message .= 'L\'équipe Velvet Record'.'<br>'; 
    // Envoi. 
    $send = mail($destinataire, 
                    'Merci de votre inscription',
                    $message,
                    $header,
                    );
                    // var_dump($send);
                    // die;
    }
?>