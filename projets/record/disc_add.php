<?php
    include 'header.php';
    include 'db.php';

    $db = ConnexionBase();

    $conn = $db->prepare("SELECT 
    artist_name, artist.artist_id as id 
    FROM artist, disc 
    WHERE artist.artist_id = disc.artist_id 
    GROUP BY artist_name
    ");
    $conn->execute();

    $artist = $conn->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <div class="container mt-3">
        <h1>Ajouter un vinyle</h1>
<br>
<form action="script_disc_add.php" method="post" enctype="multipart/form-data">
            <label>Titre</label>
            <input type="text" class="form-control" name="title" placeholder="Saisir le titre"><br>
            <label>Artist</label>
            <select class="form-control" name="artist" id="artist">
                <?php foreach ($artist as $artist):?>
                    <option value="<?=$artist->id?>"><?=$artist->artist_name?></option>
                <?php endforeach; ?>
            </select><br>
            <!--
            <input type=" text" class="form-control" name="artist" placeholder="Saisir le nom de l'artist"><br> -->
            <label>Année</label>
            <input type="text" class="form-control" name="year" placeholder="Saisir l'année"><br> <!-- value -->
            <label>Genre</label>
            <input type=" text" class="form-control" name="genre" placeholder="Saisir le genre musical"><br>
            <label>Label</label>
            <input type=" text" class="form-control" name="label" placeholder="EMI, Warner, Polygram, Universal ...)"><br>
            <label>Prix</label>
            <input type=" text" class="form-control" name="price" placeholder="Saisir le prix"><br>
            <label>Jaquette</label><br>
            <label for="insertPicture"></label>
            <input type="file" class="form-control-file" id="insertPicture" name="pics"><br><br>
            <div class="d-flex">
                <!-- les boutons ont une couleurs inhérente leur utilité -->
                <!-- bouton midifier -->
                <button type="submit" class="btn btn-success btn-sm mx-1 mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                </svg></button>
                <!-- bouton ajouter -->
                <a href="disc.php"<button type="button" class="btn btn-warning btn-sm mx-1 mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left text-light fw-bold" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                </svg></button></a>
            </div> <!-- End of div for buttons -->
        </form>
    </div> <!-- End of container -->

<?php
    include 'footer.php';
?>
    <!-- Correspondance avec la BBD -->
    <!--
    checking if data has been entered
    if (isset($_GET['data']) && !empty($_GET['data'])) {
        $data = $_GET['data'];
    } else {
        header('location: disc.php'); // POUR L'INSTANT PAS D'EMPLACEMENT
        exit;
    }

    setting up mysql details
    $sql_server = 'localhost';
    $sql_user   = 'admin';
    $sql_pwd    = 'root';
    $sql_db     = 'disc';

    connecting to sql database
    $myslqi = new mysqli($sql_server, $sql_user, $sql_pwd, $sql_db) or die($mysqli->error);

    inserting details into table
    $insert = $mysqli->query("INSERT INTO table ( `data` ) VALUE ( '$data' )");

    closing mysqli connection
    $mysql->close;
    -->
</body>

