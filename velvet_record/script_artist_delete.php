<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>script_artist_delete</title>
</head>

<!-- Début de page : traitement PHP + entête HTML
   ... -->
$myArtist = artist;
    <body>
        Artiste N°<?php echo $myArtist->artist_id ?>
        Nom de l'artiste : <?= $myArtist->artist_name ?>
        Site Internet : <?= $myArtist->artist_url ?>
        <a href="artist_form.php?id=<?= $myArtist->artist_id ?>">Modifier</a>
        <a href="script_artist_delete.php?id=<?= $myArtist->artist_id ?>">Supprimer</a>
        <!-- ajouter un script de confirmation pour éviter les suppression involontaires -->


        
        
    </body>

<!-- Fin de page : fermetures de blocs HTML -->

</html>
<!--
<button onclick="confirmer()">Supprimer</button>
function confirmer(){
    var res = confirm("Êtes-vous sûr de vouloir supprimer?");
    if(res){
        <-- Mettez ici la logique de suppression --><!--
    }
}
s'inspirer de ça

<script language='javascript'>
function ConfirmerAge()
{
if (confirm("Confirmez vous avoir "+ formulaire.age.value +" ans ?"))
{
formulaire.submit();
}
}
</script>

<input type='button' value='Confirmer' onClick='ConfirmerAge()'>
<script language='javascript'>
function ConfirmerAge()
{
if (confirm("Confirmez vous la suppression  de (...) ?"))
{
formulaire.submit();
}
}
</script>-->

<?php
    // Contrôle de l'ID (si inexistant ou <= 0, retour à la liste) :
    if (!(isset($_GET['id'])) || intval($_GET['id']) <= 0) : GOTO TrtRedirection;

    // Si la vérification est ok :
    require "db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête DELETE sans injection SQL :
        $requete = $db->prepare("DELETE FROM artist WHERE artist_id = ?");
        $requete->execute(array($_GET["id"]));
        $requete->execute();
        $requete->closeCursor();
    }
    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_artist_modif.php)");
    }

    // Si OK: redirection vers la page artists.php
    TrtRedirection:
    header("Location: artists.php");
    exit;