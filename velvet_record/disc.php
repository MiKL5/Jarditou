<!-- aller chercher include php en bas du fichier -->


<!DOCTYPE html>
<html lang="fr">
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des disques</title>
</head>

<body>

<?php include "db.php"; // connexion à la base de données

$db = ConnexionBase(); // connexion

$disques = $db->prepare("SELECT * FROM disc, artist WHERE artist.artist_id = disc.artist_id;;");
$disques->execute();


$result = $disques->fetchAll(PDO::FETCH_OBJ);
// print_r($result); // pour voir si les infos remontent

?>

  <div class="container">
    <div class="row">
      <div class="col col-11">
        <!-- le nombre de disques doit être calculer pas php par COUNT voir si RECURSIVE (car il faut mettre à jour en temps réel) est une bonne option sinon _NORMAL -->
        <h1 class="font-weight-bold">Liste des disques (<?= count($result) ?>)</h1>
      </div> <!-- End of col-11 , liste des disques -->
      <div class="col-1">
        <!-- Un lien vers le formulaire d'ajout doit se trouvé à côté du titre en bout de ligne -->
        <a class="btn btn-sm btn-success" href="script_artist_ajout.php" role="button">Ajouter</a>
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
          <div class="col-md-4">
            <img src="img/jaquettes/<?= $disc->disc_picture?>" class="img-fluid rounded" alt="...">
          </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?=$disc->disc_title?></h5>
                <p>Label : <?=$disc->disc_label?></p>
                <p>Année : <?=$disc->disc_year?></p>
                <p>Genre : <?=$disc->disc_genre?></p>
                <p>Prix : <?=$disc->disc_price?></p>
                <p>boutton Détail</p>
              </div>
            </div>
          
        </div>
      </div>
        
      <?php endforeach; ?>

    </div> 
    
  </div> <!-- End of container -->
</body>

</html>

