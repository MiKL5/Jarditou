
<?php


$today = new DateTime();

var_dump($today);

echo "<br>" . $today->format("d/m/Y à H:i") . "<br>";


$hier = new DateTime("2022-06-26");

var_dump($hier);


// $monpersonnage = new Personnage();


?>