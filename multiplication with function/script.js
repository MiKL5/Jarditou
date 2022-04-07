// Exercice 2 : Table de multiplication
// Ecrivez une fonction qui affiche une table de multiplication.

// Votre fonction doit prendre un paramètre qui permet d'indiquer quelle table afficher.

// Par exemple, TableMultiplication(7) doit afficher :

// 1 x 7 = 7

// 2 x 7 = 14

// 3 x 7 = 21 ...

//----------------------------------------------------------------------------//

function tableMultiplication(nb)
{

    // table de multiplications
    for (var i=0; i<=10; i++)
    {
        resultat = nb * i ;

        console.log(nb+" * "+i+" = "+resultat) ;
    }

    // instructions exécutées après le for (i = 10)
    // affichage du chiffre ou du nombre multiplicateur
    console.log("fin de la table de multiplication par "+nb) ;
}

let n = parseInt(prompt("Ecrivez un nombre"));
tableMultiplication(n);