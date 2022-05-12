<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentence</title>
</head>
<body>
<?php
// le compteur de la phrase est défini.
$lines = 1;
// la phrase doit s'arrêter à 500 itérations.
while ($lines <= 500)
{
    echo 'Je dois faire une sauvegarde régulière de mes fichiers.<br />';
    $lines++;
}
?>
</body>
</html>