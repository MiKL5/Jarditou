// Exercice 1 - Calcul du nombre de jeunes, de moyens et de vieux
// Il s'agit de dénombrer les personnes d'âge strictement inférieur à 20 ans, les personnes d'âge strictement supérieur à 40 ans et celles dont l'âge est compris entre 20 ans et 40 ans (20 ans et 40 ans y compris).

// Le programme doit demander les âges successifs.

// Le comptage est arrêté dès la saisie d'un centenaire. Le centenaire est compté.

// Donnez le programme Javascript correspondant qui affiche les résultats.

let jeunes=0;
let moyens=0;
let vieux=0;
let age=0;
let tablo=[]; // tableau fictif

while (true)
{
    age = parseInt(prompt("Entrer un âge"));
    if (age <= 20) 
    {
        jeunes++;
    }
    if (age >20 && age <= 40) 
    {
        moyens++;
    }
    if (age >40) 
    {
        vieux++;
    }
    if (age >= 100)
    {
        //vieux++;
        tablo.push(age);
        break;
    }
    else
    {
        tablo.push(age);
    }
}
console.log(tablo);
console.log("il y a "+jeunes+" jeune.s, "+moyens+" intermédiaire.s, "+vieux+" ainé.s.");
window.alert("il y a "+jeunes+" jeune.s, \n"+moyens+" intermédiaire.s, \n& "+vieux+" ainé.s.");