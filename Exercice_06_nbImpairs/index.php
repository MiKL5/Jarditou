<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nb impairs croissants</title>
</head>
<body>
<?php
echo 'Les nombres impairs entre 0 et 150 sont : ';
    for ($i = 1; $i<150 ; $i++)
    {
      if ($i % 2 != 0) echo $i . ', ';
    }
?>
</body>
</html>