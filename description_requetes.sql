                        /*Première fonction*/
/*Selectionne le nom de l'artiste, le groupe de l'artiste, 
le nom de la musique dans la table artiste*/
SELECT a.nom, a.groupe, m.nom FROM artiste a
/* Joins les tables artiste & musique qui donne la table am.
Ensuite, la table am est liée à l'id de la table artiste*/
INNER JOIN artiste_musique am ON am.artiste_id = a.id
/*Joins la table musique depuis son id à la table am*/
INNER JOIN musique m ON m.id = am.musique_id
/*l'id de l'artiste est égale à la variable artisteID*/
/*Pour le teste remplacer la variable artisteID par la valeur correspondante*/
WHERE a.id = $artisteID


                        /*Deuxième fonction*/
/*Selectionne toute la table musique */
SELECT * FROM musique m
/*Joins la table artiste_musique à la table am.musique
dont l'id est m.id*/
INNER JOIN artiste_musique am ON am.musique_id = m.id
/*Joins la table artiste depuis son id à la table am.artiste*/
INNER JOIN artiste a ON a.id = am.artiste_id
/*l'id de la musique est égale à la variable musiqueID*/
/*Pour le teste remplacer la variable musiqueID par la valeur correspondante*/
WHERE m.id = $musiqueID


                        /*Troisième fonction*/
/*selectionne l'id, le nom, la durée, l'album de la musique.
Ensuite, regroupe en une chaîne les élements concat comme 
style de la table musique.*/
SELECT m.id, m.nom, m.durée, m.album, CONCAT(s.nom, '/', s.type) as 
style 
FROM musique m
/*Joins la table style depuis son id au style de musique*/
INNER JOIN style s ON s.id = m.style_id
/*Trie par ordre ascendant les noms de la musique, 
de la variable x (début) à la variable y (fin)  */
/*Pour le teste remplacer les variables offset et limit 
par les valeurs correspondantes*/
ORDER BY m.nom ASC LIMIT $offset, $limit


                        /*Quatrième fonction*/
/*selectionne l'id, le nom, la durée, l'album de la musique.
Ensuite, regroupe en une chaîne les élements concat comme 
style de la table style.*/
SELECT m.id, m.nom, m.durée, m.album, CONCAT(s.nom, '/', s.type) as
style
FROM style s
/*Joins la table musique depuis son id au style de musique*/
INNER JOIN musique m ON s.id = m.style_id
/*L'id du style est égale à la variable styleID*/
/*Pour le teste remplacer la variable styleID par la valeur correspondante*/
WHERE s.id = $styleID




