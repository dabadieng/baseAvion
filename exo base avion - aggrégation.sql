select count(*) nb from pilote where pi_site=2;
select vo_id, timediff(vo_heure_arrivee,vo_heure_depart) from vol;
-- https://sql.sh/fonctions/chaines-de-caracteres
-- https://sql.sh/fonctions/mathematiques
-- https://sql.sh/fonctions/agregation
select av_const,avg(av_capacite) moyenne 
from avion 
where av_site=2 
group by av_const
having moyenne>100
order by av_const;

select count(distinct pi_site) from pilote;
select count(pi_site) from pilote group by pi_site;

-- cours en ligne sur le langage SQL : http://sql.sh/cours
-- Faites les requêtes qui affichent :

-- 1. Nombre de pilotes différents pour chaque avion en service
select vo_avion, count(distinct vo_pilote)
from vol
group by vo_avion;

-- 2. Nombre de vols différents pour chaque pilote ordonné par le nombre de vol, puis le nom des pilotes.
select pi_nom, count(*) nb
from vol,pilote
where vo_pilote=pi_id
group by vo_pilote
order by nb,pi_nom;

-- 2bis. Nombre de vols différents pour chaque pilote (avec jointure gauche).
select pi_nom, count(vo_id) nb
from pilote left join vol on vo_pilote=pi_id
group by pi_id
order by nb,pi_nom;

-- 3. Pilotes (ordre croissant des numéros) assurant plus d’un vol (Afficher: Numéro et nom des pilotes,  nombre de vols)
select vo_pilote, pi_nom, count(vo_id) nb
from vol, pilote
where vo_pilote=pi_id
group by vo_pilote
having nb>1
order by vo_pilote;

-- 4.  Nombre de vols assurés au départ de Nice ou de Paris par chaque pilote (Afficher: Numéros des pilotes, nombre de vols)
select vo_pilote, count(vo_id) nb
from vol
where vo_site_depart=1 or vo_site_depart=2
group by vo_pilote;

-- 5. Nombre de vols assurés au départ ou à l'arrivée de Nice par chaque pilote (Afficher: Numéros des pilotes,  nombre de vols)
select vo_pilote, count(vo_id) nb
from vol
where vo_site_depart=1 or vo_site_arrivee=1
group by vo_pilote;

-- 7. Liste des avions de capacité égale ou supérieure à la moyenne
select * from avion where av_capacite >= (select avg(av_capacite) moyenne from avion);
select avg(av_capacite) moyenne from avion;

-- 8. Capacité mini et maxi des BOEING
select min(av_capacite), max(av_capacite) 
from avion
where av_const="boeing";

-- 9. Capacité moyenne des avions localisés à Paris avec 2 chiffres après la virgule
select round(avg(av_capacite),2) moyenne
from avion
where av_site=2;

-- https://dev.mysql.com/doc/refman/5.7/en/numeric-functions.html
select avg(av_capacite) moyenne
from avion
where av_site=2;

-- 10. Capacité moyenne des avions par modele
select av_modele, avg(av_capacite) moyenne 
from avion
group by av_modele;

-- 11. Capacité totale des avions de la table avion
select sum(av_capacite) capacite
from avion;

-- 12. Affichage de l’heure système avec les secondes

select now();
select current_time();