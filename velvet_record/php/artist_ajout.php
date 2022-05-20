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
    <form action="">
        <h1>Ajouter un vinyle</h1>
            <p>Titre</p>
            <input type="text" class="form-control" id="NOM" placeholder="Entrer le titre"><br>
            <!-- devra aller chercher les éléments dans la bdd -->
            <label for="exampleFormControlSelect1">Artiste</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <?php
                foreach( artist in artists) : ?>
                    <option value="PAR L ID CAR SI DEUX NOM IDENTIQUE JE SERAIS COINCÉ"><?=artist.nom?></option>
                <?php
                endforeach;
                ?>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
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