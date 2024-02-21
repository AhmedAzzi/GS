drop database if exists gestion_scolarite;
create database if not exists gestion_scolarite;
use gestion_scolarite;
create table etudiant(
	idEtudiant int(4) auto_increment primary key,
	nom varchar(50),
	prenom varchar(50),
	matricule varchar (50),
	civilite varchar(1),
	photo varchar(100),
	idFiliere int(4),
	date_naissance varchar(50),
	lieu_naissance varchar (200),
	adresse varchar (255),
	ville varchar (50),
	cin varchar (50),
	tel_domicile varchar (50),
	tel_professionnel varchar (50),
	niveau_scolaire varchar (50),
	gmail varchar (50),
	dernier_etablissement varchar (50),
	num_inscription varchar (50),
	date_inscription varchar (50),
	resultat varchar(50),
	annee_scolaire varchar(50)
);
create table filiere(
	idFiliere int(4) auto_increment primary key,
	nomFiliere varchar(50)
);
create table paiement(
	idPaiment int(4) auto_increment primary key,
	nom varchar(50),
	prenom varchar(50),
	annee_scolaire varchar(50),
	niveau varchar(50),
	classe varchar(50),
	typeP varchar(50),
	montantP varchar(50),
	dateP varchar(50),
	mois varchar(50)
);
create table utilisateur(
	iduser int(4) auto_increment primary key,
	login varchar(50),
	role varchar(50),
	pwd varchar(255)
);
create table matiere(
	id_matiere int not null auto_increment primary key,
	nom varchar (50) not null,
	nombre_heure_total int,
	nombre_heure_tp int,
	nombre_heure_th int,
	coef int not null
);
create table programme(
	id_prog int not null auto_increment primary key,
	id_filiere int,
	annee_scolaire varchar(50),
	id_matiere int,
	classe varchar(50)
);
create table scolarite(
	id int not null auto_increment primary key,
	annee_scolaire varchar(50),
	id_etudiant int,
	id_filiere int,
	classe varchar(50),
	resultat varchar(50),
	date_resultat date
);
create table emplois(
	idEmploi int(4) auto_increment primary key,
	nom varchar(50),
	nomMatiere varchar(50),
	niveau varchar(50),
	annee_scolaire varchar(50),
	classe varchar(50)
);
/*Alter table etudiant add constraint foreign key(idFiliere) references filiere(idFiliere);*/
alter table scolarite
add constraint foreign key(id_etudiant) references etudiant(idEtudiant) ON DELETE CASCADE;
-- dans la table scolarité seront supprimées
-- 2	
alter table scolarite
add constraint foreign key(id_filiere) references filiere(idFiliere) ON DELETE CASCADE;
-- 3		
alter table programme
add constraint foreign key (id_filiere) references filiere (idFiliere) ON DELETE CASCADE;
-- 4
alter table programme
add constraint foreign key (id_matiere) references matiere (id_matiere) ON DELETE CASCADE;
-- 5		
describe filiere;
describe etudiant;
describe matiere;
describe scolarite;
INSERT INTO filiere(nomFiliere)
VALUES ('Informatique'),
	('Maths'),
	('SM');
INSERT INTO utilisateur(login, role, pwd)
VALUES ('admin', 'ADMIN', md5('123')),
	(
		'vice_doyen_user',
		'vice doyen',
		md5('123')
	),
	(
		'chef_de_service_user',
		'chef de service',
		md5('123')
	);
INSERT INTO etudiant(
		nom,
		prenom,
		matricule,
		civilite,
		annee_scolaire,
		idFiliere,
		resultat,
		photo
	)
VALUES (
		'SAADAOUI',
		'MOHAMMED',
		'370289520',
		'M',
		'2018/2019',
		1,
		'Admis',
		'user1.png'
	),
	(
		'CHAABI',
		'OMAR',
		'370249520',
		'M',
		'2019/2020',
		2,
		'Admis',
		'user1.png'
	),
	(
		'SALIM',
		'RACHIDA',
		'370259520',
		'F',
		'2020/2021',
		3,
		'Admis',
		'user2.png'
	),
	(
		'FAOUZI',
		'NABILA',
		'3702845689',
		'F',
		'2021/2022',
		1,
		'Admis',
		'user2.png'
	),
	(
		'ETTAOUSSI',
		'KAMAL',
		'370289444',
		'M',
		'2022/2023',
		2,
		'Admis',
		'user1.png'
	),
	(
		'EZZAKI',
		'ABDELKARIM',
		'370289599',
		'M',
		'2023/2024',
		3,
		'Admis',
		'user1.png'
	);
INSERT INTO utilisateur(login, role, pwd)
SELECT matricule,
	'etudiant',
	MD5('password')
FROM etudiant;
select *
from filiere;
select *
from etudiant;
select *
from paiement;
select *
from emplois;
select *
from utilisateur;
select login,
	pwd
from utilisateur;