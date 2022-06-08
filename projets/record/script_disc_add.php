<?php
    // récupréer les infos transmises pas le formulaire

    $pics = ""; // décarer à vide

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
                $pics = $_FILES["pics"]["name"]; // name pour avoir le nom d'origine et pas le nom temporaire
            }
        } 
        else 
        {
        // Le type n'est pas autorisé, donc ERREUR

        echo "Type de fichier non autorisé";    
        exit;
        }  
    }
    
    // enregistrer dans la bdd via INSERT INTO

    try{
        $myDisc = $db->prepare("INSERT INTO disc (disc_title, disc_genre, disc_label, disc_price, disc_year, disc_picture) VALUES (:title, :genre, :label, :price, :year, :picture");
        
        $myDisc->bindValue(':title',    $title,     PDO::PARAM_STR);
        $myDisc->bindValue(':genre',    $genre,     PDO::PARAM_STR);
        $myDisc->bindValue(':label',    $lbl,       PDO::PARAM_STR);
        $myDisc->bindValue(':price',    $price,     PDO::PARAM_STR);
        $myDisc->bindValue(':year',     $y,         PDO::PARAM_INT);
        $myDisc->bindValue(':picture',  $pics,      PDO::PARAM_STR);

        $myDisc->execute();
        $myDisc->closeCursor();
        }
        catch (Exception $e) {
            var_dump($myDisc->errorInfo());
            print_r($_POST);
            echo "Erreur : " . $myDisc->errorInfo()[2] . "<br>";
            die("Fin du script (script_disc_modif.php)");
        }
    // Prise en compte du fichier uploadé (l'image devra être récupérée et enregistrée sur votre serveur
    
    //redirection vers disc_new.php si l'ajout est réussi
    
    header("Location: disc_new.php");
?>