<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php"; // (Bureau/Docs/pdo/php/db.php)
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDO - Détail</title>
    </head>
    <body>
        Artiste N°<?php echo $myArtist->artist_id ?>
        Nom de l'artiste : <?= $myArtist->artist_name ?>
        Site Internet : <?= $myArtist->artist_url ?>

        <?php var_dump($myArtist)?>
<!-- afficher un msg si la bdd est introuvable ->




<!-- ajout d'un bouton de modification -->
<!-- Début de page : traitement PHP + entête HTML
   ... -->

    <body>
        Artiste N°<?php echo $myArtist->artist_id ?>
        Nom de l'artiste : <?= $myArtist->artist_name ?>
        Site Internet : <?= $myArtist->artist_url ?>
        <a href="artist_form.php?id=<?= $myArtist->artist_id ?>">Modifier</a>
    </body>

<!-- Fin de page : fermetures de blocs HTML -->

<!-- appeler artist form -->
<!-- https://urlduserveurlocal/artist_form.php?id=8 -->

<!-- injecter les différentes informations dans le champ de formulaire -->
<form action ="script_artist_modif.php" method="post">

<input type="hidden" name="id" value="<?= $myArtist->artist_id ?>">

<label for="nom_for_label">Nom de l'artiste :</label><br>
<input type="text" name="nom" id="nom_for_label" value="<?= $myArtist->artist_name ?>">
<br><br>

<label for="url_for_label">Adresse site internet :</label><br>
<input type="text" name="url" id="url_for_label" value="<?= $myArtist->artist_url ?>">
<br><br>

<input type="reset" value="Annuler">
<input type="submit" value="Modifier">

</form>

    </body>
</html>


<!-- PEUT-ÊTRE AVANT (EN HAUT) -->
<?php
    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
    $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($id == Null) {
        header("Location: artists.php");
    }
    elseif ($nom == Null || $url == Null) {
        header("Location: artist_form.php?id=".$id);
        exit;
    }

    // Si la vérification des données est ok :
    require "db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête UPDATE sans injection SQL :
        $requete = $db->prepare("UPDATE artist SET artist_name = :nom, artist_url = :url WHERE artist_id = :id;");
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":url", $url, PDO::PARAM_STR);

        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_artist_modif.php)");
    }

    // Si OK: redirection vers la page artist_detail.php
    header("Location: artist_detail.php?id=" . $id);
    exit;