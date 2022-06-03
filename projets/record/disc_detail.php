<!DOCTYPE html>
<html lang="fr">

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
                                disc_picture as picture,
                                disc_id 
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
                            <input type="text" class="form-control" value="<?= $result['title'] ?>" disabled /><br>
                            <label>Année</label>
                            <input type="text" class="form-control" value="<?= $result['year'] ?>" disabled /><br>
                            <label>Label</label>
                            <input class="form-control" value="<?= $result['label'] ?>" disabled /><br>
                            <!-- the image will be displayed by crossing the tables of the database -->
                            <label>Image</label><br>
                            <img src="img/jaquettes/<?= $result['picture'] ?>" alt="..." class="rounded float-left img-fluid mb-3">
                        </div> <!-- End of col left -->
                        <div class="col-1"></div>
                        <div class="col-5"> <!-- col right -->
                            <!-- right -->
                            <label>Artiste</label>
                            <input type="text" class="form-control" value="<?= $result['artist'] ?>" disabled /><br>
                            <label>Genre</label>
                            <input type="text" class="form-control" value="<?= $result['genre'] ?>" disabled /><br>
                            <label>Prix</label>
                            <input type="text" class="form-control" value="<?= $result['price'] ?>" disabled />
                            <br><br><br><br><br>
                        </div> <!-- End of col right -->
                        <!-- Trois boutons ayant une couleurs inhérente à leur utilité -->
                        <div class="d-flex">
                            <!-- bouton midifier -->
                            <a href="disc_form_modif.php?id=<?=$result['disc_id']?>"<button type="button" class=" btn btn-secondary btn-sm mx-1 mb-4">Modifier</button>
                            <!-- bouton retour -->
                            <a href="script_disc_delete"<button type="button" class="btn btn-danger btn-sm mx-1 mb-4">Supprimer</button>
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