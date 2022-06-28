<?php
require 'db.php';
$db = ConnexionBase();
var_dump($_POST);
// print_r($_POST);
// die;
include 'fn.php';

// Récup du nom d'utilisateur
if (isset($_POST['user_name']) && $_POST['user_name'] != "") {
    $username = $_POST['user_name'];
} else {
    $username = null;
        }

// récu du prénom
if (isset($_POST['user_firstname']) && $_POST['user_firstname'] != "") {
    $userfirstname = $_POST['user_firstname'];
} else {
    $userfirstname = null;
        }

// récup du mail
if (isset($_POST['user_mail']) && $_POST['user_mail'] != "") {
    $usermail = $_POST['user_mail'];
} else {
    $usermail = null;
        }

// récup du mot de passe
if (isset($_POST['user_password']) && $_POST['user_password'] != "") {
    $userpwd = $_POST['user_password'];
} else {
    $userpwd = null;
        }

// En cas d'erreur, renvoyer vers le formulaire
if ($username == Null || $userfirstname == Null || $usermail == Null || $userpwd == Null) {
    header('Location: registration.php');
    exit;
}

// ajour de l'utilisateur à la BDD
try {
    $usr = $db->prepare("INSERT INTO
                                user
                            VALUES
                                (user_id, ?, ?, ?, ?);");
$usr->execute(array($username, $userfirstname, $usermail, password_hash($userpwd, PASSWORD_DEFAULT)));
$usr->closeCursor();
// var_dump($usr);
sendmailsubscribe($usermail);
header("Location: index.php?register=success");
}
// gestion des erreurs
    catch (exception $e){
        var_dump($usr->errorInfo());
        // print_r($usr);
        echo "Erreur : ". $usr->errorInfo()[2] . "<br>";
        // die;
    }
