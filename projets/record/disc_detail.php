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
                            WHERE disc_id = :id"); //disc

    $detail->bindValue(':id', $id, PDO::PARAM_INT);
    $detail->execute();

    $result = $detail->fetch(PDO::FETCH_ASSOC);
    // print_r($result); // pour voir si les infos remontent
    // var_dump($result);

    ?>

    <div class="container mt-3">
        <h1>Détails</h1>
            <div class="row">
                <div class=col-12>
                    <form action="">
                        <div class="row">
                            <div class="col-5"> <!-- col left -->
                                <label>Titre</label>
                                <input type="text" class="form-control" name="title" value="<?= $result['title'] ?>" disabled /><br>
                                <label>Année</label>
                                <input type="text" class="form-control" name="year" value="<?= $result['year'] ?>" disabled /><br>
                                <label>Label</label>
                                <input class="form-control" name="label" value="<?= $result['label'] ?>" disabled /><br>
                                <!-- the image will be displayed by crossing the tables of the database -->
                                <label>Image</label><br>
                                <img src="img/jaquettes/<?= $result['picture'] ?>" alt="..." class="rounded float-left img-fluid mb-3" name="pics">
                            </div> <!-- End of col left -->
                            <div class="col-1"></div>
                            <div class="col-5"> <!-- col right -->
                                <!-- right -->
                                <label>Artiste</label>
                                <input type="text" class="form-control" name="artist" value="<?= $result['artist'] ?>" disabled /><br>
                                <label>Genre</label>
                                <input type="text" class="form-control" name="genre" value="<?= $result['genre'] ?>" disabled /><br>
                                <label>Prix</label>
                                <input type="text" class="form-control" name="price" value="<?= $result['price'] ?>" disabled />
                                <br><br><br><br><br>
                            </div> <!-- End of col right -->
                            <!-- Trois boutons ayant une couleurs inhérente à leur utilité -->
                            <div class="d-flex">
                                <!-- bouton midifier -->
                                <a href="disc_modif.php?id=<?=$result['disc_id']?>"<button type="button" name="id" tilte="Modifier" alt="Modifier" class=" btn btn-primary btn-sm mx-1 mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                </svg></button>
                                <!-- bouton retour -->
                                <a href="script_disc_delete.php?id=<?= $result['disc_id']?>"<button type="button" title="Supprimer" alt="Supprimer" class="btn btn-danger btn-sm mx-1 mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg></button>
                                <!-- bouton ajouter -->
                                <a href="disc.php"><button type="button" tilte="Retour" alt="Retour" class=" btn btn-warning btn-sm mx-1 mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left text-light fw-bold" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                </svg></button></a>
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