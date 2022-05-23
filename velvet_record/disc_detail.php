<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>À propos des disques</title>
</head>

<body>
    <?php include "db.php";
    
    $db = ConnexionBase();

    $detail = $db->prepare("SELECT disc_title as title, artist_name as artist, disc_year as year, disc_genre as genre, disc_label as label, disc_price as price FROM artist, disc WHERE artist.artist_id = disc.artist_id;");
    $detail->execute();


    $result = $detail->fetchAll(PDO::FETCH_OBJ);
    print_r($result); // pour voir si les infos remontent

    $title = 'title';
    ?>

    <div class="container">
    <h1>Détails</h1>
        <div class="row">
            <div class=col-12>
                <form action="">
                    <div class="row">
                        <div class="col-5">
                            <!-- col left -->
                            <label>Titre</label>
                            <input type="text" class="form-control" name="$title" readonly /><br>
                            <label>Année</label>
                            <input type="text" class="form-control" name="year" readonly /><br>
                            <label>Label</label>
                            <input class="input-group-text form-control" name="label" readonly /><br>
                            <!-- the image will be displayed by crossing the tables of the database -->
                            <label>Image</label><br>
                            <img src="..." alt="..." class="rounded float-left img-fluid img-thumbnail">
                        </div> <!-- End of col left -->
                        <div class="col-1"></div>
                        <div class="col-5">
                            <!-- col left -->
                            <!-- right -->
                            <label>Artiste</label>
                            <input type="text" class="form-control" name="artist" readonly /><br>
                            <label>Genre</label>
                            <input type="text" class="form-control" name="genre" readonly /><br>
                            <label>Prix</label>
                            <input type="text" class="form-control" name="price" readonly />
                            <br><br><br><br><br>
                        </div> <!-- End of col right -->
                        <!-- Trois boutons ayant une couleurs inhérente leur utilité -->
                        <div class="d-flex">
                            <!-- bouton midifier -->
                            <button type="submit" class=" btn btn-secondary btn-sm mx-1">Modifier</button>
                            <!-- bouton retour -->
                            <button type="reset" class="btn btn-danger btn-sm mx-1">Supprimer</button>
                            <!-- bouton ajouter -->
                            <button type="return" class=" btn btn-warning btn-sm mx-1">Retour</button>
                        </div> <!-- Fin de la div pour les bouttons -->
                </form>
            </div> <!-- End of col-12 -->
        </div>
    </div> <!-- End of container -->


</body>

</html>