-- INSERT : ajout d'enregistrement
INSERT INTO table_name(c1,c2,...) VALUES(v1,v2,..);
insert into vol(pi_id,pi_nom, av_site) values (null,"Gilles",1);
insert into vol(pi_id,pi_nom, av_site) values (null,"Tintin",45);
select * from ville, vol where vi_id=av_site;
select * from vol left join ville on vi_id=av_site;
insert into vol(pi_id,pi_nom) values (null,"hadock");
insert into vol values (null,"hadock",8);

-- UPDATE : mise à jour d'enregistrement
UPDATE table_name 
SET 
    column_name1 = expr1,
    column_name2 = expr2,
    ...
[WHERE
    condition];

update vol
set pi_nom="Victor"
where pi_id=10;

-- DELETE : suppression d'un enregistrement
DELETE FROM table_name [WHERE Clause]
delete from vol where pi_id=12;

-- LES TRANSACTIONS
SET autocommit = 0;
delete from vol where pi_id=11;
rollback;
commit;
