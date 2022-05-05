<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Mois de l'année non bisextile</title>
    <!-- Apparence -->
    <style> 
        table, th, td {
            <!-- border: .1rem solid black; -->
            border-collapse: collapse;
            text-align: center;
            white-space: center;
            margin-top:6vh;
            margin-bottom:6vh;
            margin-left:6vh;
            margin-right:6vh;
        }
        th, td {
            width: 15rem;
            height: 3rem;
        }
    </style>
</head>
<body>
    <?php
    // Lister les mois et le nombre de jours
    $jourMois = array('Janvier'=>31,'Février' =>28, 'Mars'=>31, 'Avril'=>30,'Mai'=>31,'Juin'=>30,'Juillet'=>31,'Août'=>31,'Septembre'=>30,'Octobre'=>31,'Novembre'=>30,'Décembre'=> 31);
    // Création du tableau et des titres des colonnes
    echo'<table class="table-dark table-hover table-bordered table-striped"><tr><th>Mois</th> <th>Nombre de jours</th></tr>'."\n";
    // Tri par le mois le plus court
    asort($jourMois);
    // La boucle foreach pour parcourir le tableau
    foreach($jourMois as $mois => $nbJours)
    // Y mettre les mois et jours
    echo'<tr><td>'.$mois.'</td><td>'.$nbJours.'</td></tr>';
    echo'</table>';
    ?>
</body>
</html>