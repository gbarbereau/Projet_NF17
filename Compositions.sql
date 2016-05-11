CREATE TABLE Route (
Nom VARCHAR,
Type VARCHAR REFERENCES TYPE_R(type),
Etat VARCHAR REFERENCES ETAT_R(etat),
(Nom,Type) PRIMARY KEY
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
nom_r VARCHAR REFERENCES Route(Nom),
type_r VARCHAR REFERENCES Route(type),
ID_J INTEGER REFERENCES Jonction(ID_J),
(nom_r,type_r,ID_J) PRIMARY KEY
);


CREATE TABLE Numero_Rue (
num_rue INTEGER,
nom_route VARCHAR,
type_route VARCHAR,
(nom_route,type_route) FOREIGN KEY REFERENCES Route(Nom,Type),
(num_rue,nom_route,type_route) PRIMARY KEY
);

CREATE TABLE Batiment (
num_bat INTEGER,
num_rue VARCHAR,
nom_route VARCHAR,
type_route VARCHAR,
digicode VARCHAR,
(num_rue,nom_route,type_route) FOREIGN KEY REFERENCES Numero_Rue(num_rue,nom_route,type_route),
(num_bat,num_rue,nom_route,type_route) PRIMARY KEY
);

CREATE TABLE Etage (
num_etage INTEGER,
num_bat INTEGER,
num_rue VARCHAR,
nom_route VARCHAR,
type_route VARCHAR,
(num_bat,num_rue,nom_route,type_route) FOREIGN KEY REFERENCES Batiment(num_bat, num_rue,nom_route,type_route),
(num_etage,num_bat,num_rue,nom_route,type_route) PRIMARY KEY
);

CREATE TABLE Appartement (
num_appart INTEGER,
num_etage INTEGER,
num_bat INTEGER,
num_rue VARCHAR,
nom_route VARCHAR,
type_route VARCHAR,
(num_etage,num_bat,num_rue,nom_route,type_route) FOREIGN KEY REFERENCES Etage(num_bat, num_rue,nom_route,type_route),
(num_appart,num_etage,num_bat,num_rue,nom_route,type_route) PRIMARY KEY
);

CREATE TABLE Habitation (
num_client INTEGER REFERENCES Client(num_client),
num_appart INTEGER,
num_etage INTEGER,
num_bat INTEGER,
num_rue VARCHAR,
nom_route VARCHAR,
type_route VARCHAR,
(num_appart,num_etage,num_bat,num_rue,nom_route,type_route) FOREIGN KEY REFERENCES Appartement(num_appart,num_bat, num_rue,nom_route,type_route),
(num_client,num_appart,num_etage,num_bat,num_rue,nom_route,type_route) PRIMARY KEY
);
