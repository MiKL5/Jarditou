<?php
// définition de la class
class personnage{
    private $_nom;
    private $_prenom;
    private $_age;
    private $_sexe;
// l'accesseur renvoie la valeur d'un atribut (getteur pour l'accesseur)
    private function getpersonnage(){
            return $this->_personnage;
        }
}

?>