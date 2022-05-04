<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table de multiplication</title>
    <!-- Présentation, th, td widht height 2rem pour la tailles des cases -->
    <style>
        table, th, td {
            border: 0.1rem solid black;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            width: 2rem;
            height: 2rem;
        }
    </style>
</head>
<body>
<?php
// Définir le nombre de colonnes et de lignes à 14 celon l'exercice
$nbcols = 14;
$nbrows = 14;
// Construire la table allant de 0 à 12
echo '<table>';
// en-tête des colonnes et des lignes
echo '<tr>'; // pour le vide avant 0
echo '<th></th>';
for ($th = 0; $th <= 12; $th++) // de 0 à 12
{
    echo '<th>' . $th . '</th>';
}
echo '</tr>';
// boucle de multiplication
for ($rows =0; $rows <= 12; $rows++)
{

    echo('<tr>');
    echo '<th>' . $rows . '</th>';
    // la colonne part aussi de 0
    for ($cols = 0; $cols <= 12; $cols++)
    // multiplication
    echo( '<td>' .$cols*$rows.'</td>');
    echo('</tr>');
}
echo("</table>");
?>
</body>
</html>