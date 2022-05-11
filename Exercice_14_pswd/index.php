<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niveau de compplexité d'un password</title>
</head>
<body>
    <?php
    // Vérif
    function verifmdp($mdp, &$error)
    {
        $error_init = $error;
 
        // longueur
        if(strlen($mdp) < 8)
        {
            $error[] = "Trop court ! Huit caractères nécésaires.";
        }
        // nombre de chiffre
        if(!preg_match("#[0-9]+#", $mdp))
        {
            $error[] = "Doit inculre au moins un chiffre entre 0 et 9.";
        }
        // nombre de lettre
        if(!preg_match("#[0-9]+#", $mdp))
        {
            $error[] = "Doit contenir au moins une letre de A à Z.";
        }
        // retourne les erreurs
        return ($error == $error_init);
    } 

    // le mode de passe
    // $mdp = "b/\thYm3Tr1E";
    $mdp = "z";
    $err = [];
    // Demande de vérifier le mot de passe et stock les messages d'erreur dans la variable $err
    $result = verifmdp($mdp, $err);
    // var_dump($err) ;
    // var_dump($result) ;
    //Execution
    if ($result == "true")
    {
        echo "Bravo ! Mot de passe sûre.";
    }
    else
    {
        echo implode("<br> ", $err);
    }
    ?>
</body>
</html>