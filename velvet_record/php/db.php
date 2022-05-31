<!-- Database function library -->
<?php
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

    // function req(){
    //     $conn = ConnexionBase();
    //     $conn->prepare("SELECT artist_name, artist.artist_id FROM artist JOIN disc ON artist.artist_id = disc.artist_id GROUP BY artist_name");
    //     $conn->execute();

    //     $result = $conn->fetch(PDO::FETCH_ASSOC);
    //     return $result;
    // }
?>