-- 1 Quelles sont les commandes du fournisseur n°9120 ?
SELECT DISTINCT entcom.numfou, entcom.numcom
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou
WHERE entcom.numfou = 9120;

-- 2 Afficher le code des fournisseurs pour lesquels des commandes ont été passées.
SELECT DISTINCT numfou -- DISTINCT pour afficher les fornisseurs sans doublons
FROM entcom;


-- 3 Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés.
SELECT numfou, COUNT(numcom) AS nbCmde, (SELECT COUNT(DISTINCT numfou) FROM entcom) AS nbFr
FROM entcom
GROUP BY numfou;

-- 4 Extraire les produits ayant un stock inférieur ou égal au stock d'alerte, et dont la quantité annuelle est inférieure à 1000.
-- Informations à fournir : n° produit, libellé produit, stock actuel, stock d'alerte, quantité annuelle)
SELECT codart, libart, stkphy, stkale, qteann
FROM produit
WHERE stkphy <= stkale AND qteann < 1000;

-- 5 Quels sont les fournisseurs situés dans les départements 75, 78, 92, 77 ?
-- L’affichage (département, nom fournisseur) sera effectué par département décroissant, puis par ordre alphabétique. 
SELECT nomfou, SUBSTR(posfou, 1, 2) AS dept, posfou  -- 1,2 pour avoir 2 ch du département
FROM fournis
WHERE SUBSTR(posfou, 1, 2) IN (59, 75, 78, 92, 95)
ORDER BY dept DESC, nomfou ASC; -- pos car s'il tri avec deux numéeo de dept alors le E passe en premier sinon il prend les 5 numéro et le tri par numération est prioritaire d'ailleurs il y a un 1 pour la colonne pas et un 2 pour la colonne nomfou


-- 6 Quelles sont les commandes passées en mars et en avril ?
SELECT numcom, datcom
FROM entcom
WHERE MONTH(datcom) IN (3, 4);

-- 7 Quelles sont les commandes du jour qui ont des observations particulières ?
-- Afficher numéro de commande et date de commande
SELECT SUBSTRING(obscom), *
FROM entcom
WHERE obscom = '%'; -- ne fonctionne plus et je ne sais pas pk !

-- 8 Lister le total de chaque commande par total décroissant.
-- Afficher numéro de commande et total
SELECT ligcom.numcom, (ligcom.qtecde * ligcom.priuni) AS totCde
FROM ligcom
GROUP BY numcom
ORDER BY totCde DESC;
-- 9 Lister les commandes dont le total est supérieur à 10000€ ; on exclura dans le calcul du total les articles commandés en quantité supérieure ou égale à 1000.
-- Afficher numéro de commande et total
SELECT ligcom.numcom, (ligcom.qtecde * ligcom.priuni) AS totCde
FROM ligcom
GROUP BY numcom
HAVING totCde >= 10000 < 1000
ORDER BY totCde;
-- 10 Lister les commandes par nom de fournisseur.
SELECT numcom, fournis.nomfou, datcom
FROM entcom
jOIN fournis ON entcom.numfou = fournis.numfou;
-- 11 Sortir les produits des commandes ayant le mot "urgent' en observation.
-- Afficher numéro de commande, nom du fournisseur, libellé du produit et sous total (= quantité commandée * prix unitaire)
SELECT entcom.numcom, obscom, nomfou, libart, (qtecde * priuni) AS sousTotal
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
JOIN vente ON fournis.numfou = vente.numfou
JOIN produit ON produit.codart = vente.codart
JOIN ligcom ON produit.codart = ligcom.codart
WHERE obscom LIKE "%urgente";

-- 12 Coder de 2 manières différentes la requête suivante : Lister le nom des fournisseurs susceptibles de livrer au moins un article.
-- façon1
SELECT nomfou, entcom.numfou
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou;
-- façon2
SELECT fournis.nomfou, entcom.numfou, datcom
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
WHERE YEAR(datcom) IN (2022);

-- 13 Coder de 2 manières différentes la requête suivante : Lister les commandes dont le fournisseur est celui de la commande n°70210.
-- Afficher numéro de commande et date
-- méthode1
SELECT nomfou, numcom, datcom
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
where numcom = 70210;
--méthode2
SELECT nomfou, numcom, datcom
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
HAVING numcom = 70210;

-- 14 Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) que le moins cher des rubans (article dont le premier caractère commence par R).
-- Afficher libellé de l’article et prix1
SELECT libart, prix1
FROM produit
JOIN vente ON vente.codart = produit.codart
WHERE libart LIKE 'R%'
ORDER BY prix1;

-- 15 Sortir la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte.
-- La liste sera triée par produit puis fournisseur
SELECT libart, stkale, stkphy, fournis.numfou, nomfou
FROM produit
JOIN vente ON vente.codart = produit.codart
JOIN fournis ON vente.numfou = fournis.numfou
WHERE stkphy <= '150%'
HAVING stkphy > stkale
ORDER BY libart, nomfou;

-- 17 Sortir la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte, et un délai de livraison d'au maximum 30 jours.
-- La liste sera triée par fournisseur puis produit
SELECT libart, stkale, stkphy, fournis.numfou, nomfou, DATEDIFF(derliv, datcom) as 'delai'
FROM produit
JOIN vente
ON vente.codart = produit.codart
JOIN fournis
ON vente.numfou = fournis.numfou
JOIN ligcom
ON produit.codart = ligcom.codart
JOIN entcom -- mettre toujours les ON sinon il peut confondre quand il trouve
ON ligcom.numcom = entcom.numcom
WHERE stkphy <= '150%' and DATEDIFF(derliv, datcom) <= 30  AND stkphy <= stkale
ORDER BY fournis.nomfou, libart;

-- 17 Avec le même type de sélection que ci-dessus, sortir un total des stocks par fournisseur, triés par total décroissant.
SELECT libart, stkale, stkphy, fournis.numfou, nomfou, derliv
FROM produit
JOIN vente
ON vente.codart = produit.codart
JOIN fournis
ON vente.numfou = fournis.numfou
JOIN ligcom
ON produit.codart = ligcom.codart
ORDER BY stkphy DESC;

-- 18 En fin d'année, sortir la liste des produits dont la quantité réellement commandée dépasse 90% de la quantité annuelle prévue.
-- produit.qteann, ligcom.qtecde
SELECT produit.qteann, ligcom.qtecde
FROM produit
JOIN ligcom
ON ligcom.codart = produit.codart;

-- 19 En fin d'année, sortir la liste des produits dont la quantité réellement commandée dépasse 90% de la quantité annuelle prévue.
SELECT produit.codart, libart, stkphy, stkale, qteann, qtecde
FROM produit
JOIN vente ON produit.codart = vente.codart
JOIN ligcom ON produit.codart = ligcom.codart
WHERE qtecde > '90%';

SELECT produit.codart, libart, stkphy, stkale, qteann, qtecde
FROM produit
JOIN vente ON produit.codart = vente.codart
JOIN ligcom ON produit.codart = ligcom.codart
WHERE qtecde > '90%' AND produit.qteann > '90%';
    
-- Calculer le chiffre d'affaire par fournisseur pour l'année 2018, sachant que les prix indiqués sont hors taxes et que le taux de TVA est 20%.
-- prix ht et tva taux habituel
SELECT (qtecde*priuni) AS CA, datcom, ((qtecde*priuni)*.02) AS TVA, ((qtecde*priuni)*1.02) AS TTC
FROM ligcom
JOIN entcom ON ligcom.numcom = entcom.numcom
JOIN fournis ON fournis.numfou = entcom.numfou
JOIN produit ON produit.codart = ligcom.codart
WHERE YEAR(entcom.datcom) IN (2018);