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