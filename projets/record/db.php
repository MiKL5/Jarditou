<?php
// Database function library
    function ConnexionBase() {
        //  try catch essai attrape
        try 
        {
            $connexion = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'root');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
        }
    }
?>