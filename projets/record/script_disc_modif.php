<?php
// Get artist par l'id
    include 'db.php';
    
    $id = $_GET['id']; // récupérer l'id  pour la requete
    // Vérification des champs non vide
    // foreach ($_POST as $key => $value) {

    //     $$key = $value;
    // }
    if(isset($_POST))
    {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $y = $_POST['y'];
        $lbl = $_POST['lbl'];
        $pics = $_POST['pics'];
        $price = $_POST['price'];
    }



    $db = ConnexionBase();

    try{
    $myDisc = $db->prepare("UPDATE disc SET disc_title = :title, disc_genre = :genre, disc_label = :label, disc_picture = :picture, disc_price= :price, disc_year = :year WHERE disc_id = :id;"); // finir les modif

    $myDisc->bindValue(':title', $title, PDO::PARAM_STR);
    $myDisc->bindValue(':genre', $genre, PDO::PARAM_STR);
    $myDisc->bindValue(':label', $lbl, PDO::PARAM_STR);
    $myDisc->bindValue(':picture', $pics, PDO::PARAM_STR);
    $myDisc->bindValue(':price', $price, PDO::PARAM_INT);
    $myDisc->bindValue(':year', $y, PDO::PARAM_INT);
    $myDisc->bindValue(':id', $id, PDO::PARAM_INT);


    $myDisc->execute();
    $myDisc->closeCursor();
    }
    catch (Exception $e) {
        var_dump($myDisc->errorInfo());
        print_r($_POST);
        echo "Erreur : " . $myDisc->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_modif.php)");
    }
    header('Location: disc.php');
    exit;
    

    // $result = $myArtist->fetchAll(PDO::FETCH_ASSOC);
    // $result = $myArtist->fetch(PDO::FETCH_ASSOC);
    // print_r($result); // pour voir si les infos remontent
?>