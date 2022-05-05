-- La base Northwind
-- Utilisez le script complet northwind_mysql.sql pour créer la base de données Northwind correspondant au schéma de BDD suivant :
-- MCD Northwind



-- Ecrivez ensuite les requêtes permettant d'obtenir les résultats attendus suivants :
-- 1- Liste des clients français :

	SELECT CompanyName AS Société, ContactName AS Contact, ContactTitle AS Fonction, Phone AS Téléphone
	FROM customers
    WHERE Country LIKE 'France'


-- 2- Liste des produits vendus par le fournisseur "Exotic Liquids" :

    SELECT productName, unitPrice
    FROM products
    WHERE supplierID = 1


-- 3- Nombre de produits mis à disposition par les fournisseurs français (tri par nombre de produits décroissant) :

	SELECT CompanyName, UnitsInStock AS nb_products
	FROM suppliers
    JOIN products ON suppliers.SupplierID = products.SupplierID
    WHERE Country = 'France'
	ORDER BY nb_products DESC

-- 4- Liste des clients français ayant passé plus de 10 commandes :

	SELECT CompanyName, Quantity AS nb_cmdes
    FROM customers
    JOIN orders ON customers.CustomerID = orders.CustomerID
    JOIN `order details` ON orders.OrderID = `order details`.OrderID
    WHERE Country = "France" AND Quantity > 10;

-- 5- Liste des clients dont le montant cumulé de toutes les commandes passées est supérieur à 30000 € :
-- NB: chiffre d'affaires (CA) = total des ventes

    SELECT CompanyName AS "Customers", SUM(`order details`.unitPrice * `order details`.Quantity) AS CA, ShipCountry as "Country"
    FROM customers
    JOIN orders ON customers.CustomerID = orders.CustomerID
    JOIN `order details` ON orders.OrderID = `order details`.OrderID 
    GROUP BY CompanyName 
    HAVING CA > 30000 
    ORDER BY CA DESC;

-- 6- Liste des pays dans lesquels des produits fournis par "Exotic Liquids" ont été livrés :

	SELECT Country
	FROM products
    JOIN suppliers
    ON products.SupplierID = suppliers.SupplierID
 	ORDER BY companyName = 'Exotic Liquids' ASC

-- 7- Chiffre d'affaires global sur les ventes de 1997 :
---NB: chiffre d'affaires (CA) = total des ventes
	SELECT COUNT(`order details`.UnitPrice * `order details`.Quantity) AS `Montant Ventes 97`
	FROM orders
    JOIN `order details` ON `order details`.OrderID = orders.OrderID
    WHERE YEAR(OrderDate) IN (1997)

-- Attention : dans une même vente, un produit peut être vendu plusieurs fois ! Il faut donc d'abord préparer le sous-total de chaque produit, qui tient compte de son prix unitaire et de --la quantité vendue...

-- 8- Chiffre d'affaires détaillé par mois, sur les ventes de 1997 :

	SELECT DISTINCT MONTH(OrderDate) AS MOIS, ROUND(SUM(`order details`.UnitPrice * `order details`.Quantity),2) AS `Montant Ventes 97` -- DISTINCT n'a pas besoin de parenthèse car c'est pas une fonction / ROUND(mettre,2) pour deux chiffres après la virgule
	FROM orders
    JOIN `order details` ON `order details`.OrderID = orders.OrderID
    WHERE YEAR(OrderDate) IN (1997)
	GROUP BY MONTH(OrderDate)

-- 9- A quand remonte la dernière commande du client nommé "Du monde entier" ?
	SELECT OrderDate
    FROM customers
    JOIN orders ON customers.CustomerID = orders.CustomerID
    WHERE CompanyName LIKE 'Du monde entier'

-- 10- Quel est le délai moyen de livraison en jours ?

    SELECT ROUND(AVG(DATEDIFF(ShippedDate,OrderDate)))
    FROM orders