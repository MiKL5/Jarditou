<?php
    // Récupération du Nom :
    if (isset($_POST['nom']) && $_POST['nom'] != "") {
        $nom = $_POST['nom'];
    }
    else {
        $nom = Null;
    }

    // Récupération de l'URL (même traitement, avec une syntaxe abrégée)
    $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($nom == Null || $url == Null) {
        header("Location: artist_ajout.php");
        exit;
    }

    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête INSERT sans injection SQL :
        $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_genre, disc_label, disc_price, disc_picture) VALUES (:disc_title, :disc_year, :disc_genre, :disc_label, :disc_price);");
        
    
        // Association des valeurs aux paramètres via bindValue() :
        $requete->bindValue(":url", $url, PDO::PARAM_STR);
        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
    
        // Lancement de la requête :
        $requete->execute();
    
        // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
        $requete->closeCursor();
    }
    
    // Gestion des erreurs
    catch (Exception $e) {
        var_dump($requete->queryString);
        var_dump($requete->errorInfo());
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_artist_ajout.php)");
    }
    
    // Si OK: redirection vers la page artists.php
    header("Location: artists.php");
    
    // Fermeture du script
    exit;
    ?>
<!-- Chaque input du formulaire portant un attribut name génère une cellule dans $_POST (qui est un tableau associatif), accessible grâce à la syntaxe suivante : $valeur_input = $_POST["attribut_name"]. -->

<!-- NB: comme notre colonne artist_id est en AUTO INCREMENT, nous n'avons pas besoin d'associer une valeur pour cette colonne. -->

<!-- on a placé tout notre traitement dans un TRY ... CATCH afin de récupérer le message d'erreur du SGBDr (MariaDB, MySQL, etc.) le cas échéant, grâce aux informations retournées par la méthode errorInfo() de PDO. -->