CREATE TABLE Client ( 
num_client INTEGER PRIMARY KEY,
nom VARCHAR(20),
prenom VARCHAR(20),
email VARCHAR(20),
telephone INTEGER );

--pas de méthode en BDD

CREATE TABLE Marchandise (
identifiant VARCHAR(20) PRIMARY KEY,
denomination VARCHAR(20),
prix INTEGER,
stock INTEGER,
date_poss DATE,
heure_poss INTEGER,
date_arri DATE,
heure_arri INTEGER,
num_client INTEGER NOT NULL REFERENCES Client(num_client) );



CREATE TABLE Reapprovisionnement (
reference VARCHAR(20) PRIMARY KEY,
delai INTEGER,
restock INTEGER,
id_m VARCHAR(20) REFERENCES Marchandise(identifiant) );

CREATE TABLE Jonction (
ID_J INTEGER PRIMARY KEY,
type VARCHAR REFERENCES type_jonction(typeJ));

CREATE TABLE type_jonction (
typeJ VARCHAR PRIMARY KEY);
