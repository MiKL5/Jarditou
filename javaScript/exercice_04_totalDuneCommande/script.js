// Exercice 4 : total d'une commande
// A partir de la saisie du prix unitaire noté PU d'un produit et de la quantité commandée QTECOM, afficher le prix à payer PAP, en détaillant la remise REM et le port PORT, sachant que :

// TOT = ( PU * QTECOM )
// la remise est de 5% si TOT est compris entre 100 et 200 € et de 10% au-delà
// le port est gratuit si le prix des produits ( le total remisé ) est supérieur à 500 €. Dans le cas contraire, le port est de 2%
// la valeur minimale du port à payer est de 6 €
// Testez tous les cas possibles afin de vous assurez que votre script fonctionne.

// Ci-dessous, un jeu de tests :

// Saisir 600 € et quantité = 1 : remise 10% (-60 €) soit 540,00 et frais port = 0; à payer : 540 €
// Saisir 501 € et quantité = 1 : remise 10% (-50,1 €) soit 450,90 et frais port 2% (de 450,90 €) soit +9,01 € ; à payer : 450,90+9.01 = 459,91 €.
// Saisir 100 € et quantité = 2 : 200 € donc remise 5% soit 190 € et frais de port 2% soit 3,8 € mini 6 €; à payer : 190+6 = 196 €
// Saisir 3 € et quantité = 1 : remise 0, frais de port 2% soit 0.06 € donc le minimum de 6 € s'applique; à payer : 3+6 = 9 €






// REMISE DE 5 % SI LE TOTAL EST D'AU MOIS 100 €
// ET 10% AU-DELÀ DE 200 €
// PORT GRATUI DÉS 500 € / SINON LE PORT EST DE 2 % / SON PRIX MINIMAL EST DE 6€
// TOT=(PU*QTECOM)


function getInteger(message)
{
    let x = 0;
    while (x == 0 || Number.isNaN(x))
    {
        x = parseInt(prompt(message));
    }
    return x;
}
//-------------------------------------------------------------
let rem = 0;    // remise
let port = 0;
let tot = 0;    // total
let totrem = 0; // total de la remise
let pap;        // prix à payer
//-------------------------------------------------------------
let qtecom = getInteger("Saisissez la ou les quantité.s commandée.s");
console.log("Vous avez commandé "+qtecom+" article.s");
let pu = getInteger("Vous avez commandé "+qtecom+" articles.\n"+"Saisisez le prix unitaire");
console.log("Le prix unitaire est de "+pu+" €");
//-------------------------------------------------------------
tot = pu * qtecom;
//--------la remsie----------
if (tot >= 100 && tot <= 200)
{
    rem=5 / 100;
} else if (tot > 200)
{
    rem=10 / 100;
}
//---------------------------
totrem = tot-(tot*rem);
//---------le port-----------
if (totrem > 500)
{
    port = 0;
} else if (totrem<=500)
{
    port = 2/100 * totrem;
    if(port <= 6) // autre cas 6 € de port
    {
        port = 6;
    }
}
pap = totrem + port;
console.log("Vous devez payer un montant de = "+pap.toFixed(2)+" €");
alert("Vous devez payer un montant de = "+pap.toFixed(2)+" €");
// tofixed permet de choisir la quanité de chiffres aprés la virgule
// window.alert ne semble pas obligatoire
// window seul ne fonctionnne pas
// confirm fait la même chose que alert