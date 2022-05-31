<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ajouter un.e artiste</title>
</head>
<body>
<?php
    include "header.php";
?>


<?php include "db.php"; // connexion à la base de données
$db = ConnexionBase(); // connexion
// éviter l'injection SQL [ prepare(la requête) puis execute() ]
$conn = $db->prepare("SELECT artist_name, artist.artist_id as id FROM artist, disc WHERE artist.artist_id = disc.artist_id GROUP BY artist_name");
$conn->execute();
// Récupèration des lignes restantes d'un ensemble de résultats
$result = $conn->fetchAll(PDO::FETCH_OBJ);
// print_r($result); // pour voir si les infos remontent
?>
    <!-- Formulaire d'ajout de vinyle -->
    <form class="container" method="GET" action="">
        <h2>Ajouter un.e artiste</h2>
            <label>Titre</label>
            <input type="text" class="form-control" id="NOM" placeholder="Entrer le titre"><br>
            <!-- devra aller chercher les éléments dans la bdd -->
            <label for="exampleFormControlSelect1">Artiste</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <?php
                foreach ( $result as $name ) : ?>
                    <option value="<?=$name->id?>"><?=$name->artist_name?></option>
                <?php
                endforeach;
                ?>
            </select><br>
            <label>Année</label>
            <input type="text" class="form-control" id="Année" placeholder="Entrer l'année"><br>
            <label>Genre</label>
            <input type="text" class="form-control" id="Genre" placeholder="Entrer le genre"><br>
            <label>Label</label>
            <input type="text" class="form-control" id="Label" placeholder="Entrer le label (EMI, Warner, Polygram, Universal ...)"><br>
            <label>Prix</label>
            <input type="text" class="form-control" id="Prix" placeholder="Entrer le titre"><br>
            <label>Image</label><br>
            <label for="insertPicture"></label>
            <input type="file" class="form-control-file" id="insertPicture"><br><br>
            <!-- bouton ajouter -->
            <a href="script_artist_ajout.php"<button type="submit" class="btn btn-success btn-sm mb-3">Ajouter</button></a>
            <!-- bouton retour -->
            <a href="disc.php"><button type="button" class="btn btn-warning btn-sm mb-3">Retour</button></a>
    </form>
    <?php
    include "footer.php";
    ?>