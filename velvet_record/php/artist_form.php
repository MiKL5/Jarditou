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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>artist_form</title>
</head>
<?php
    include 'header.php'
?>
<body>

<form action ="script_artist_modif.php" method="post">

    <input type="hidden" name="id" value="<?= $myArtist['artist_id'] ?>">

    <label for="artist">Nom de l'artiste :</label><br>
        <input type="text" name="name" id="artist" value="<?= $myArtist['artist_name'] ?>"> <br><br>

    <label for="url">Adresse site internet :</label><br>
        <input type="text" name="url" id="url" value="<?= $myArtist['artist_url'] ?>"> <br><br>

    <!-- bouton midifier -->
    <button type="submit" class=" btn btn-secondary btn-sm mx-1">Modifier</button> <!-- le serveiller pour envoyer que les modifications -->
    <!-- bouton retour -->
    <a href="script_artist_delete.php?id=<?= $id ?>"><button type="button" class="btn btn-danger btn-sm mx-1">Supprimer</button></a>

</form>
</body>

<?php
    include 'footer.php';
?>