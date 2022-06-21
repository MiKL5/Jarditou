<?php
    // Contrôle de l'ID (si inexistant ou <= 0, retour à la liste) :
    if (!(isset($_GET['id'])) || intval($_GET['id']) <= 0)  { // 0 = numéro d'id inf à 1
        // Si OK: redirection vers la page artists.php
        header("Location: disc.php");
        exit;// sinon il continu le traitement en bas il est pas obligatoire s'il n'y a rien en dessous
    }
    // Si la vérification est ok :
    require "db.php"; 
    $db = ConnexionBase();
    // var_dump($db);
    // die;
    try {
        // Construction de la requête DELETE sans injection SQL :
        $requete = $db->prepare("DELETE FROM disc WHERE disc_id = :id ");
        $requete      ->bindValue(':id', $_GET["id"], PDO::PARAM_INT);
        // $requete      ->execute  (array($_GET["id"]));
        $requete      ->execute();
        $requete      ->closeCursor();
    }
    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_delete.php)");
    }
    // Si OK: redirection vers la page artists.php
    header("Location: disc.php"); // sinon il y va pas
    exit;
   
?>