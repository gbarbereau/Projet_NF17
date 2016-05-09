CREATE TABLE Route (
Nom VARCHAR,
Type VARCHAR REFERENCES TYPE_R(type),
Etat VARCHAR REFERENCES ETAT_R(etat),
(Nom,Type) PRIMARY KEY
);

CREATE TABLE TYPE_R (
type VARCHAR PRIMARY KEY
)
--Enumeration de type
CREATE TABLE ETAT_R (
etat VARCHAR PRIMARY KEY
)
--Enumeration de etat

CREATE TABLE Numero_Rue (
num_rue INTEGER,
nom_route VARCHAR,
type_route VARCHAR,
(nom_route,type_route) FOREIGN KEY REFERENCES Route(Nom,Type),
(num_rue,nom_route,type_route) PRIMARY KEY
)

CREATE TABLE Batiment (
num_bat INTEGER,
num_rue VARCHAR,
nom_route VARCHAR,
type_route VARCHAR,
digicode VARCHAR,
(num_rue,nom_route,type_route) FOREIGN KEY REFERENCES Numero_Rue(num_rue,nom_route,type_route),
(num_bat,num_rue,nom_route,type_route) PRIMARY KEY
)

CREATE TABLE Etage (
num_etage INTEGER,
num_bat INTEGER,
num_rue VARCHAR,
nom_route VARCHAR,
type_route VARCHAR,
(num_bat,num_rue,nom_route,type_route) FOREIGN KEY REFERENCES Batiment(num_bat, num_rue,nom_route,type_route),
(num_etage,num_bat,num_rue,nom_route,type_route) PRIMARY KEY
)