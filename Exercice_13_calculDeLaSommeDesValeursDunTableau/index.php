<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culcul de la somme des valeurs d'un tableau</title>
</head>
<body>
    <?php
        // tableau
        $tab = array(4,3,8,2);
        // calcul
        echo "La somme des valeurs du tableau est ".array_sum($tab).".";
    ?>
</body>
</html>