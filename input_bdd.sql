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

INSERT INTO type_jonction VALUES ('Rond-point');
INSERT INTO type_jonction VALUES ('Carrefour');
INSERT INTO type_jonction VALUES ('Intersection');

INSERT INTO jonction VALUES ('1','Rond-point');
INSERT INTO jonction VALUES ('2','Carrefour');
INSERT INTO jonction VALUES ('3','Intersection');

INSERT INTO Liaison VALUES ('Colonel Sutterlin', 'Boulevard','3');
INSERT INTO Liaison VALUES ('de Flandre', 'Avenue','2');

/* ------------------------------------------------------------------------------------------------------------ */


INSERT INTO Route VALUES ('Sunshine', 'Route', 'Normal');
INSERT INTO Route VALUES ('Delbor','Rue', 'Bloqué');

INSERT INTO Numero_Rue VALUES ('7', 'Sunshine', 'Route');
INSERT INTO Numero_Rue VALUES ('100', 'Sunshine', 'Route');
INSERT INTO Numero_Rue VALUES ('24', 'Delbor', 'Rue');

INSERT INTO Batiment VALUES ('0','7', 'Sunshine', 'Route',NULL);
INSERT INTO Batiment VALUES ('1','100', 'Sunshine', 'Route', '0000');
INSERT INTO Batiment VALUES ('2', '100', 'Sunshine', 'Route','0001');
INSERT INTO Batiment VALUES ('1', '24', 'Delbor', 'Rue', '4545');

INSERT INTO Etage VALUES ('0','0', '7', 'Sunshine', 'Route');
INSERT INTO Etage VALUES ('0','1','100', 'Sunshine', 'Route');
INSERT INTO Etage VALUES ('1','1','100', 'Sunshine', 'Route');
INSERT INTO Etage VALUES ('8','1','100', 'Sunshine', 'Route');
INSERT INTO Etage VALUES ('84','2','100', 'Sunshine', 'Route');
INSERT INTO Etage VALUES ('0','1', '24', 'Delbor', 'Rue');
INSERT INTO Etage VALUES ('1','1', '24', 'Delbor', 'Rue');
INSERT INTO Etage VALUES ('2','1', '24', 'Delbor', 'Rue');

INSERT INTO Appartement VALUES ('0','0','0', '7', 'Sunshine', 'Route');
INSERT INTO Appartement VALUES ('2','0','1','100', 'Sunshine', 'Route');
INSERT INTO Appartement VALUES ('001','0','1','100', 'Sunshine', 'Route');
INSERT INTO Appartement VALUES ('102','8','1','100', 'Sunshine', 'Route');
INSERT INTO Appartement VALUES ('8', '84','2','100', 'Sunshine', 'Route');
INSERT INTO Appartement VALUES ('59', '0','1', '24', 'Delbor', 'Rue');
INSERT INTO Appartement VALUES ('9','0','1', '24', 'Delbor', 'Rue');
INSERT INTO Appartement VALUES ('1','2','1', '24', 'Delbor', 'Rue');

INSERT INTO Habitation VALUES ('000001','0','0','0', '7', 'Sunshine', 'Route');
INSERT INTO Habitation VALUES ('514365','102','8','1','100', 'Sunshine', 'Route');
INSERT INTO Habitation VALUES ('999999','102','8','1','100', 'Sunshine', 'Route');
INSERT INTO Habitation VALUES ('000003','8', '84','2','100', 'Sunshine', 'Route');
INSERT INTO Habitation VALUES ('000002','8', '84','2','100', 'Sunshine', 'Route');
INSERT INTO Habitation VALUES ('779966','9','0','1', '24', 'Delbor', 'Rue');
INSERT INTO Habitation VALUES ('214888','1','2','1', '24', 'Delbor', 'Rue');

INSERT INTO Client VALUES ('514365','Jackson','Mhys','77jm@gg.com','0112358134');
INSERT INTO Client VALUES ('214888','Belle','Mira','moi@com.fr','0111111111');
INSERT INTO Client VALUES ('000001', 'Hatsune', 'Miku', 'crypton@fm.com','0607080910');
INSERT INTO Client VALUES ('000003','Kagamine', 'Rin','daijobu@fm.com','0707070707');
INSERT INTO Client VALUES ('000002', 'Kagamine','Len','bakka@fm.com','0621261856');
INSERT INTO Client VALUES ('779966','Outta','Compton', 'west@coast.com',NULL);
INSERT INTO Client VALUES ('999999','Mysgramor','Wuthraad','lol@axe.com','0666666666');

INSERT INTO Marchandise VALUES ('00','whip','50','100',NULL,NULL,'514365');
INSERT INTO Marchandise VALUES ('01','prunes','7','500',NULL,NULL,'214888');
INSERT INTO Marchandise VALUES ('02','Extasy','15','200',NULL,NULL,'000001');
INSERT INTO Marchandise VALUES ('03','cocaine','22',NULL,NULL,NULL,'000003');
INSERT INTO Marchandise VALUES ('04','lsd','44','111',NULL,NULL,'000002');
INSERT INTO Marchandise VALUES ('05','creme-solaire','68',NULL,NULL,NULL,'779966');
INSERT INTO Marchandise VALUES ('06','buche','785','2',NULL,NULL,'999999');

INSERT INTO Livraison VALUES ('514365','05/06/2016','01');
INSERT INTO Livraison VALUES ('214888','06/06/2016','02');
INSERT INTO Livraison VALUES ('000001','07/06/2016','03');
INSERT INTO Livraison VALUES ('000003','08/06/2016','04');
INSERT INTO Livraison VALUES ('000002','09/06/2016','05');
INSERT INTO Livraison VALUES ('779966','10/06/2016','06');
INSERT INTO Livraison VALUES ('999999','11/06/2016','07');

/* ------------------------------------------------------------------------------------------------------------ */


INSERT INTO Route VALUES ('Marjolet', 'Boulevard', 'Normal');
INSERT INTO Route VALUES ('Dadant','Rue', 'Bloqué');

INSERT INTO Numero_Rue VALUES ('396', 'Marjolet', 'Boulevard');
INSERT INTO Numero_Rue VALUES ('69', 'Marjolet', 'Boulevard');
INSERT INTO Numero_Rue VALUES ('32', 'Dadant', 'Rue');

INSERT INTO Batiment VALUES ('0','32', 'Dadant', 'Rue',NULL);
INSERT INTO Batiment VALUES ('1','32', 'Dadant', 'Rue', '0000');
INSERT INTO Batiment VALUES ('2', '69', 'Marjolet', 'Boulevard','0001');
INSERT INTO Batiment VALUES ('1', '396', 'Marjolet', 'Boulevard', '4545');

INSERT INTO Etage VALUES ('0','1', '396', 'Marjolet', 'Boulevard');
INSERT INTO Etage VALUES ('1','1','396', 'Marjolet', 'Boulevard');
INSERT INTO Etage VALUES ('2','1','396', 'Marjolet', 'Boulevard');
INSERT INTO Etage VALUES ('4','2','69', 'Marjolet', 'Boulevard');
INSERT INTO Etage VALUES ('12','2','69', 'Marjolet', 'Boulevard');
INSERT INTO Etage VALUES ('0','0', '32', 'Dadant', 'Rue');
INSERT INTO Etage VALUES ('1','1', '32', 'Dadant', 'Rue');
INSERT INTO Etage VALUES ('2','1', '32', 'Dadant', 'Rue');


INSERT INTO Appartement VALUES ('1','0','1', '396', 'Marjolet', 'Boulevard');
INSERT INTO Appartement VALUES ('2','1','1','396', 'Marjolet', 'Boulevard');
INSERT INTO Appartement VALUES ('34','2','1','396', 'Marjolet', 'Boulevard');
INSERT INTO Appartement VALUES ('50','4','2','69', 'Marjolet', 'Boulevard');
INSERT INTO Appartement VALUES ('23','12','2','69', 'Marjolet', 'Boulevard');
INSERT INTO Appartement VALUES ('12','0','0', '32', 'Dadant', 'Rue');
INSERT INTO Appartement VALUES ('71','1','1', '32', 'Dadant', 'Rue');
INSERT INTO Appartement VALUES ('9','2','1', '32', 'Dadant', 'Rue');

INSERT INTO Habitation VALUES ('100000','1','0','1', '396', 'Marjolet', 'Boulevard');
INSERT INTO Habitation VALUES ('120000','2','1','1','396', 'Marjolet', 'Boulevard');
INSERT INTO Habitation VALUES ('123000','34','2','1','396', 'Marjolet', 'Boulevard');
INSERT INTO Habitation VALUES ('123400','50','4','2','69', 'Marjolet', 'Boulevard');
INSERT INTO Habitation VALUES ('123450','23','12','2','69', 'Marjolet', 'Boulevard');
INSERT INTO Habitation VALUES ('123456','12','0','0', '32', 'Dadant', 'Rue');
INSERT INTO Habitation VALUES ('123457','71','1','1', '32', 'Dadant', 'Rue');
INSERT INTO Habitation VALUES ('123458','9','2','1', '32', 'Dadant', 'Rue');

INSERT INTO Client VALUES ('100000','Troijour','Adam','atroi@gogole.com','0234655782');
INSERT INTO Client VALUES ('120000','Gator','Ali','ali@gator.fr','0111111111');
INSERT INTO Client VALUES ('123000', 'Payesurlechant', 'Amanda', 'ampa@youhou.net','0132547546');
INSERT INTO Client VALUES ('123400','Tonpopulaire', 'Dick','dick@ina.box','0606060606');
INSERT INTO Client VALUES ('123450', 'Enbave','Yvon','yvon@coldmail.fr','0123456789');
INSERT INTO Client VALUES ('123456','Meurdesoif','Jean', 'jm@inlook.fr',NULL);
INSERT INTO Client VALUES ('123457','Defesse','Ray','humour@gogole.com','0234343434');
INSERT INTO Client VALUES ('123458','Balmasque','Hugo','hugo@inmail.com','0235343434');

INSERT INTO Marchandise VALUES ('18','USB32','12','100',NULL,NULL,'100000');
INSERT INTO Marchandise VALUES ('19','Amour','9999','500',NULL,NULL,'120000');
INSERT INTO Marchandise VALUES ('20','Ordinateur','532','200',NULL,NULL,'123400');
INSERT INTO Marchandise VALUES ('21','SGBD','100',0,NULL,NULL,'123456');
INSERT INTO Marchandise VALUES ('22','Perruque','10','111',NULL,NULL,'123458');
INSERT INTO Marchandise VALUES ('23','huile','2',0,NULL,NULL,'123000');
INSERT INTO Marchandise VALUES ('24','farine','1234','2',NULL,NULL,'123457');

INSERT INTO Livraison VALUES ('100000','05/07/2016','12');
INSERT INTO Livraison VALUES ('120000','06/07/2016','14');
INSERT INTO Livraison VALUES ('123400','07/07/2016','11');
INSERT INTO Livraison VALUES ('123456','08/07/2016','9');
INSERT INTO Livraison VALUES ('123450','09/07/2016','13');
INSERT INTO Livraison VALUES ('123457','10/07/2016','14');
INSERT INTO Livraison VALUES ('123458','11/07/2016','12');