
<?php
    include 'header.php';
    include "db.php";

    $id = $_GET['id']; // getter pour les valeurs de champs

    $db = ConnexionBase();

    $conn = $db->prepare("SELECT 
                            artist_name, artist.artist_id as id 
                            FROM artist, disc 
                            WHERE artist.artist_id = disc.artist_id 
                            GROUP BY artist_name
                            ");
    $conn->execute();

    $result = $conn->fetchAll(PDO::FETCH_OBJ);

    $req = $db->prepare(" SELECT * FROM disc WHERE disc_id = :id ");
    $req->bindValue(':id', $id);
    $req->execute();
    $disc = $req->fetch(PDO::FETCH_OBJ);
    // print_r($result); // pour voir si les infos remontent

    /* $modif = $db -> prepare("UPDATE disc, artist,
        SET disc_id, artist_name, disc_year, disc_genre, disc_label, disc_price, disc picture
        WHERE artist.artist_id = disc.artisct_id;")
        $modif -> execute():
    */
    ?>
<body>

    <form class="container" action="script_disc_modif.php?id=<?=$disc->disc_id?>" method="POST">
        <h2>Modifier un vinyle</h2>
        <fieldset>
            <div class="input-group mt-3 mb-4">
                <span class="input-group-text" id="Titre">Titre</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_title?>" aria-describedby="Titre">
            </div>
            <div class="input-group"><!-- La liste des artitistes est induite par l'interrogation de la base de données -->
                <span class="input-group-text" id="Artist">Artiste</span>
                <!-- La liste devra interroger une bdd -->
                <select class="form-control" id="exampleFormControlSelect1">
                <?php
                    foreach ($result as $name) : ?>
            
                    <option value="<?= $name->id ?>"><?= $name->artist_name ?></option>
                <?php
                endforeach;
                ?>
            </div><!-- Fin de la liste des artist -->
            </select>
            <div class="input-group mt-4 mb-4">
                <span class="input-group-text" id="annee">Année</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_year?>" aria-describedby="Année">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="Genre">Genre</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_genre?>" aria-describedby="Genre">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="label">Label</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_label?>" aria-describedby="label">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="Prix">Prix</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_price?>" aria-describedby="Prix">
            </div>
            <div><!-- Without this divide the elements are not aligned -->
                <p>Jaquette</p>
                <img src="img/jaquettes/<?= $disc->disc_picture ?>" alt="..." class="rounded float-left img-fluid mb-3"> <!--imge d'orgigine-->
                <input for="insertPicture" type="file" class="btn btn-light form-control-file mx-3" name="pics" id="insertPicture"> <!-- image changée-->
                <div class="d-flex">
                    <!-- les boutons ont une couleurs inhérente leur utilité -->
                    <!-- bouton modifier -->
                    <button type="submit" class="btn btn-primary btn-sm mx-1 mt-3 mb-3">Modifier</button>
                    <!-- bouton retour -->
                    <a href="disc.php"><button type="button" class="btn btn-warning btn-sm mx-1 mt-3 mb-3">Retour</button></a>
                </div> <!-- End of div for button -->
            </div>
        </fieldset>
    </form><!-- End of container -->

</body>

<?php
    include 'footer.php';
?>