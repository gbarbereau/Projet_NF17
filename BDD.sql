CREATE TABLE Route (
Nom VARCHAR,
Type VARCHAR REFERENCES TYPE_R(type),
Etat VARCHAR REFERENCES ETAT_R(etat),
PRIMARY KEY (Nom,Type) 
);

CREATE TABLE TYPE_R (
type VARCHAR PRIMARY KEY
);

INSERT INTO TYPE_R VALUES ('Boulevard'),('Route'),('Rue'),('Avenue');

--Enumeration de type
CREATE TABLE ETAT_R (
etat VARCHAR PRIMARY KEY
);
--Enumeration de etat
INSERT INTO ETAT_R VALUES ('Normal'),('Bloqué');

CREATE TABLE Liaison (
nom_r VARCHAR,
type_r VARCHAR,
ID_J INTEGER REFERENCES Jonction(ID_J),
PRIMARY KEY (nom_r,type_r,ID_J),
FOREIGN KEY (nom_r, type_r) REFERENCES Route (nom, Type)
);


CREATE TABLE Numero_Rue (
num_rue INTEGER,
nom_route VARCHAR,
type_route VARCHAR,
FOREIGN KEY (nom_route,type_route) REFERENCES Route(Nom,Type),
PRIMARY KEY (num_rue,nom_route,type_route) 
);

CREATE TABLE Batiment (
num_bat INTEGER,
num_rue INT,
nom_route VARCHAR,
type_route VARCHAR,
digicode VARCHAR,
FOREIGN KEY (num_rue, nom_route, type_route) REFERENCES Numero_Rue(num_rue, nom_route, type_route),
PRIMARY KEY (num_bat, num_rue, nom_route, type_route)
);

CREATE TABLE Etage (
num_etage INTEGER,
num_bat INTEGER,
num_rue INT,
nom_route VARCHAR,
type_route VARCHAR,
FOREIGN KEY (num_bat,num_rue,nom_route,type_route) REFERENCES Batiment(num_bat, num_rue,nom_route,type_route),
 PRIMARY KEY (num_etage,num_bat,num_rue,nom_route,type_route)
);

CREATE TABLE Appartement (
num_appart INTEGER,
num_etage INTEGER,
num_bat INTEGER,
num_rue INT,
nom_route VARCHAR,
type_route VARCHAR,
FOREIGN KEY (num_etage,num_bat,num_rue,nom_route,type_route) REFERENCES Etage(num_etage, num_bat, num_rue,nom_route,type_route),
PRIMARY KEY (num_appart,num_etage,num_bat,num_rue,nom_route,type_route) 
);

CREATE TABLE Habitation (
num_client INTEGER REFERENCES Client(num_client),
num_appart INTEGER,
num_etage INTEGER,
num_bat INTEGER,
num_rue INT,
nom_route VARCHAR,
type_route VARCHAR,
FOREIGN KEY (num_appart,num_etage,num_bat,num_rue,nom_route,type_route) REFERENCES Appartement(num_appart, num_etage, num_bat, num_rue, nom_route, type_route),
 PRIMARY KEY (num_client, num_appart, num_etage, num_bat, num_rue, nom_route, type_route)
);


CREATE TABLE Client ( 
num_client SERIAL PRIMARY KEY ,
nom VARCHAR(20),
prenom VARCHAR(20),
email VARCHAR(20),
telephone INTEGER );


CREATE TABLE Marchandise (
identifiant VARCHAR(20) PRIMARY KEY,
denomination VARCHAR(20),
prix INTEGER,
stock INTEGER,
date_arri DATE,
heure_arri INTEGER,
num_client INTEGER NOT NULL REFERENCES Client(num_client) );

CREATE TABLE Livraison (
num_client INTEGER PRIMARY KEY REFERENCES Client(num_client),
date_poss DATE,
heure_poss INTEGER
);

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
