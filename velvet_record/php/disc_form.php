<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Modifier un vinyle</title>
</head>
<?php
    include 'header.php';
?>
<body>

    <?php include "db.php";

    $db = ConnexionBase();

    $conn = $db->prepare("SELECT artist_name, artist.artist_id as id FROM artist, disc WHERE artist.artist_id = disc.artist_id GROUP BY artist_name");
    $conn->execute();


    $result = $conn->fetchAll(PDO::FETCH_OBJ);
    // print_r($result); // pour voir si les infos remontent
    ?>

    <form class="container" action="">
        <h2>Modifier un vinyle</h2>
        <fieldset>
            <label>Titre</label>
            <input type="text" class="form-control" id="NOM">
            <!-- <p>Artiste</p> -->
            <!-- La liste devra interroger une bdd -->
            <label for="exampleFormControlSelect1">Artiste</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <?php
                foreach ($result as $name) : ?>
                    <option value="<?= $name->id ?>"><?= $name->artist_name ?></option>
                <?php
                endforeach;
                ?>
            </select>
            <label>Année</label>
            <input type="text" class="form-control" id="Année"> <!-- si insactif readonly -->
            <label>Genre</label>
            <input type="text" class="form-control" id="Genre">
            <label>Label</label>
            <input type="text" class="form-control" id="Label" placeholder="EMI, Warner, Polygram, Universal ...">
            <label>Prix</label>
            <input type="text" class="form-control" id="Prix">
            <label>Jaquette</label><br>
            <input for="insertPicture" type="file" class="btn btn-light form-control-file" id="insertPicture">
            <div class="d-flex">
                <!-- les boutons ont une couleurs inhérente leur utilité -->
                <!-- bouton ajouter -->
                <button type="submit" class="btn btn-secondary btn-sm mx-1 mt-3 mb-3">Modifier</button>
                <!-- bouton retour -->
                <a href="disc.php>"<button type="button" class="btn btn-warning btn-sm mx-1 mt-3 mb-3">Retour</button></a>
            </div> <!-- End of div for button -->
        </fieldset>
    </form><!-- End of container -->

</body>

<?php
    include 'footer.php';
?>