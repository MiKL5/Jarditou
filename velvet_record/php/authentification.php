<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Authentification</title>
</head>
<?php
    include 'header.php';
?>

<body>
    
    <form action="$_POST">
        <label for="name">Nom : </label>
        <label for="firstname">Prénom : </label>
        <label for="email">Adresse mail :</label>
        <label for="password1">Mot de passe : </label>
        <label for="password2">Confirmer le mode de passe : </label>
    </form>

</body>
<?php
    include 'footer.php'

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
    foreach (login as quelquechose) {
    "CREATE TABLE login IF NOT EXISTS ('
        user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        passwd VARCHAR(20) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
    );"
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

    session_start();

    $_SESSION["login"] = "$_SESSION"; // Au départ "webmaster"
    
    echo $_SESSION["login"];
    echo"- session ID : ".session_id(); // retourne une chaîne vide si y a pas de sessuib

?>