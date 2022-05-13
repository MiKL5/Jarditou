<!DOCTYPE html>
<html lang=fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture d'un fichier</title>
</head>
<body>
    <?php
    // Ouverture du fichier
    $fp = fopen("https://ncode.amorce.org/ressources/Pool/MS_FULL_STACK/PHP/src/liens.txt", "r");
    //  $fichier = file_get_contents("src='liens.txt'");
    // Lecture
    // $lecture = fgets($fichier);
    while (!feof($fp)) 
    { 
        // Lecture d'une ligne, le contenu de la ligne est affecté à la variable $ligne  
        $ligne = fgets($fp, 4096); 
        echo "<a href=>" .$ligne ."<br> </a>"; 
        // echo $ligne;
    }    
    ?>
</body>
</html>