<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Disc new - Détails des disques</title>
</head>

<body>
    <div class="container">
        <H1>Détails</H1>
        <!-- les infos doivent s'ajouter à la table disc -->
        <!-- le contenu doit venir de la bdd record de la table disc -->
        <form action="disc_form.php?disc_id=1" method="get">
            <label>Titre</label>
            <input type="titre" class="form-control" name="title"">
            <label>Artist</label>
            <input type=" titre" class="form-control" name="artist"">
            <label>Année</label>
            <input type=" titre" class="form-control" name="year"">
            <label>Genre</label>
            <input type=" titre" class="form-control" name="genre"">
            <label>Label</label>
            <input type=" titre" class="form-control" name="label"">
            <label>Prix</label>
            <input type=" titre" class="form-control" name="price"">
            <label>Jaquette</label><br>
            <!--<input type=" titre" class="form-control" name="jaquette"">-->
            <img src=" ..." alt="..." class="rounded float-left img-fluid img-thumbnail"><br><br>
            <div class="d-flex">
                <!-- les boutons ont une couleurs inhérente leur utilité -->
                <!-- bouton midifier -->
                <button type="submit" class="btn btn-secondary btn-s mmx-1">Modifier</button>
                <!-- bouton retour -->
                <button type="reset" class="btn btn-danger btn-sm mx-1">Supprimer</button>
                <!-- bouton ajouter -->
                <button type="return" class="btn btn-warning btn-sm mx-1">Retour</button>
            </div> <!-- End of div for button -->
        </form>
    </div> <!-- End of container -->

    <!-- Correspondance avec la BBD -->
    <?php
    //checking if data has been entered
    if (isset($_GET['data']) && !empty($_GET['data'])) {
        $data = $_GET['data'];
    } else {
        header('location: '); // POUR L'INSTANT PAS D'EMPLACEMENT
        exit();
    }

    //setting up mysql details
    $sql_server = 'localhost';
    $sql_user = 'admin';
    $sql_pwd = 'root';
    $sql_db = 'disc';

    //connecting to sql database
    $myslqi = new mysqli($sql_server, $sql_user, $sql_pwd, $sql_db) or die($mysqli->error);

    //inserting details into table
    $insert = $mysqli->query("INSERT INTO table ( `data` ) VALUE ( '$data' )");

    //closing mysqli connection
    $mysqli->close;
    ?>
</body>

</html>