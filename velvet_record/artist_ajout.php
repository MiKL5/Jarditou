<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ajouter un.e artiste</title>
</head>
<body>
    <!-- Formulaire d'ajout d'artiste -->
    <?php include "db.php"; 

    $db = ConnexionBase();

    $conn = $db->prepare("SELECT artist_name, artist.artist_id as id FROM artist, disc WHERE artist.artist_id = disc.artist_id GROUP BY artist_name");
    $conn->execute();


    $result = $conn->fetchAll(PDO::FETCH_OBJ);
    print_r($result);

    ?>

    <form action="">
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
            <input type="text" class="form-control" id="Année" placeholder="Entrer l'année'"><br>
            <p>Genre</p>
            <input type="text" class="form-control" id="Genre" placeholder="Entrer le genre"><br>
            <p>Label</p>
            <input type="text" class="form-control" id="Label" placeholder="Entrer le label (EMI, Warner, Polygram, Universal ...)"><br>
            <p>Prix</p>
            <input type="text" class="form-control" id="Prix" placeholder="Entrer le titre"><br>
            <p>Image</p>
            <label for="insertPicture"></label>
            <input type="file" class="form-control-file" id="insertPicture"><br>
            <!-- bouton ajouter -->
            <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
            <!-- bouton retour -->
            <button type="return" class="btn btn-warning btn-sm">Retour</button>
    </form>
</body>
</html>