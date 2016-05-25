--Instructions : Chacun fait deux routes, 
--3 numéros de rue, 4 batiments, 2 étages 1 appartement.
--Chacun fait 7 marchandises/clients.

INSERT INTO Route VALUES ('Colonel Sutterlin', 'Boulevard', 'Normal');
INSERT INTO Route VALUES ('de Flandre','Avenue', 'Bloqué');

INSERT INTO Numero_Rue VALUES ('12', 'Colonel Sutterlin', 'Boulevard');
INSERT INTO Numero_Rue VALUES ('39', 'de Flandre', 'Avenue');
INSERT INTO Numero_Rue VALUES ('42', 'Colonel Sutterlin', 'Boulevard');

INSERT INTO Batiment VALUES ('13','39','de Flandre', 'Avenue', '7632');
INSERT INTO Batiment VALUES ('31','39','de Flandre', 'Avenue', '2367');
INSERT INTO Batiment VALUES ('66', '12', 'Colonel Sutterlin','Boulevard','1996');
INSERT INTO Batiment VALUES ('42', '42', 'Colonel Sutterlin','Boulevard', '1806');

INSERT INTO Etage VALUES ('0','42', '42', 'Colonel Sutterlin','Boulevard');
INSERT INTO Etage VALUES ('1000','42', '42', 'Colonel Sutterlin','Boulevard');
INSERT INTO Etage VALUES ('1','66', '12', 'Colonel Sutterlin','Boulevard');
INSERT INTO Etage VALUES ('-1','66', '12', 'Colonel Sutterlin','Boulevard');
INSERT INTO Etage VALUES ('5','13','39','de Flandre', 'Avenue');
INSERT INTO Etage VALUES ('4','13','39','de Flandre', 'Avenue');
INSERT INTO Etage VALUES ('1','31','39','de Flandre', 'Avenue');
INSERT INTO Etage VALUES ('2','31','39','de Flandre', 'Avenue');

INSERT INTO Appartement VALUES ('1','2','31','39','de Flandre', 'Avenue');
INSERT INTO Appartement VALUES ('13','1','31','39','de Flandre', 'Avenue');
INSERT INTO Appartement VALUES ('2','4','13','39','de Flandre', 'Avenue' );
INSERT INTO Appartement VALUES ('3','5','13','39','de Flandre', 'Avenue');
INSERT INTO Appartement VALUES ('4', '-1','66', '12', 'Colonel Sutterlin','Boulevard');
INSERT INTO Appartement VALUES ('5', '1','66', '12', 'Colonel Sutterlin','Boulevard');
INSERT INTO Appartement VALUES ('6','1000','42', '42', 'Colonel Sutterlin','Boulevard');
INSERT INTO Appartement VALUES ('1','0','42', '42', 'Colonel Sutterlin','Boulevard');

INSERT INTO Habitation VALUES ('214365','1','2','31','39','de Flandre', 'Avenue');
INSERT INTO Habitation VALUES ('214378','13','1','31','39','de Flandre', 'Avenue');
INSERT INTO Habitation VALUES ('214343','2','4','13','39','de Flandre', 'Avenue');
INSERT INTO Habitation VALUES ('214311','3','5','13','39','de Flandre', 'Avenue');
INSERT INTO Habitation VALUES ('214242','4', '-1','66', '12', 'Colonel Sutterlin','Boulevard');
INSERT INTO Habitation VALUES ('214141','5', '1','66', '12', 'Colonel Sutterlin','Boulevard');
INSERT INTO Habitation VALUES ('210000','1','2','31','39','de Flandre', 'Avenue');

INSERT INTO Client VALUES ('214365','Carena','Emma','e@macarena.com','0671352605');
INSERT INTO Client VALUES ('214378','Ademoiselle','Em','e@oiselle.com','0771352605');
INSERT INTO Client VALUES ('214343', 'Pelle', 'Sarah', 's@rah.com','0712345678');
INSERT INTO Client VALUES ('214311','Térieur', 'Alain','t@linterieur.com','0698765432');
INSERT INTO Client VALUES ('214242', 'Sahalor','Aubin','sah@lor.com','0606060606');
INSERT INTO Client VALUES ('214141','Encieu','Cécile', 'c@linterieur.com','0698198115');
INSERT INTO Client VALUES ('210000','Moitou','Eddy','eddy@gpatoutdi.com','0123456789');

INSERT INTO Marchandise VALUES ('10','BIC Bleu','1000','12',NULL,NULL,'214365');
INSERT INTO Marchandise VALUES ('13','BIC Rouge','3',NULL,NULL,NULL,'214378');
INSERT INTO Marchandise VALUES ('11','Poisson Rouge','7','12',NULL,NULL,'214343');
INSERT INTO Marchandise VALUES ('14','Chaise bordeaux','50',NULL,NULL,NULL,'214311');
INSERT INTO Marchandise VALUES ('15','Chaussette','15','12',NULL,NULL,'214242');
INSERT INTO Marchandise VALUES ('16','Gautier','1000',NULL,NULL,NULL,'214141');
INSERT INTO Marchandise VALUES ('17','Poussière','1','12',NULL,NULL,'210000');

INSERT INTO Livraison VALUES ('214365','12/06/2016','15');
INSERT INTO Livraison VALUES ('214378','13/06/2016','16');
INSERT INTO Livraison VALUES ('214343','12/06/2016','13');
INSERT INTO Livraison VALUES ('214311','12/06/2016','15');
INSERT INTO Livraison VALUES ('214242','14/06/2016','17');
INSERT INTO Livraison VALUES ('214141','14/06/2016','10');
INSERT INTO Livraison VALUES ('210000','14/06/2016','11');



