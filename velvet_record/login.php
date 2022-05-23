

<?php

include 'db.php';
// INSCRIPTION
$connexion = ConnexionBase();
$req = $connexion->prepare("select * from record where id = :id and name = :name");
$req->bindValue(':id', $id);
$req->bindValue(':name', $name);
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

print_r($result);

foreach() {

}


// Créétion de la table
foreach(login) {
CREATE TABLE login (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    passwd VARCHAR(20) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
}

// --------------------------------------------------------------------------

// CONNEXION
foreach() {

}

?>
    
</body>
</html>