
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

    $req = $db  ->prepare(" SELECT * FROM disc WHERE disc_id = :id ");
    $req        ->bindValue(':id', $id);
    $req        ->execute();
    $disc = $req->fetch(PDO::FETCH_OBJ);
    // print_r($result); // pour voir si les infos remontent

    /* $modif = $db -> prepare("UPDATE disc, artist,
        SET disc_id, artist_name, disc_year, disc_genre, disc_label, disc_price, disc picture
        WHERE artist.artist_id = disc.artisct_id;")
        $modif -> execute():
    */
    ?>
<body>

    <form class="container mt-3" action="script_disc_modif.php?id=<?=$disc->disc_id?>" method="POST" enctype="multipart/form-data">
        <h1>Modifier un vinyle</h1>
        <fieldset>
            <div class="input-group mt-3 mb-4">
                <span class="input-group-text" id="Titre">Titre</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_title?>" aria-describedby="Titre" name="title"> <!-- Ne pas oublier les names sinon les données ne vont pas dans la base de données -->
            </div>
            <div class="input-group"><!-- La liste des artitistes est induite par l'interrogation de la base de données -->
                <span class="input-group-text" id="Artist" name="artist">Artiste</span>
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
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_year?>" aria-describedby="Année" name="y">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="Genre">Genre</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_genre?>" aria-describedby="Genre" name="genre">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="label">Label</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_label?>" aria-describedby="label" name="lbl">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="Prix">Prix</span>
                <input type="text" class="form-control" placeholder="" aria-label="" value="<?=$disc->disc_price?>" aria-describedby="Prix" name="price">
            </div>
            <div><!-- Without this divide the elements are not aligned -->
                <p>Jaquette</p>
                <img src="img/jaquettes/<?= $disc->disc_picture ?>" alt="..." class="rounded float-left img-fluid mb-3"> <!--imge d'orgigine-->
                <input for="insertPicture" type="file" class="btn btn-light form-control-file mx-3" name="pics" id="insertPicture"> <!-- image changée-->
                <div class="d-flex">
                    <!-- les boutons ont une couleurs inhérente leur utilité -->
                    <!-- bouton modifier -->
                    <button type="submit" title="Modifier" alt="Modifier" class="btn btn-primary btn-sm mx-1 mt-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                </svg></button>
                    <!-- bouton retour -->
                    <a href="disc.php"><button type="button" title="Retour" alt="Retour" class="btn btn-warning btn-sm mx-1 mt-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left text-light fw-bold" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                </svg></button></a>
                </div> <!-- End of div for button -->
            </div>
        </fieldset>
    </form><!-- End of container -->

</body>

<?php
    include 'footer.php';
?>