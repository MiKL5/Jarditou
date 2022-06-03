<!DOCTYPE html>
<html lang="fr">

<?php
    include "header.php";
?>

<body>

<?php
// on importe le contenu du fichier "db.php"
include "db.php";
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->query("SELECT * FROM artist");
// on récupère tous les résultats trouvés dans une variable
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
// on clôt la requête en BDD
$requete->closeCursor();

?>
<div class="container">
<h1>Liste des artistes (<?= COUNT($tableau) ?>)</h1><!-- ajout d'un bouton 'Ajouter' en bout de ligne -->

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <!-- Ici, on ajoute une colonne pour insérer un lien -->
            <th></th>
        </tr>

        <?php foreach ($tableau as $artist): ?>
        <tr>
            <td><?= $artist->artist_id ?></td>
            <td><?= $artist->artist_name ?></td>
            <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
            <td><a href="artist_detail.php?id=<?= $artist->artist_id ?>"><button type="button" class="btn btn-inline-danger btn-sm mx-5">Détails</button></a></td>
            
        </tr>
        <?php endforeach; ?>

    </table>

    <a class="btn btn-sm btn-success mt-3 mb-5" href="artist_new.php" role="button">Ajouter</a>

    </div>
</body>

</body>

<?php
include "footer.php";
?>