<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Capitales</title>
</head>
<body class="p-5">
    <!-- Appearance -->
    <style>
        table, th, td {
            border: .1rem solid black;
            border-collapse: collapse;
            text-align: center;
            white-space: center;

        }
        th, td {
            height: 3rem;
        }
    </style>
    <?php
        // Liste des capitales
        $List = array(
            "Bucarest" => "Roumanie",
            "Bruxelles" => "Belgique",
            "Oslo" => "Norvège",
            "Ottawa" => "Canada",
            "Paris" => "France",
            "Port-au-Prince" => "Haïti",
            "Port-d'Espagne" => "Trinité-et-Tobago",
            "Prague" => "République tchèque",
            "Rabat" => "Maroc",
            "Riga" => "Lettonie",
            "Rome" => "Italie",
            "San José" => "Costa Rica",
            "Santiago" => "Chili",
            "Sofia" => "Bulgarie",
            "Alger" => "Algérie",
            "Amsterdam" => "Pays-Bas",
            "Andorre-la-Vieille" => "Andorre",
            "Asuncion" => "Paraguay",
            "Athènes" => "Grèce",
            "Bagdad" => "Irak",
            "Bamako" => "Mali",
            "Berlin" => "Allemagne",
            "Bogota" => "Colombie",
            "Brasilia" => "Brésil",
            "Bratislava" => "Slovaquie",
            "Varsovie" => "Pologne",
            "Budapest" => "Hongrie",
            "Le Caire" => "Egypte",
            "Canberra" => "Australie",
            "Caracas" => "Venezuela",
            "Jakarta" => "Indonésie",
            "Kiev" => "Ukraine",
            "Kigali" => "Rwanda",
            "Kingston" => "Jamaïque",
            "Lima" => "Pérou",
            "Londres" => "Royaume-Uni",
            "Madrid" => "Espagne",
            "Malé" => "Maldives",
            "Mexico" => "Mexique",
            "Minsk" => "Biélorussie",
            "Moscou" => "Russie",
            "La Havane" => "Cuba",
            "Helsinki" => "Finlande",
            "Islamabad" => "Pakistan",
            "Vienne" => "Autriche",
            "Vilnius" => "Lituanie",
            "Zagreb" => "Croatie"
        );


        ?>
        <!-- En-tête -->
        <table class="table table-dark table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-capitalize">Capitale</th>
                    <th class="text-capitalize">Pays <br> (<?=count($List)?>)
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 

                // Pays, Toujours trier avant !
                asort($List);
                // suppression des capitales ne commençant pas par B
                foreach ($List as $key => $value)
                {
                    if ($key[0] != "B")
                    {
                        unset ($List[$key]);
                    }                    
                }
                
                // affiche le tableau
                foreach($List as $Capitale => $Pays) : ?>
                    <tr>
                        <td><?= $Capitale ?></td>
                        <td><?= $Pays ?></td>
                    </tr>
                <?php endforeach; ?><!-- ou accolades ouvrantes et fermantes-->

            </tbody>
        </table>
    </body>
</html>