<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/styles.css" rel="stylesheet"> <!-- Feuille de style générale -->
  <link href="css/styles_disc.css" rel="stylesheet"> <!-- Feuille de  syle excludive -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Liste des disques</title>
</head>

<?php
include 'php/header.php';
?>

<body>

  <?php include "php/db.php"; // connexion à la base de données
  $db = ConnexionBase(); // connexion
  // éviter l'injection SQL [ prepare(la requête) puis execute() ]
  $disques = $db->prepare("SELECT * FROM disc, artist WHERE artist.artist_id = disc.artist_id ;"); // ORDER BY disc_title
  $disques->execute();

  $result = $disques->fetchAll(PDO::FETCH_OBJ);
  // print_r($result); // pour voir si les infos remontent
  ?>

  <div class="container conteneur">
    <div class="row">
      <div class="col col-8">
        <!-- le nombre de disques doit être calculer pas php par COUNT voir si RECURSIVE (car il faut mettre à jour en temps réel) est une bonne option sinon _NORMAL -->
        <h1 class="font-weight-bold">Liste des disques (<?= count($result) ?>)</h1> <!-- j'ai choisi de compter le nombre de résultats mais j'aurai pu faire une requête SQL qui est plus souvent utiliser -->
      </div> <!-- End of col-11 , liste des disques -->
      <div class="col-1">
        <!-- Un lien vers le formulaire d'ajout doit se trouvé à côté du titre en bout de ligne -->
        <a class="btnadd btn btn-sm btn-success mx-1" href="disc_new.php" role="button">Ajouter</a>
        <!--- vers le formulaire d'ajout (artist_ajout) -->
      </div> <!-- End of col-1 , button 'ajouter' -->
    </div> <!-- End of row -->
  </div> <!-- End of container -->
  <!-- La jaquette est à gauche et les infos à droite -->
  <!-- deux colonnes contenant deux colonnes -->
  <div class="container">
    <!-- CETTE PORTION DEVRA ÊTRE REPRODUITE PAR PHP À CHAQUE NOUVELLE LIGNE -->
    <div class="row row-cols-1 row-cols-md-2">
      <?php foreach ($result as $disc) : ?>
        <div class="card mb-3 border-0" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-5">
              <img src="img/jaquettes/<?= $disc->disc_picture ?>" class="img-fluid rounded" alt="...">
            </div> <!-- End of col for "jaquette" -->
            <div class="col-md-7">
              <div class="card border-0">
                <h5 class="title"><?= $disc->disc_title ?></h5>
                <p><?= $disc->artist_name ?></p>
                <p>Label : <?= $disc->disc_label ?></p>
                <p>Année : <?= $disc->disc_year ?></p>
                <p>Genre : <?= $disc->disc_genre ?></p>
                <p>Prix : <?= $disc->disc_price ?></p>
                <a href="php/disc_detail.php?id=<?= $disc->disc_id ?>"> <button type="button" class="btn btn-sm btn-primary">Détails</button></a>
                <!--- vers disc_detail et pas artist_detail une fois disc_detail corrigé -->
              </div> <!-- End of div card -->
            </div> <!-- End of div pour les infos des disques -->
          </div> <!-- End of row gutter (goutière) -->
        </div> <!-- End of card -->
      <?php endforeach; ?>
    </div> <!-- End of row row -->
  </div> <!-- End of container -->
</body>

<?php
include 'php/footer.php';
?>