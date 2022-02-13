drop database if exists roille_sa;
create database roille_sa;
use roille_sa;

-- Tables
create table client(
	idC int(4) not null auto_increment,
	nom varchar(25),
	prenom varchar(50),
	adresse varchar(30),
	ville varchar(20),
	cp varchar(5),
	societe varchar(30),
	mail varchar(40),
	tel varchar(10),
	username varchar(100),
    mdp varchar(255),
    role enum("superadmin","admin","user"),
	primary key (idC)
)ENGINE=InnoDB;
create table contrat(
	idCo int(5) not null auto_increment,
	datedebut date,
	datedefin date,
	idC int(4) not null,
	primary key (idCo),
	foreign key (idC) references client(idC)
)ENGINE=InnoDB;
create table facture(
	idF int(5) not null auto_increment,
	montant double(8,2),
	dateF date,
	idCo int(5) not null,
	primary key (idF),
	foreign key (idCo) references contrat(idCo)
)ENGINE=InnoDB;
create table typeMat(
	idTM int(4) not null auto_increment,
	designation varchar(25),
	primary key (idTM)
)ENGINE=InnoDB;
create table materiel(
	idM int(5) not null auto_increment,
	qtM int(3),
	nomM varchar(25),
	idTM int(4) not null,
	primary key (idM),
	foreign key (idTM) references typeMat(idTM)
)ENGINE=InnoDB;
create table location(
	idL int(5) not null auto_increment,
	idCo int(5) not null,
	idM int(5) not null,
	primary key (idL),
	foreign key (idCo) references contrat(idCo),
	foreign key (idM) references materiel(idM)
)ENGINE=InnoDB;

-- Views
create or replace view contrat_client as(
	select co.idCo, co.datedebut, co.datedefin, co.idC, cl.nom, cl.societe
	from contrat co
	join client cl on co.idC=cl.idC
);
create or replace view location_materiel as(
	select l.idL, l.idCo, l.idM, m.qtM, m.nomM
	from location l
	join materiel m on m.idM=l.idM
);
create or replace view materiel_typeMat as(
	select m.idM, m.qtM, m.nomM, m.idTM, tm.designation
	from materiel m
	join typeMat tm on m.idTM=tm.idTM
);

-- Inserts
insert into client values 	(null, "June", "Jane", "8 rue du Charpentier", "Paris", "75009", "July", "june@july.com", "0610111213", "JJ", "KK", "user"),
							(null, "Mars", "April", "4 avenue Foret", "Lille", "59000", "Saturne", "mars@saturne.com", "0710111213", "MA", "NB", "user"),
							(null, "Admin", "Saturne", "4 avenue Foret", "Lille", "59000", "Saturne", "admin@saturne.com", "0700000000", "a", "s", "admin"),
							(null, "Admin", "Null", "IRIS", "Paris", "75000", "Null", "null@news.nll", "0000000000", "a", "1", "superadmin"),
							(null, "User", "Null", "IRIS", "Paris", "75000", "Null", "null@news.nll", "0000000000", "b", "2", "user");
insert into contrat values 	(null, "2022-01-17", null, 1),
							(null, "2022-01-20", null, 2);
insert into facture values 	(null, 80.00, "2022-01-18", 1),
							(null, 120.00, "2022-01-21", 2);
insert into typeMat values 	(null, "Outil"),
							(null, "Matieres premieres");
insert into materiel values (null, 2, "Pelle", 1),
							(null, 3, "Marteau", 1),
							(null, 5, "Sac de ciment", 2),
							(null, 20, "Planches en bois", 2);
insert into location values (null, 1, 2),
							(null, 2, 3);