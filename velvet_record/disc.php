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
  <div class="container">
    <div class="row">
      <div class="col col-11">
        <!-- le nombre de disques doit être calculer pas php par COUNT voir si RECURSIVE (car il faut mettre à jour en temps réel) est une bonne option sinon _NORMAL -->
        <h1 class="font-weight-bold">Liste des disques (nombre de disque)</h1>
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
    <div class="row">
      <div class=" col-12 col-xl">
        <!-- lvl1 left -->
        <div class="row">
          <!-- for sub-column -->
          <div class="col-6">
            <!-- column 1 -->
            <div class="row">
              <!-- so that the columns are in their place -->
              <div class="col-3">
                <label>Jaquette</label><br>
              </div> <!-- End of sub-column 1 left -->
              <!-- column 2 -->
              <div class="col-1">
                <!-- Les infos émanent de la bdd et sont sur fond blanc comme le texte -->
                <label>Titre</label><br>
                <label>Artiste</label><br>
                <label>Label</label><br>
                <label>Année</label><br>
                <label>Genre</label><br>
                <br>
                <a class="btn btn-sm btn-primary" href="artist_detail.php" role="button">Détails</a>
              </div> <!-- End of sub-column 2 right -->
            </div> <!-- End of row right -->
          </div> <!-- End of col-6 right -->
          <!-- lvl1 right -->
          <div class="col-6">
            <!-- column 1 -->
            <div class="row">
              <div class="col-3">
                <label>Jaquette</label><br>
              </div> <!-- End of sub-column 1 right -->
              <!-- column 2 -->
              <div class="col-1">
                <!-- Les infos émanent de la bdd et sont sur fond blanc comme le texte -->
                <label>Titre</label>
                <label>Artiste</label>
                <label>Label</label>
                <label>Année</label>
                <label>Genre</label>
                <br>
                <br>
                <!-- Ajout d'un boutton détail en primary -->
                <a class="btn btn-sm btn-primary" href="artist_detail.php" role="button">Détails</a>
              </div> <!-- End of sub-column 2 right -->
            </div> <!-- End of row left -->
          </div> <!-- End of col-6 left -->
        </div> <!-- End of row 2 , without there are not 2 columns -->
      </div> <!-- End of col-12 col-xl-->
    </div> <!-- End of row -->
  </div> <!-- End of container -->
</body>

</html>