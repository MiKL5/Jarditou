<?php
// On charge l'enregistrement correspondant à l'ID passé en paramètre :
    require "db.php";
    $db = connexionBase();
    $requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
    $requete->execute(array($_GET["id"]));
    $myArtist = $requete->fetch();
    $requete->closeCursor();

    $name = '';
    $url = '';
    // //  Get artist par l'id
    
    // Vérification des champs non vide
    if ($_POST['submit'])
    {
        if($_POST['name'] != '' ){
            $name = $_POST['name'];
        }
    }
 
    $myArtist = $db->prepare("SELECT * FROM artist WHERE artist_id = 1;");
    $myArtist->bindValue(':artist_id', $artist_id);
    $myArtist->bindValue(':artist_name', $artist_name);
    $myArtist->bindValue(':artist_url', $artist_url);
    $myArtist->execute();

    


    // $result = $myArtist->fetch(PDO::FETCH_ASSOC);
    // print_r($result); // pour voir si les infos remontent

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>artist_form</title>
</head>
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
    <button type="reset" class="btn btn-danger btn-sm mx-1">Supprimer</button>

</form>
</body>
</html>


