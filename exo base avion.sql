-- cours en ligne sur le langage SQL : http://sql.sh/cours

-- 1. liste de tous les numéros d’avions
select av_id from avion;

-- 2. Liste des noms des pilotes
select pi_nom from pilote;

-- 3. Liste des marques d’avions
select av_modele from avion;

-- 4. Liste des vols pour Nice
select vo_id,vo_avion,vi_nom from vol,ville where vo_site_arrivee=vi_id and vi_nom="nice";

-- 5. Liste des avions qui ont plus de 200 places
select av_const, av_modele, av_capacite from avion where av_capacite > 200;

-- 6. Liste des avions AIRBUS localisés à Toulouse
select * 
from avion, ville 
where av_site=vi_id and av_const="AIRBUS" and vi_nom="TOULOUSE";

-- 7. Liste des avions AIRBUS allant à Paris
select *
from avion, vol, ville 
where vo_avion=av_id and vo_site_arrivee=vi_id and vi_nom="paris" and av_const="airbus";

-- 8. Liste des vols Paris-Nice et Toulouse-Paris
select vo_id toto,vo_avion tyty
from vol,ville vdepart,ville varrivee
where vo_site_depart=vdepart.vi_id and vo_site_arrivee=varrivee.vi_id and
((vdepart.vi_nom="paris" and varrivee.vi_nom="nice") or
(vdepart.vi_nom="toulouse" and varrivee.vi_nom="paris"));

-- 8bis. Liste des vols Paris-Nice
select *
from vol,ville vdepart,ville varrivee
where vo_site_depart=vdepart.vi_id and vo_site_arrivee=varrivee.vi_id and
vdepart.vi_nom="paris" and varrivee.vi_nom="nice";

-- 9. Liste des avions Airbus et Boeing
select * 
from avion 
where av_const="airbus" or av_const="boeing";

-- 10.  Liste des Airbus ou des avions de plus de 200 places
select * 
from avion 
where av_const="airbus" or av_capacite > 200;

-- 11. Liste des avions AIRBUS qui ne sont pas localisés à Toulouse
select *
from avion, ville  
where av_site=vi_id and av_const="airbus" and vi_nom <> "toulouse";

-- 12. Liste des Airbus qui ne vont pas à Paris
select *
from vol, avion, ville 
where vo_avion=av_id and vo_site_arrivee = vi_id and vi_nom <>"paris" and av_const="airbus";

-- 13. Liste des avions pour Paris qui ne sont pas des Airbus
select *
from vol, avion, ville 
where vo_avion=av_id and vo_site_arrivee = vi_id and vi_nom ="paris" and av_const<>"airbus";

-- 14. Liste de tous les vols avec le nom des avions
select *
from vol, avion 
where vo_avion=av_id;

-- 15. Type et capacité des avions en service (donc des avions qui volent !)
select vo_avion, av_const, av_capacite 
from vol, avion 
where vo_avion=av_id;

select *
from avion 
where av_id in (select vo_avion from vol);

-- 15bis liste des avions qui ne sont pas en service
select * 
from avion 
where av_id not in (select vo_avion from vol);

-- 16. Liste des avions partant de Paris et localisé à Nice : 
select * 
from vol, avion, ville vdepart, ville vsite 
where vo_avion=av_id and vo_site_depart=vdepart.vi_id and av_site=vsite.vi_id and
vdepart.vi_nom="paris" and vsite.vi_nom="nice";

-- 17. Liste des avions partant d'une ville et localisé dasn cette meme ville
select vo_id, vo_avion, vo_site_depart, vi_id 
from vol, ville,avion 
where vo_site_depart=vi_id and vo_avion=av_id and vo_site_depart=av_site;

select * 
from vol, avion, pilote, ville vdepart, ville varrivee
where vo_avion=av_id and vo_pilote=pi_id and vo_site_depart=vdepart.vi_id and vo_site_arrivee=varrivee.vi_id;

-- 18. Liste des vols dont le pilote est localisé dans la ville de départ
select vo_id, vo_pilote, vo_site_depart, pi_id, pi_nom, pi_site 
from vol, pilote 
where vo_pilote=pi_id and pi_site=vo_site_depart;

-- 19. Liste des vols dont le pilote et l'avion sont localisés dans la ville de départ
select vo_id
from vol, pilote, avion
where vo_avion=av_id and vo_pilote=pi_id 
and vo_site_depart=av_site and vo_site_depart=pi_site;

-- 20. Nom des pilotes en service
select distinct pi_id,pi_nom
from vol, pilote
where vo_pilote=pi_id;

-- 20bis. Nom des pilotes qui ne sont pas en service
select pi_id,pi_nom
from pilote
where pi_id not in (select vo_pilote from vol);

-- jointure gauche
select pi_id, pi_nom, vo_id
from pilote left join vol on pi_id=vo_pilote
where vo_id is null;


-- 21. Nom des avions ayant une même capacité (auto-jointure) 
select distinct a1.av_id
from avion a1, avion a2
where a1.av_capacite=a2.av_capacite and a1.av_id<a2.av_id ;
