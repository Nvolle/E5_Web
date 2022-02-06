drop database if exists roille_sa;
create database roille_sa;
use roille_sa;

create table client(
	idC int(4) not null auto_increment,
	nom varchar(25),
	adresse varchar(30),
	ville varchar(20),
	cp varchar(5),
	societe varchar(30),
	mail varchar(40),
	tel varchar(10),
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
	nom varchar(25),
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
create table user(
    idU int(3) not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    username varchar(100),
    mdp varchar(255),
    role enum("admin","user"),
    primary key(idU)
);
insert into client values 	(null, "June", "8 rue du Charpentier", "Paris", "75009", "July", "june@july.com", "0610111213"),
							(null, "Mars", "4 avenue Foret", "Lille", "59000", "Saturne", "mars@saturne.com", "0710111213");
insert into contrat values 	(null, "2022-01-17", null, 1),
							(null, "2022-01-20", null, 2);
insert into facture values 	(null, 80.00, "2022-01-18", 1),
							(null, 120.00, "2022-01-21", 2);
insert into typeMat values 	(null, "Outil"),
							(null, "Matières premières");
insert into materiel values (null, 2, "Pelle", 1),
							(null, 3, "Marteau", 1),
							(null, 5, "Sac de ciment", 2),
							(null, 20, "Planches en bois", 2);
insert into location values (null, 1, 2),
							(null, 2, 3);
insert into user values (null, "Jean", "Denis", "JDenis", "JD", "user"),
                        (null, "Jeanne", "Dana", "JDana", "JD", "user"),
						(null, "Admin", "Nicolas", "a", "1", "admin");