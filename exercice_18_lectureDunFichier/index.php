<!DOCTYPE html>
<html lang=fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture d'un fichier</title>
</head>

<body>
    <p> Méthode 1 : la fonction "fopen"</p>
    <?php
    // Ouverture du fichier
    $fp = fopen("https://ncode.amorce.org/ressources/Pool/MS_FULL_STACK/PHP/src/liens.txt", "r"); // r bloque sur read
    // var_dump($fp);
    while (!feof($fp)) {
        // Lecture d'une ligne, le contenu de la ligne est affecté sous forme de liens
        $ligne = fgets($fp, 4096);
        echo "<a href=>" . $ligne . "<br> </a>";
    }
    ?>
    <p>Méthode 2 : la fonction "file"</p>
    <?php
    // Ouvre, prend le contenun, pusi le libère aux autres utilisateurs
    $fichier = file("https://ncode.amorce.org/ressources/Pool/MS_FULL_STACK/PHP/src/liens.txt");
    // var_dump($fichier);
    foreach ($fichier as $line) {
        echo "<a href=>" . $line . "<br> </a>";
    }
    ?>
    <!-- "< ? =" uniquement pour une variable ou une fonction pariculière -->
</body>

</html>