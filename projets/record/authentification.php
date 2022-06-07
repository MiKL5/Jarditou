<?php
    include 'header.php';
    include 'db.php'
?>

<body>
    
    <form action="authentification.php" method="$_POST">
        <div class="container">
            <div class="input-group">
                <span class="input-group-text mt-3" id="basic-addon3">Identifiant</span>
                <input type="text" class="form-control mt-3" id="basic-url" placeholder="<?= $identifier ?>"  aria-describedby="basic-addon3" >
            </div>

            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">Mot de passe</span>
                <input type="text" class="form-control" id="basic-url" placeholder="<?= $passwd ?>"  aria-describedby="basic-addon3" >
            </div>
            <p class="text-danger"><?= $msg ?></p>
            <button type="submit" class="btn btn-primary btn-sm mb-3">Connexion</button>
        </div> <!-- End of container -->
    </form>

    <!-- <form action="autientification.php" method="post"> 
    <table> 
    <tr> 
      <td style="text-align:right">Identifiant :</td> 
      <td><input type="text" name="identifiant" value="<?php ($identifier); ?>" /></td> 
    </tr> 
    <tr> 
      <td style="text-align:right">Mot de passe :</td> 
      <td><input type="password" name="mot_de_passe" value= "<?php ($passwd); ?>" /></td> 
    </tr> 
    <tr> 
      <td></td> 
      <td style="text-align:right"><input type="submit" name="connexion" value="Connexion" /></td> 
    </tr> 
    </table> 
    <p style="color:red"><?php $msg; ?></p> 
    </form>  -->


        <!-- <label for="name" >Nom : </label><br>
        <label for="firstname value">Prénom : </label><br> -->
        <!-- <label for="identifiant" value="$identifier">Adresse mail :</label><br>
        <label for="password"value="$passwd">Mot de passe : </label><br> -->
        <!-- <label for="password1">Confirmer le mode de passe : </label> -->


</body>

<?php
    include 'footer.php';

    include 'db.php';
    // INSCRIPTION
    $connexion = ConnexionBase();
    $req = $connexion->prepare("select * from record where id = :id and name = :name");
    $req->bindValue(':id', $id);
    $req->bindValue(':name', $name);
    $req->execute();
    
    $result = $req->fetch(PDO::FETCH_ASSOC);
    
    print_r($result);

    // foreach() {

    // }


    // Créétion de la table
    /*
    foreach (login) {
    "CREATE TABLE login IF NOT EXISTS ('
        user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        passwd VARCHAR(20) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
    );"
    }*/

    // initialisation des variables
    $identifier= '';
    $passwd= '';
    $msg='';
    // Vérification que l'identification est correcte
    function userexist ($identifier, $passwd) {
        return (bool) rand(0,1);
    }
    // traitement du formulaire
    if (isset($_POST['connection'])){
        // récup des saisies
        $identifier= $_POST['identifier'];
        $passwd= $_POST['password'];
        // Vérif userexist
        if (userexist($identifier, $passwd)) {
            header('location:disc.php'); // envoi un entête brut
            exit; // affiche un msg et termine le script
        } else {
            $msg= 'Identifiant incorrect ou inexistant.';
            $msg= 'Essayer à nouveau.';
            // le formulaire se réaffichera
        }
    }






























    // --------------------------------------------------------------------------

    // CONNEXION
    // foreach() {

    // }

    // Vérif password
    // if (password1 === password2){

    // } else{
    //     echo 'Les mots de passe ne concordent pas, resaisissez les'
    // }

//     session_start();

//     $_SESSION["login"] = "$_SESSION"; // Au départ "webmaster"
    
//     echo $_SESSION["login"];
//     echo"- session ID : ".session_id(); // retourne une chaîne vide si y a pas de sessuib

?> 