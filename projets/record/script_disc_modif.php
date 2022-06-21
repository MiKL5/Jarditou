<?php
// Get artist par l'id
    include 'db.php';
    $db = ConnexionBase();
    
    $id = $_GET['id']; // récupérer l'id  pour la requete
    // Vérification des champs non vide
    // foreach ($_POST as $key => $value) {
        var_dump($_POST);
        var_dump($_FILES);
    //     $$key = $value;
    var_dump($_FILES["pics"]["error"]);
    // }
    if(isset($_POST))
    {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $y = $_POST['y'];
        $lbl = $_POST['lbl'];
        // $pics = $_POST['pics'];
        $price = $_POST['price'];
    }
    if ($_FILES["pics"]["error"] == 0) {

        // On met les types autorisés dans un tableau (ici pour une image)
        $aMimeTypes = array("img/gif", "img/jpeg", "img/pjpeg", "img/png", "img/x-png", "img/tiff", "image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

        // On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["pics"]["tmp_name"]);
        finfo_close($finfo);

        var_dump($mimetype);

        if (in_array($mimetype, $aMimeTypes))
        {
            /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
            déplacer et renommer le fichier */
            var_dump($mimetype);

            if (move_uploaded_file($_FILES["pics"]["tmp_name"], "img/jaquettes/" . $_FILES["pics"]["name"])) {

                var_dump($_FILES["pics"]["name"]);
                try{
                    $myDisc = $db->prepare("UPDATE disc SET disc_picture = :picture WHERE disc_id = :id;"); // finir les modif
                
                    $myDisc->bindValue(':picture', $_FILES["pics"]["name"], PDO::PARAM_STR);
                    $myDisc->bindValue(':id',      $id,                     PDO::PARAM_INT);
                
                
                    $myDisc->execute();
                    $myDisc->closeCursor();
                    }
                    catch (Exception $e) {
                        var_dump($myDisc->errorInfo());
                        print_r($_POST);
                        echo "Erreur : " . $myDisc->errorInfo()[2] . "<br>";
                        die("Fin du script (script_disc_modif.php)");
                    }
                }
        } else 
        {
        // Informé si le type n'est pas autorisé
        echo "Seul les fichiers de moins de 2Mo en gif, jpeg, pjpeg, x-png, png ou tiff sont autorisés. Merci de choisir parmi ceux cités";    
        exit;
        }
        // else 
        // {
        // // Le type n'est pas autorisé, donc ERREUR

        // echo "Type de fichier non autorisé";    
        // exit;
        }  


    // $pics = $_POST['pics'];
    

// die();

    try{
    $myDisc = $db->prepare("UPDATE disc SET disc_title = :title, disc_year = :year disc_label = :label, disc_genre = :genre, disc_price= :price, WHERE disc_id = :id;"); // finir les modif

    $myDisc->bindValue(':title',    $title,     PDO::PARAM_STR);
    $myDisc->bindValue(':year',     $y,         PDO::PARAM_INT);
    $myDisc->bindValue(':label',    $lbl,       PDO::PARAM_STR);
    $myDisc->bindValue(':genre',    $genre,     PDO::PARAM_STR);
    $myDisc->bindValue(':price',    $price,     PDO::PARAM_STR); // PARAM_STR pour avoir les deux chiffres aprés la virgule
    $myDisc->bindValue(':id',       $id,        PDO::PARAM_INT);


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