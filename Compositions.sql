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
id_j INTEGER REFERENCES Jonction(id_j),
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
FOREIGN KEY (num_etage,num_bat,num_rue,nom_route,type_route) REFERENCES Etage(num_bat, num_rue,nom_route,type_route),
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
FOREIGN KEY (num_appart,num_etage,num_bat,num_rue,nom_route,type_route) REFERENCES Appartement(num_appart,num_bat, num_rue,nom_route,type_route),
 PRIMARY KEY (num_client,num_appart,num_etage,num_bat,num_rue,nom_route,type_route)
);
