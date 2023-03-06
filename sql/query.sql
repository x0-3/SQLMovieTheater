-- a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur
SELECT title, DATE_FORMAT(releaseDateFrance,"%d/%m/%Y") AS releaseDate, DATE_FORMAT(runningTime, "%H:%i") AS RunningTime, familyName,name
FROM movie m
INNER JOIN producer pr
ON m.idProducer = pr.idProducer
INNER JOIN person p
ON pr.idPerson=p.idPerson
WHERE m.idMovie = 3


-- b. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court
SELECT title, DATE_FORMAT(runningTime,'%Hh%i') AS duration
FROM movie
WHERE runningTime>= "2:15:00"


-- c. Liste des films d’un réalisateur (en précisant l’année de sortie)
SELECT familyName,name,title, DATE_FORMAT(releaseDateFrance,"%d/%m/%Y") AS releaseDate
FROM movie m
INNER JOIN producer pr 
ON m.idProducer=pr.idProducer
INNER JOIN person p
ON p.idPerson=pr.idPerson
WHERE familyName= "Johnstone"


-- d. Nombre de films par genre (classés dans l’ordre décroissant)
SELECT genreName,count(title) AS movie
FROM movie m
INNER JOIN moviegenre mg
ON m.idMovie=mg.idMovie
INNER JOIN genre g
ON mg.idGenre=g.idGenre
GROUP BY genreName
ORDER BY COUNT(title) DESC

-- e. Nombre de films par réalisateur (classés dans l’ordre décroissant)
SELECT NAME, familyName , COUNT(title) AS nbMovie
FROM movie m
INNER JOIN producer pr
ON m.idProducer=pr.idProducer
INNER JOIN person p
ON pr.idPerson=p.idPerson
GROUP BY NAME,familyName
ORDER BY nbMovie DESC 


-- f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe
SELECT title, familyName, NAME, gender
FROM moviecast mc
INNER JOIN actor a
ON mc.idActor=a.idActor
INNER JOIN person p
ON a.idPerson=p.idPerson
INNER JOIN movie m
ON mc.idMovie=m.idMovie
WHERE mc.idMovie = 2


-- g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie
-- (du film le plus récent au plus ancien)
SELECT familyName, NAME,roleName,title, DATE_FORMAT(releaseDateFrance,"%d/%m/%Y") AS releaseDate
FROM moviecast mc
INNER JOIN actor a
ON mc.idActor= a.idActor
INNER JOIN person p
ON a.idPerson=p.idPerson
INNER JOIN ROLE r
ON mc.idRole=r.idRole
INNER JOIN movie m
ON mc.idMovie=m.idMovie
WHERE a.idActor= 9
ORDER BY YEAR(releaseDate) DESC, MONTH(releaseDate)DESC 


-- h. Listes des personnes qui sont à la fois acteurs et réalisateurs
SELECT familyName,NAME  
FROM person p 
INNER JOIN producer pr
ON p.idPerson=pr.idPerson
INNER JOIN actor a
ON p.idPerson=a.idPerson


-- i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)
SELECT title,DATE_FORMAT(releaseDateFrance, "%d/%m/%Y") AS releaseDate
FROM movie
WHERE DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), releaseDateFrance)),'%Y')+0 < 5
ORDER BY YEAR(releaseDateFrance) DESC, MONTH(releaseDateFrance) DESC 


-- j. Nombre d’hommes et de femmes parmi les acteurs
SELECT gender, COUNT(a.idPerson) AS count
FROM actor a
INNER JOIN person p
ON a.idPerson=p.idPerson
GROUP BY gender


-- k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)
SELECT familyName, NAME, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),birthday)),'%Y')+0 AS age
FROM person p
INNER JOIN actor a
ON p.idPerson=a.idPerson
WHERE DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),birthday)),'%Y')+0 > 50


-- l. Acteurs ayant joué dans 3 films ou plus
SELECT familyName, NAME, COUNT(mc.idMovie) AS nbMovies
FROM person p
INNER JOIN actor a
ON p.idPerson = a.idPerson
INNER JOIN moviecast mc
ON a.idActor = mc.idActor
GROUP BY familyName, NAME
HAVING nbMovies >=3

