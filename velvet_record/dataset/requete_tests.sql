// LISTE DES REQUETES TESTÉES ET FONCTIONNELLES

- liste des artistes
SELECT artist_name, artist.artist_id FROM artist JOIN disc ON artist.artist_id = disc.artist_id GROUP BY artist_name;
SELECT artist_name, artist.artist_id as id FROM artist, disc WHERE artist.artist_id = disc.artist_id GROUP BY artist_name;


- création de la table



- inscription des users



- connection des users


