<?php
    include 'db.php';// si je l'appel pas ça marche pas en dessous
    $db = ConnexionBase();
    $pics = ""; // décarer à vide

    // récupréer les infos transmises pas le formulaire
    // Vérifier que les données sont transmises
    var_dump($_POST);

    // Récupérer ce qui arrive au $_POST
    if (isset($_POST['title']) && $_POST['title'] != "")
    {
        ($title = $_POST['title']);
    } else {
        ($title = null);
            }
    // isset($_POST['artist'] -> $artist);

    if (isset($_POST['artist']) && $_POST['artist'] != "")
    {
        ($artist = $_POST['artist']);
    } else {
        ($artist = null);
            }

    if (isset($_POST['year']) && $_POST['year'] != "")
    {
        $y = $_POST['year'];
    } else {
        $y = null;
            }

    if (isset($_POST['genre']) && $_POST['genre'] != "")
    {
        $genre = $_POST['genre'];
    } else {
        $genre = null;
            }

    if (isset($_POST['year']) && $_POST['year'] != "")
    {
        $y = $_POST['year'];
    } else {
        $y = null;
            }

    if (isset($_POST['label']) && $_POST['label'] != "")
    {
        $lbl = $_POST['label'];
    } else {
        $lbl = null;
            }

    if (isset($_POST['price']) && $_POST['price'] != "")
    {
        $price = $_POST['price'];
    } else {
        $price = null;
            }

    // En cas d'erreur, renvoyer vers le formulaire
    if ($title == Null || $artist == Null || $y == Null) { //  || $genre == Null || $y == Null  || $lbl == Null || $price == Null
        // header("Location: disc_add.php");
        exit;
    }

    // Réupérer ce qui arrive au $_FILES
    var_dump($_FILES);
    if ($_FILES["pics"]["error"] == 0) {

        // Types d'images utorisés dans un tableau
        $aMimeTypes = array("img/gif", "img/jpeg", "img/pjpeg", "img/png", "img/x-png", "img/tiff", "image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

        // Type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["pics"]["tmp_name"]);
        finfo_close($finfo);

        var_dump($mimetype);// savoir s'l y bien reçu une image compatible
        // die;
        // vérifier si le type d'image concorde à ce qui est autorisé ci-avant
        if (in_array($mimetype, $aMimeTypes))
        {
            //
            var_dump($mimetype);
            // Si le type est parmi ceux autorisés,il est déplacer et renommer le fichier en appliquant le nom d'origine est pas le nom temporaire
            if (move_uploaded_file($_FILES["pics"]["tmp_name"], "img/jaquettes/" . $_FILES["pics"]["name"])) {
                $pics = $_FILES["pics"]["name"]; // name pour avoir le nom d'origine et pas le nom temporaire
            }
        } 
        else 
        {
        // Informé si le type n'est pas autorisé
        echo "Seul les fichiers de moins de 2Mo en gif, jpeg, pjpeg, x-png, png ou tiff sont autorisés. Merci de choisir parmi ceux cités";    
        exit;
        }  
    }
    
    // enregistrer dans la bdd via INSERT INTO
    try{
        $myDisc = $db->prepare("INSERT INTO disc (disc_title, disc_genre, disc_label, disc_price, disc_year, disc_picture) VALUES (:title, :genre, :label, :price, :year, :picture");
        $myDisc = $db->prepare("INSERT INTO artist (artist_name) VALUES (:artist"); //myArtist
        // pour plus de clareté, j'ai fait des espaces, mais ça ne fonctione pas dans tou les langages
        $myDisc->bindValue(':title',    $title,     PDO::PARAM_STR);
        $myDisc->bindValue(':artist'    $artist,    PDO::PARAM_STR); // peut-etre myArtist
        $myDisc->bindValue(':genre',    $genre,     PDO::PARAM_STR);
        $myDisc->bindValue(':label',    $lbl,       PDO::PARAM_STR);
        $myDisc->bindValue(':price',    $price,     PDO::PARAM_STR); // PARAM_STR pour avoir les chiffres après la virgule
        $myDisc->bindValue(':year',     $y,         PDO::PARAM_INT);
        $myDisc->bindValue(':pics',     $pics,      PDO::PARAM_STR);
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
    
    header("Location: disc.php");
?>