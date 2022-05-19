<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Départements</title>
</head>
<body>
    <!-- Appearance -->
    <style> 
        table, th, td
        {
            border: .1rem solid black;
            border-collapse: collapse;
            text-align: center;
            white-space: center;
            margin-top:6vh;
            margin-bottom:6vh;
            margin-left:6vh;
            margin-right:6vh;
        }
        th, td
        {
            width: 20rem;
            height: 3rem;
        }
    </style>

    <?php
        // Liste des départements
        $listDptReg = array
        (
            "Hauts-de-france" =>  array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
            "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
            "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
            "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
        );
        ksort($listDptReg);
        // Affichez la liste des régions (par ordre alphabétique) suivie du nom des départements
        // En-tête
        echo'<table class="table-dark table-hover table-bordered table-striped"><tr><th class="text-capitalize">Région</th><th class="text-Départements">Département</th></tr>'."\n";
        // 
        
        foreach($listDptReg as $Regions => $Departements)
        
        //asort($Regions);
        // Afficher la liste des régions suivie du nombre de départements
        {
            asort($Departements);?> <!-- tri des départements -->
            <!-- début du tableau et afficher le nb de départements à côter de la réghon -->
            <tr><td><?= $Regions."<br>(".count($Departements)." départements)"?></td><td><?=$Departements[0]?></td></tr> <!-- Via une boucle for car le nombre de départemetn est différents à chaque région-->
            <?php for($i=1; $i < count($Departements); $i++) // comptabge des départements
            {?>
            <tr><td>   </td><td><?=$Departements[$i]?></td></tr><!-- colonne départements -->
        <?php }} ?>






        </table>



    
</body>
</html>