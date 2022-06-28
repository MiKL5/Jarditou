<?php
include 'magasins.class.php';
$mktime="";
$result="";
$date_embauche="";
// Définition de la classe employe
class employe{
    public $nom;
    public $prenom;
    public $date_embauche;
    public $poste;
    public $nommagasin;
    public $salaire_brut_annuel;
    public $service;
    public $chqvancance;
    public $chqnoel;
    // méthode permettant de savoir l'ancièneté de l'employé (la méthode est une fonction qui appartient à une classe)
    public function ancienete() {
        $result = $this->date_embauche - mktime();
        echo "l'anciéneté est de ".$result." années.";
    }
    // prime annuelle (5% du salaire brut)
    

    // au 30/11 prime d'anciénté (2% du sbrut / année d'ancienneeté)

    // déduire le montant de cette prime et donné l'ordre de transfert par la bk pour le 30/11

    // vérifier la date de versement de la prime
    // donc fixer la date à la date du jour et faire les conditions nécéssaires dans le code et tester en changer la date pour voir si le message voulu s'affiche


    // afficher chaque mode de réstauration selon le magasin dans lequel l'employé est affecté

    // chèque vacaance pour les employés d'au moins un an d'ancieneté
    // chqèue noël chq an (0 à 10 ans €20 / 11 à 15 €30 et 18 à 18 €50)
        // Afficher si l'employé a le droit d'avoir des chèques Noël (Oui/Non). Pour ce faire, établir les conditions nécessaires dans le programme.
        // Si la réponse est Oui, afficher combien de chèques de chaque montant sera distribué à l'employé.
        // Si aucun chèque n'est distribué pour une tranche d'âge, ne pas afficher.
}

?>