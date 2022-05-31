<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>À propos des disques</title>
</head>

<?php
    include 'header.php';
?>

<body>
    <?php include 'db.php';
    $db = ConnexionBase(); // connexion à la base
    $id = $_GET['id'];

    $detail = $db->prepare("SELECT 
                                disc_title as title, 
                                artist_name as artist, 
                                disc_year as year, 
                                disc_genre as genre, 
                                disc_label as label, 
                                disc_price as price, 
                                disc_picture as picture 
                            FROM artist, disc 
                            WHERE disc.disc_id = :id");

    $detail->bindValue(':id', $id, PDO::PARAM_INT);
    $detail->execute();

    $result = $detail->fetch(PDO::FETCH_ASSOC);
    // print_r($result); // pour voir si les infos remontent
    // var_dump($result);

    ?>

    <div class="container">
    <h1>Détails</h1>
        <div class="row">
            <div class=col-12>
                <form action="">
                    <div class="row">
                        <div class="col-5"> <!-- col left -->
                            <label>Titre</label>
                            <input type="text" class="form-control" value="<?= $result['title'] ?>" /><br>
                            <label>Année</label>
                            <input type="text" class="form-control" value="<?= $result['year'] ?>" /><br>
                            <label>Label</label>
                            <input class="form-control" value="<?= $result['label'] ?>" /><br>
                            <!-- the image will be displayed by crossing the tables of the database -->
                            <label>Image</label><br>
                            <img src="../img/jaquettes/<?= $result['picture'] ?>" alt="..." class="rounded float-left img-fluid mb-3">
                        </div> <!-- End of col left -->
                        <div class="col-1"></div>
                        <div class="col-5"> <!-- col right -->
                            <!-- right -->
                            <label>Artiste</label>
                            <input type="text" class="form-control" value="<?= $result['artist'] ?>" /><br>
                            <label>Genre</label>
                            <input type="text" class="form-control" value="<?= $result['genre'] ?>" /><br>
                            <label>Prix</label>
                            <input type="text" class="form-control" value="<?= $result['price'] ?>" />
                            <br><br><br><br><br>
                        </div> <!-- End of col right -->
                        <!-- Trois boutons ayant une couleurs inhérente à leur utilité -->
                        <div class="d-flex">
                            <!-- bouton midifier -->
                            <a href="disc_form.php?=disc_id"<button type="button" class=" btn btn-secondary btn-sm mx-1 mb-4">Modifier</button>
                            <!-- bouton retour -->
                            <a href="script"<button type="button" class="btn btn-danger btn-sm mx-1 mb-4">Supprimer</button>
                            <!-- bouton ajouter -->
                            <a href="disc.php"><button type="button" class=" btn btn-warning btn-sm mx-1 mb-4">Retour</button></a>
                        </div> <!-- Fin de la div pour les bouttons -->
                </form>
            </div> <!-- End of col-12 -->
        </div> <!-- End of row -->
    </div> 
    </div><!-- End of container -->

</body>

<?php
    include "footer.php";
?>