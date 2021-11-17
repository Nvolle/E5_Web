drop database if exists iris_2022_lm;
create database iris_2022_lm;
use iris_2022_lm;

create table classe(
    idclasse int(3) not null auto_increment,
    nom varchar(30),
    salle varchar(30),
    diplome varchar(30),
    primary key(idclasse)
);

create table etudiant(
    idetudiant int(3) not null auto_increment,
    nom varchar(30),
    prenom varchar(30),
    email varchar(30),
    tel varchar(20),
    adresse varchar(200),
    idclasse int(3) not null,
    primary key (idetudiant),
    foreign key (idclasse) references classe (idclasse)
);

create table professeur(
    idprofesseur int(3) not null auto_increment,
    nom varchar(30),
    prenom varchar(30),
    email varchar(30),
    tel varchar(20),
    primary key (idprofesseur)
);

create table enseignement(
    idenseignement int(3) not null auto_increment,
    matiere varchar(30),
    nbheures int(3),
    coef int(2),
    idclasse int(3) not null,
    idprofesseur int(3) not null,
    primary key (idenseignement),
    foreign key (idclasse) references classe (idclasse),
    foreign key (idprofesseur) references professeur (idprofesseur)
);

/*creation d'une vue*/
create view etudiants_classes as (
    select e.idetudiant, e.nom, e.prenom, e.email, e.tel, e.adresse,
    c.idclasse, c.nom as classe
    from etudiant e, classe c
    where e.idclasse = c.idclasse
);

create view enseignements_classes_professeurs as (
    select e.idenseignement, e.matiere, e.nbheures, e.coef, 
    c.idclasse, c.nom as classe, p.idprofesseur, p.nom as nom_professeur, p.prenom as prenom_professeur
    from enseignement e, classe c, professeur p
    where e.idclasse = c.idclasse and e.idprofesseur = p.idprofesseur
);

insert into classe values (null, "Classe Slam 2 LM", "Salle 2.8", "Bts SIO"),
    (null, "Bachelor Web", "Salle 3.10", "Solutions digitales");
insert into professeur values (null, "Ben", "Oka", "a@gmail.com", "0606060606"),
    (null, "Chouaky", "Abdel", "c@gmail.com", "0707070707");
insert into etudiant values (null, "Fanta", "Mohamed", "a@gmail.com", "0606060606", "Paris", 1),
    (null, "Leo", "Nicolas", "l@gmail.com", "0606060606", "Lille", 2);
insert into enseignement values (null, "BDD", 80, 3, 1, 2),
    (null, "JAVA", 120, 3, 1, 1),
    (null, "Python", 60, 3, 2, 1);

create table user(
    iduser int(3) not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    email varchar(100),
    mdp varchar(255),
    role enum("admin","user"),
    primary key(iduser)
);

insert into user values (null, "Leo", "Nicolas", "a@gmail.com", "123", "admin"),
                        (null, "Fanta", "Maya", "b@gmail.com", "456", "user");