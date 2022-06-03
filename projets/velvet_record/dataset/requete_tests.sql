// LISTE DES REQUETES TESTÉES ET FONCTIONNELLES

- liste des artistes
SELECT artist_name, artist.artist_id FROM artist JOIN disc ON artist.artist_id = disc.artist_id GROUP BY artist_name;
SELECT artist_name, artist.artist_id as id FROM artist, disc WHERE artist.artist_id = disc.artist_id GROUP BY artist_name;


- création de la table



- inscription des users



- connection des users


- disc_detail
SELECT disc_title as title, artist_name as artist, disc_year as year, disc_genre as genre, disc_label as label, disc_price as price FROM artist, disc WHERE artist.artist_id = disc.artist_id;

- artist_form
SELECT artist.artist_id, artist_name , artist_url FROM artist;