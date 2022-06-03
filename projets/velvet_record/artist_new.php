<!DOCTYPE html>
<html lang="fr">

<?php
    include 'header.php';
?>

<body>

<div class="container bg-light rounded mt-5 mb-5">    
<h1>Ajout d'un.e artiste</h1>

    <a href="artists.php"><button class="btn-sm btn-warning mx-3 mt-3 mb-3">Retour à la liste des artistes</button></a>
    
    <form action ="script_artist_add.php" method="post">

        <!-- <label for="nom_for_label">Nom de l'artiste :</label><br> -->
        <div class="input-group"><!-- Site de l'artiste -->
            <span class="input-group-text mt-3">Nom de l'artiste</span><br>
            <!-- <input type="text" class="form-control mt-3" placeholder="Ajouter le nom de l'artiste"  aria-describedby="basic-addon3" name="nom" id="nom_for_label"> -->
            <input type="text" class="form-control mt-3" name="nom" id="nom_for_label">
        </div>
            
        
        <div class="input-group"><!-- Site de l'artiste -->
            <span class="input-group-text mt-3">Site Internet</span><br>
            <!-- <input type="text" class="form-control mt-3" id="basic-url" placeholder="Ajouter l'adresse du site web"  aria-describedby="basic-addon3" name="url" id="url_for_label"> -->
            <input type="text" class="form-control mt-3" name="url" id="url_for_label">
        <br><br>
        </div>

        

<!-- 
        <label for="artist">Nom de l'artiste :</label><br>
            <input type="text" name="aritst_name" id="artist" value="<?= $myArtist['artist_name'] ?>"> <br><br>

        <label for="url">Adresse site internet :</label><br>
            <input type="text" name="artist_url" id="url" value="<?= $myArtist['artist_url'] ?>"> <br><br> -->

        <input class="btn btn-success btn-sm mx-3 mt-3 mb-3" type="submit" value="Ajouter">

    </form>
    </div>
</body>

<?php
    include 'footer.php';
?>