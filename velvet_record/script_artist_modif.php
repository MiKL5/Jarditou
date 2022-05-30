<?php
// Get artist par l'id
    include 'db.php';
    
    // Vérification des champs non vide
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
 
    $db = ConnexionBase();
    $myArtist = $db->prepare("UPDATE artist SET artist_name = :name, artist_url = :url WHERE artist_id = :id;");
    $myArtist->bindValue(':name', $name, PDO::PARAM_STR);
    $myArtist->bindValue(':url', $url, PDO::PARAM_STR);
    $myArtist->bindValue(':id', $id, PDO::PARAM_INT);
    $myArtist->execute();
    $myArtist->closeCursor();

    header('Location: artists.php');
    

    // $result = $myArtist->fetchAll(PDO::FETCH_ASSOC);
    // $result = $myArtist->fetch(PDO::FETCH_ASSOC);
    // print_r($result); // pour voir si les infos remontent
?>