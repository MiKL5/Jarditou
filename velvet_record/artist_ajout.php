<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Ajouter un.e artiste</title>
</head>
<body>
    <!-- Formulaire d'ajout d'artiste -->
    <?php include "db.php"; 

    $db = ConnexionBase();

    $conn = $db->prepare("SELECT artist_name, artist.artist_id as id FROM artist, disc WHERE artist.artist_id = disc.artist_id GROUP BY artist_name");
    $conn->execute();


    $result = $conn->fetchAll(PDO::FETCH_OBJ);
    // print_r($result); // pour voir si les infos remontent

    ?>

    <form class="container" action="">
        <h1>Ajouter un vinyle</h1>
            <p>Titre</p>
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
            <p>Année</p>
            <input type="text" class="form-control" id="Année" placeholder="Entrer l'année"><br>
            <p>Genre</p>
            <input type="text" class="form-control" id="Genre" placeholder="Entrer le genre"><br>
            <p>Label</p>
            <input type="text" class="form-control" id="Label" placeholder="Entrer le label (EMI, Warner, Polygram, Universal ...)"><br>
            <p>Prix</p>
            <input type="text" class="form-control" id="Prix" placeholder="Entrer le titre"><br>
            <p>Image</p>
            <label for="insertPicture"></label>
            <input type="file" class="form-control-file" id="insertPicture"><br><br>
            <!-- bouton ajouter -->
            <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
            <!-- bouton retour -->
            <button type="return" class="btn btn-warning btn-sm">Retour</button>
    </form>
</body>
</html>