<?php
// On charge l'enregistrement correspondant à l'ID passé en paramètre :
require "db.php";
$db = connexionBase();
$requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
$requete->execute(array($_GET["id"]));
$myArtist = $requete->fetch();
$requete->closeCursor();

$id = $_GET['id'];
$name = '';
$url = '';

?>

<!DOCTYPE html>
<html lang="fr">

<?php
include 'header.php'
?>

<body>
    <div class="container">
        <form action="script_artist_modif.php" method="post">

            <input type="hidden" name="id" value="<?= $myArtist['artist_id'] ?>">

            <div class="input-group mt-5 mb-3">
                <span class="input-group-text" id="Nom de l'artiste">Nom de l'artiste</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?= $myArtist['artist_name'] ?>" aria-describedby="Nom de l'artiste">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="Nom de l'artiste">Site Internet</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?= $myArtist['artist_url'] ?>" aria-describedby="Site Insternet de l'artiste">
            </div>

            <!-- bouton midifier -->
            <button type="submit" class="btn-primary btn-sm mt-3 mx-1 mb-5">Modifier</button> <!-- le serveiller pour envoyer que les modifications -->
            <!-- bouton retour -->
            <a href="script_artist_delete.php?id=<?= $id ?>"><button type="button" class="btn-danger btn-sm mt-3 mx-1 mb-5">Supprimer</button></a>

        </form>
    </div>
</body>

<?php
include 'footer.php';
?>