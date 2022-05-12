LOT 1
/* 1 - Afficher la liste des hôtels.
Le résultat doit faire apparaître le nom de l’hôtel et la ville */
SELECT hot_nom, hot_ville
FROM hotel
GROUP BY hot_nom;

/* 2 - Afficher la ville de résidence de Mr White
Le résultat doit faire apparaître le nom, le prénom, et l'adresse du client */
SELECT cli_nom, cli_prenom, cli_ville
FROM client
WHERE cli_nom = 'White';
---
/* 3 - Afficher la liste des stations dont l’altitude < 1000
Le résultat doit faire apparaître le nom de la station et l'altitude */
SELECT sta_nom, sta_altitude FROM station WHERE sta_altitude < 1000; -- N'affiche la station dont l'alitdude est supérieure 1000
SELECT sta_nom, sta_altitude FROM station WHERE sta_altitude < 1000; -- idem
-- DMD À MARION LA DIFFÉRENCE ENTRE WHERE ET HAVING

/* 4 - Afficher la liste des chambres ayant une capacité > 1
Le résultat doit faire apparaître le numéro de la chambre ainsi que la capacité */
SELECT cha_numero, cha_capacite FROM chambre WHERE cha_capacite > 1; -- affiche bien le numéro et la capacité toujours sup. à 1
SELECT cli_nom, cli_ville FROM client WHERE cli_ville NOT IN ("Londre", "Detroit");

/* 5 - Afficher les clients n’habitant pas à Londres
Le résultat doit faire apparaître le nom du client et la ville */
SELECT cli_nom, cli_ville FROM client where cli_ville NOT LIKE "Londre"; -- mettre Londre entre guillemets, et dire d'exclure Londre de cli_ville

/* 6 - Afficher la liste des hôtels située sur la ville de Bretou et possédant une catégorie > 3
Le résultat doit faire apparaître le nom de l'hôtel, ville et la catégorie */
SELECT hot_ville, hot_categorie FROM hotel where hot_ville LIKE "Bretou" AND hot_categorie > 3; -- affiche bien les catégories supérieure à 3 à Bretou

LOT 2
/* 7 - Afficher la liste des hôtels avec leur station
Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, la catégorie, la ville */
SELECT sta_nom, hot_nom, hot_categorie, hot_ville 
FROM station
JOIN hotel;

/* 8 - Afficher la liste des chambres et leur hôtel
Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre*/
SELECT hot_nom, hot_categorie, hot_ville, cha_numero 
FROM hotel 
JOIN chambre;

/* 9 - Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou
Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre et sa capacité*/
SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite
FROM chambre
JOIN hotel ON hot_id = cha_hot_id
WHERE cha_capacite > 1 AND hot_ville = 'Bretou';
-- en sql simple cote pour les chaînes de caractères

/* 10 - Afficher la liste des réservations avec le nom des clients
Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de réservation*/
SELECT cli_nom, hot_nom, res_date
FROM client
JOIN reservation ON res_cli_id = cli_id
JOIN chambre ON cha_id = res_cha_id
JOIN hotel ON hot_id = cha_hot_id;

/*11 - Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station
Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, le numéro de la chambre et sa capacité*/
SELECT sta_nom, hot_nom, cha_numero, cha_capacite
FROM chambre
JOIN hotel ON hot_id = cha_hot_id
JOIN station ON sta_id = hot_sta_id;

/* 12 - Afficher les réservations avec le nom du client et le nom de l’hôtel avec datediff
Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de début du séjour et la durée du séjou*/
SELECT cli_nom, hot_nom, res_date_debut, DATEDIFF(res_date_fin, res_date_debut)
FROM reservation
JOIN client On cli_id = res_cli_id
JOIN chambre ON cha_id = res_cha_id
JOIN hotel ON hot_id = cha_hot_id;

LOT 3

/* 13 COMPTER LE NB D'HOTEL / STATION*/ 
SELECT COUNT(*) AS NbHotel, sta_nom
FROM station
JOIN hotel ON hot_sta_id = sta_id
GROUP BY sta_id;

-- 14 COMPTER LE NOMBRE DE CHAMBRE / STATION
SELECT COUNT(*) AS NbChbre, sta_nom
FROM chambre
JOIN hotel ON cha_hot_id = hot_id
JOIN station ON hot_sta_id = sta_id
GROUP BY sta_nom;

-- 15 COMPTER LE NB CHBRE / STATION AYANT UNE CAPACITÉ > 1
SELECT COUNT(*) nb_chambre, sta_nom -- pas de virgule = alias
FROM chambre
JOIN hotel ON cha_hot_id = hot_id
JOIN station ON hot_sta_id = sta_id
WHERE cha_capacite > 1
GROUP BY  sta_id;

-- 16 AFFICHER LA LISTE DES HOTELS POUR LAQUELLE MR SQUIRE A RESERVÉ
SELECT DISTINCT hot_nom, cli_nom -- DISTINCT SUPPRIME LES DOUBLONS
FROM hotel
JOIN chambre ON hot_id = cha_hot_id
JOIN reservation ON res_cha_id = cha_id
JOIN client ON res_cli_id = cli_id
WHERE cli_nom = 'Squire';

-- 17 AFFICHER LA DURÉE MOYENNE DES RESERVATIONS PAR STATION
SELECT AVG(DATEDIFF(res_date_fin, res_date_debut)), sta_nom
FROM reservation
JOIN chambre ON cha_id = res_cha_id
JOIN hotel ON hot_id = cha_hot_id
JOIN station ON sta_id = hot_sta_id
GROUP BY sta_nom; -- regroup les hotel donc permet une moyenne par hotel