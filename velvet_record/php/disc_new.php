<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ajouter un disc</title>
</head>

<?php
    include 'header.php';
    include 'db.php';
?>

<body>
    <div class="container">
        <h2>Ajouter un vinyle</h2>
        <!-- les infos doivent s'ajouter à la table disc -->
        <!-- le contenu doit venir de la bdd record de la table disc -->
        <form action="disc_form.php?disc_id=1" method="get">
            <label>Titre</label>
            <input type="text" class="form-control" name="title" placeholder="Saisir le titre">
            <label>Artist</label>
            <input type=" text" class="form-control" name="artist" placeholder="Saisir le nom de l'artist">
            <label>Année</label>
            <input type="text" class="form-control" name="year" placeholder="Saisir l'année"> <!-- value -->
            <label>Genre</label>
            <input type=" text" class="form-control" name="genre" placeholder="Saisir le genre musical">
            <label>Label</label>
            <input type=" text" class="form-control" name="label" placeholder="EMI, Warner, Polygram, Universal ...)">
            <label>Prix</label>
            <input type=" text" class="form-control" name="price" placeholder="Saisir le prix">
            <label>Jaquette</label><br>
            <label for="insertPicture"></label>
            <input type="file" class="form-control-file" id="insertPicture"><br><br>
            <!--<input type=" titre" class="form-control" name="jaquette"">-->
            <!-- <img src=" inm/jaquette <?= $disc->disc_picture ?>" alt="..." class="rounded float-left img-fluid img-thumbnail"><br><br> -->
            <div class="d-flex">
                <!-- les boutons ont une couleurs inhérente leur utilité -->
                <!-- bouton midifier -->
                <a href="script_disc_ajout.php"<button type="submit" class="btn btn-success btn-sm mx-1 mb-3">Ajouter</button></a>
                <!-- bouton ajouter -->
                <a href="disc.php"<button type="button" class="btn btn-warning btn-sm mx-1 mb-3">Retour</button></a>
            </div> <!-- End of div for button -->
        </form>



    </div> <!-- End of container -->

    <!-- Correspondance avec la BBD -->
    <?php
    //checking if data has been entered
    if (isset($_GET['data']) && !empty($_GET['data'])) {
        $data = $_GET['data'];
    } else {
        header('location: script_disc_ajout.php'); // POUR L'INSTANT PAS D'EMPLACEMENT
        exit();
    }

    //setting up mysql details
    // $sql_server = 'localhost';
    // $sql_user   = 'admin';
    // $sql_pwd    = 'root';
    // $sql_db     = 'disc';

    //connecting to sql database
    // $myslqi = new mysqli($sql_server, $sql_user, $sql_pwd, $sql_db) or die($mysqli->error);

    //inserting details into table
    // $insert = $mysqli->query("INSERT INTO table ( `data` ) VALUE ( '$data' )");

    //closing mysqli connection
    // $mysql->close;
    ?>
</body>

<?php
    include 'footer.php';
?>