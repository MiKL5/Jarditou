<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Les dates et les heures</title>
</head>

<body>
    <div class="container"> <!-- Fini en bas pour que les réponses ne soient pas coller au bord -->
        <h1 class=text-center>Dates et heures</h1>
    <!-- Je met les echos parce que ce n'est pas un projet et pour gagner un peu de temps -->
    <?php
    echo "1. Trouvez le numéro de semaine de la date suivante : 14/07/2019.<br>";
    // Le numéeo de la semaine du : 14/07/2019.
    // ma date
    $date = new DateTime("2019/07/14");
    // DEUX FAÇONS DE CODER    
    echo "C'est la semaine " . date_format($date, "W" . ".");           // version procédurale
    echo "<br>C'est la semaine " . $date->format("W") . ".<br>";        // version objet
    // $date = "2019/07/14";
    // var_dump($week);
    // echo date("W")
    ?> <hr> <?php
    //----------------------------------------------------------------------------------------------------
    echo "2. Combien reste-t-il de jours avant la fin de votre formation ?<br>";
    // Nombe de semaines avant la fin de la formation
    $datejour = new DateTime();
    $datefin = new DateTime("2022-06-16");
    // jour avant la fin
    $interval = date_diff($datejour, $datefin);
    // affiche le resultat
    echo "il reste " . $interval->format("%a") . " jours";
    // en semaines
    echo ", soit " . $interval->format("%D") . " semaines";
    ?> <hr> <?php
    //-----------------------------------------------------------------------------------------------------
    echo "3. Comment déterminer si une année est bissextile ?<br>";
    // Déterminé une année bisextile
    // année choisi 2022
    $baseDate = "2024-05-10";
    $Year = new DateTime($baseDate);
    // garder que l'annèe
    $B = $Year->format("L");
    // vérif
    if ($B == 1) {
        echo $Year->format("Y") . " est bisextile";
    } else {
        echo $Year->format("Y") . " est non bisextile";
    }
    // echo $Y = $Year->format("Y");
    // var_dump($Y);
    echo "<br>";
    $monTimestamp = strtotime($baseDate);
    // convertion en timstamp puis vérif
    $Y = date("L", $monTimestamp);
    if ($Y == 1) {
        echo $Year->format("Y") . " est bisextile";
    } else {
        echo $Year->format("Y") . " est non bisextile";
    }
    // var_dump($maDate);
    ?> <hr> <?php
    //-----------------------------------------------------------------------------------------------------
    echo "4. Montrez que la date du 32/17/2019 est erronée.<br>";
    // Montrer que la date du 32/17/2019 est erronée.
    // vérif
    $date = DateTime::createFromFormat("d-m-Y", 2019-12-30);
    $error = DateTime::getLastErrors();
    if ($date = 1) {
        echo "Date fausse.";
    } else {
        echo "Date vraie.";
    }
    ?> <hr> <?php
    //-----------------------------------------------------------------------------------------------------
    echo "5. Affichez l'heure courante sous cette forme : 11h25.<br>";
    // afficher l'heure actuelle sous la forme 11h25.
    $heureactuelle  = date("H\hi");
    // var_dump($heureactuelle);
    echo $heureactuelle;
    ?> <hr> <?php
    //-----------------------------------------------------------------------------------------------------
    echo "6. Ajoutez 1 mois à la date courante.<br>";
    // ajouter un mois à la date courante
    $datecourante = new DateTime();
    // saut d'un mois
    $datecourante = new DateTime("+1 months");
    // affichage
    echo "La date est le" . $datecourante->format("d/m/Y") . ".";
    ?> <br> <hr> <?php
    //-----------------------------------------------------------------------------------------------------
    ?> <p>Que s'est-il passé le 1000200000 ?</p> <?php
    // que s'est-il passé le 1000200000 ?
    // var_dump($unknowdate = "1000200000");    
    // var_dump($unknowdate = new DateTime(""));
    // echo $unknowdate->format ('U = d/m/Y');
    $date = date("d-m-Y H-i-s", 1000200000);
    echo ($date) . "<br>";
    $date2 = date("d/m/Y", 1000200000);
    echo ("À la date du " . $date2 . ", crash de 2 avions a NY");
    ?>
    </div> <!-- End of container -->
</body>

</html>