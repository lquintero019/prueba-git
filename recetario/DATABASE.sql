/*
SQLyog Ultimate v9.63 
MySQL - 5.0.37 : Database - main
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`main` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `main`;

/*Table structure for table `bebidas` */

DROP TABLE IF EXISTS `bebidas`;

CREATE TABLE `bebidas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(500) default NULL,
  `img` varchar(500) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `bebidas` */

insert  into `bebidas`(`id`,`nombre`,`img`) values (1,'Agua de orchata','receta1.jpg'),(2,'Licuado de yogurt con fresa y kiwi','receta2.jpg'),(3,'Frapé de sandía','receta3.jpg'),(4,'Margarita de mango','receta4.jpg'),(5,'Martini de arándano','receta5.jpg');

/*Table structure for table `carnes` */

DROP TABLE IF EXISTS `carnes`;

CREATE TABLE `carnes` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(500) default NULL,
  `img` varchar(500) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `carnes` */

insert  into `carnes`(`id`,`nombre`,`img`) values (1,'Ravioles con Carne al Sartén','receta1.jpg'),(2,'Filete Asado a la Parrilla con Champiñones Teriyaki','receta2.jpg'),(3,'Albóndigas con Arroz a la Hawaiana','receta3.jpg'),(4,'Tacos Especiales','receta4.jpg'),(5,'Salpicón de Carne','receta5.jpg'),(6,'Ropa Vieja','receta6.jpg'),(7,'Empanadas de Carne A la Sureña','receta7.jpg');

/*Table structure for table `contacto` */

DROP TABLE IF EXISTS `contacto`;

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL auto_increment,
  `img` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contacto` */

insert  into `contacto`(`id`,`img`) values (1,'elegante1.jpg');

/*Table structure for table `ingre_proce_bebidas` */

DROP TABLE IF EXISTS `ingre_proce_bebidas`;

CREATE TABLE `ingre_proce_bebidas` (
  `id` int(11) NOT NULL auto_increment,
  `id_bebida` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `ingrediente` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `ingre_proce_bebidas` */

insert  into `ingre_proce_bebidas`(`id`,`id_bebida`,`num_pasos`,`ingrediente`) values (1,1,1,'1 taza de arroz blanco.\r\n'),(2,1,2,'5 tazas de agua.\r\n'),(3,1,3,'1/2 taza de leche.\r\n'),(4,1,4,'1/2 cucharada de esencia de vainilla.\r\n'),(5,1,5,'1/2 cucharada de canela molida.\r\n'),(6,1,6,'2/3 de taza de azúcar estándar.'),(7,2,1,'1 plátano.\r\n'),(8,2,2,'6 fresas.\r\n\r\n'),(9,2,3,'1 kiwi.\r\n'),(10,2,4,'125-150 g de yogurt de vainilla.\r\n'),(11,2,5,'180 ml de jugo de piña y naranja mezclados.'),(12,3,1,'6 cubos de hielo.\r\n'),(13,3,2,'2 tazas de cubitos de sandía sin semillas.\r\n'),(14,3,3,'1 cucharadita de miel de abeja.'),(15,3,4,NULL),(16,4,1,'1/3 taza de tequila.\r\n'),(17,4,2,'1/4 taza de licor de naranja (triple seco, Cointreaue o Controye).\r\n'),(18,4,3,'1/4 taza de jugo de limón fresco.\r\n'),(19,4,4,'1 mango, su pulpa.\r\n'),(20,4,5,'1 taza de hielo picado.\r\n'),(21,4,6,'1/4 taza de néctar de mango (opcional).'),(22,5,1,'2 oz (60 ml) de vodka.\r\n'),(23,5,2,'1 oz (30 ml) cointreau.\r\n'),(24,5,3,'1 oz (30 ml) vermut seco.\r\n'),(25,5,4,'2 oz (60 ml) de jugo de arándano.\r\n'),(26,5,5,'1 taza de hielo.');

/*Table structure for table `ingre_proce_carnes` */

DROP TABLE IF EXISTS `ingre_proce_carnes`;

CREATE TABLE `ingre_proce_carnes` (
  `id` int(11) NOT NULL auto_increment,
  `id_carne` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `ingrediente` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `ingre_proce_carnes` */

insert  into `ingre_proce_carnes`(`id`,`id_carne`,`num_pasos`,`ingrediente`) values (1,1,1,'1 libra de solomillo de res molido (90% magro).\r\n'),(2,1,2,'1 lata (24 onzas) de salsa de cebollas y ajos asados para pastas Hunt\'s Roasted Garlic & Onion Pasta Sauce.\r\n'),(3,1,3,'1 lata (14.5 onzas) de tomates en cubos sin sal Hunt\'s Diced Tomatoes-No Salt Added, sin escurrir.\r\n'),(4,1,4,'1 paquete (9 onzas) de ravioles rellenos con queso, refrigerados.\r\n'),(5,1,5,'2 cucharadas de queso parmesano, rallado.'),(6,2,1,'Spray anti-adherente para parrilla PAM® Grilling.\r\n'),(7,2,2,'1 paquete (8 onzas) de champiñones frescos cortados en rebanadas.\r\n'),(8,2,3,'1/2 taza de cebolla picada.\r\n'),(9,2,4,'1/3 de taza de salsa-adobo teriyaki para saltear La Choy Teriyaki Stir Fry Sauce-Marinade.\r\n'),(10,2,5,'4 filetes de solomillo alto de res, deshuesados (aproximadamente 6 onzas cada uno).\r\n'),(11,2,6,'1 cucharadita de sal sazonada.\r\n'),(12,2,7,'1/2 cucharadita de pimienta negra molida gruesa.'),(13,3,1,'1 lata (8 onzas) de piña en trocitos con jugo, dividida.\r\n'),(14,3,2,'1 taza de salsa barbacoa Hunt\'s Original Barbecue Sauce, dividida.\r\n'),(15,3,3,'1 libra de carne de res molida (85% magra).\r\n'),(16,3,4,'2-1/4 tazas de arroz integral instantáneo, sin cocinar, dividido.\r\n'),(17,3,5,'1/4 de cucharadita de sal.\r\n'),(18,3,6,'1/8 de cucharadita de pimienta negra molida.\r\n'),(19,3,7,'Spray anti-adherente PAM Original.\r\n'),(20,3,8,'3/4 de taza de pimiento dulce verde congelado, picado.'),(21,4,1,'1 libra de solomillo de res molido (90% magro).\r\n'),(22,4,2,'2 latas (10 onzas cada una) de tomates en cubos y ajíes verdes estilo original Ro*Tel Original Diced Tomatoes & Green Chilies, divididos.\r\n'),(23,4,3,'1 paquete (1.25 onzas) de mezcla para sazonar tacos, con 30% menos de sodio.\r\n'),(24,4,4,'1/3 de taza de agua.\r\n'),(25,4,5,'12 tortillas duras para tacos, dobladas en forma de U, medianas, tibias.\r\n'),(26,4,6,'3 tazas de lechuga cortada en finas tiras.\r\n'),(27,4,7,'1-1/2 tazas de queso cheddar, rallado.'),(28,5,1,'Spray anti-adherente PAM Original.\r\n'),(29,5,2,'1-1/2 libras de carne de res molida (93% magra).\r\n'),(30,5,3,'1 taza de pan molido seco no sazonado.\r\n'),(31,5,4,'3/4 de taza de cebolla amarilla picada.\r\n'),(32,5,5,'2 cucharadas de vinagre blanco destilado.\r\n'),(33,5,6,'1/2 cucharadita de sal.\r\n'),(34,5,7,'1/2 cucharadita de pimienta negra molida.\r\n'),(35,5,8,'1 taza de papas ralladas (hash brown potatoes), congeladas.\r\n'),(36,5,9,'1 taza de zanahorias rallada.\r\n'),(37,5,10,'3 huevos cocidos, sin la cáscara y picados en rebanadas.'),(38,6,1,'Spray anti-adherente PAM Original.\r\n'),(39,6,2,'1-1/2 libras de carne de falda de res, cortada en trozos grandes.\r\n'),(40,6,3,'1 hoja de laurel.\r\n'),(41,6,4,'1-1/2 cucharaditas de comino molido.\r\n'),(42,6,5,'1/2 cucharadita de orégano seco.\r\n'),(43,6,6,'1/2 cucharadita de sal.\r\n'),(44,6,7,'1/4 de cucharadita de pimienta negra molida.\r\n'),(45,6,8,'1 taza de cebolla roja picada.\r\n'),(46,6,9,'3/4 de taza de pimiento verde picado.\r\n'),(47,6,10,'3 cucharadas de ajo finamente picado.\r\n'),(48,6,11,'1 lata (14.5 onzas) de tomates en cubos Hunt\'s Diced Tomatoes, escurridos.\r\n'),(49,6,12,'1 lata (8 onzas) de salsa de tomate Hunt\'s Tomato Sauce.'),(50,6,13,'alas de chichicul'),(51,6,14,'ddos de pollo'),(52,7,1,'200 gr de poshito\r\n'),(53,7,2,'100 gr de harina para hot quackes'),(54,7,3,'3 pedazitos de amor <3');

/*Table structure for table `ingre_proce_pastas` */

DROP TABLE IF EXISTS `ingre_proce_pastas`;

CREATE TABLE `ingre_proce_pastas` (
  `id` int(11) NOT NULL auto_increment,
  `id_pastas` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `ingrediente` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `ingre_proce_pastas` */

insert  into `ingre_proce_pastas`(`id`,`id_pastas`,`num_pasos`,`ingrediente`) values (1,1,1,'2 cucharadas de pasta para untar Parkay Original.\r\n'),(2,1,2,'1-1/2 tazas de mezcla de vegetales picados congelados para sazonar (cebolla, apio, pimiento).\r\n'),(3,1,3,'1 taza de zanahorias en rebanadas congeladas.\r\n'),(4,1,4,'2 tazas de pavo cocinado picado.\r\n'),(5,1,5,'2 tazas de tallarines de huevo anchos secos, sin cocinar.\r\n'),(6,1,6,'1 paquete (32 onzas) de caldo de pollo bajo en sodio.\r\n'),(7,1,7,'2 latas (14.5 onzas cada una) de tomates en cubos asados al fuego Hunt\'s® Fire Roasted Diced Tomatoes, bien escurridos.'),(8,1,8,'1/4 de cucharadita de pimienta negra molida.\r\n'),(9,1,9,'1/4 de cucharadita de hojuelas de perejil.'),(10,2,1,'8 onzas de pasta seca en forma de moñitos, sin cocinar.\r\n'),(11,2,2,'1 lata (14.5 onzas) de tomates en cubos con ajo, asados al fuego Hunt\'s Fire Roasted Diced Tomatoes with Garlic, escurridos.'),(12,2,3,'1/4 de taza de aderezo italiano sin grasas.\r\n'),(13,2,4,'2 tazas de cabezas de coliflor frescas, pequeñas.\r\n'),(14,2,5,'1/2 taza de pimiento dulce verde picado.\r\n'),(15,3,1,'Spray anti-adherente PAM Original.\r\n'),(16,3,2,'1 paquete (24 onzas) de ravioles redondos grandes de queso, congelados.\r\n'),(17,3,3,'1/2 taza de agua.\r\n'),(18,3,4,'1 lata (24 onzas) de salsa de ajo y hierbas para pastas Hunt\'s Garlic & Herb Pasta Sauce.\r\n'),(19,3,5,'2 tazas de hojas de espinacas cortadas, congeladas.\r\n'),(20,3,6,'1-1/2 tazas de queso mozzarella rallado parcialmente descremado.'),(21,4,1,'Spray anti-adherente PAM Original.\r\n'),(22,4,2,'1 paquete (16 onzas) de pasta \'rotini\' seca, sin cocinar.\r\n'),(23,4,3,'5-1/4 tazas de agua caliente.\r\n'),(24,4,4,'1 paquete (24 onzas) de pollo con salsa marinara y queso, tamaño familiar, Banquet® Family Size Cheesy Chicken Marinara congelado.\r\n'),(25,4,5,'1 lata (14.5 onzas) de tomates en cubos con albahaca, ajo y orégano Hunt\'s Diced Tomatoes with Basil, Garlic and Oregano, sin escurrir.\r\n'),(26,4,6,'3/4 de taza de mezcla de quesos italianos rallados.'),(27,5,1,'12 onzas de espaguetis secos, sin cocinar.\r\n'),(28,5,2,'2 cucharadas de aceite de canola Pure Wesson Canola Oil.\r\n'),(29,5,3,'1 taza de cebolla picada.\r\n'),(30,5,4,'2 cucharadas de ajo machacado.\r\n'),(31,5,5,'1 libra de carne de res molida (85% libre de grasa).\r\n'),(32,5,6,'1 lata (24 onzas) de salsa para pasta tradicional Hunt\'s Traditional Pasta Sauce.\r\n'),(33,5,7,'Queso parmesano rallado Kraft Grated Parmesan Cheese, opcional.');

/*Table structure for table `ingre_proce_postres` */

DROP TABLE IF EXISTS `ingre_proce_postres`;

CREATE TABLE `ingre_proce_postres` (
  `id` int(11) NOT NULL auto_increment,
  `id_postres` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `ingrediente` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `ingre_proce_postres` */

insert  into `ingre_proce_postres`(`id`,`id_postres`,`num_pasos`,`ingrediente`) values (1,1,1,'3 galletas de vainilla (wafer cookies).\r\n'),(2,1,2,'Crema batida original Reddi-wip Original Dairy Whipped Topping.\r\n'),(3,1,3,'1 fresa grande, picada en tres partes.'),(4,2,1,'1 galleta graham con sabor a chocolate, machacada (1 galleta = 1 cuadradito).\r\n'),(5,2,2,'1 cucharada de pretzels machacados.\r\n'),(6,2,3,'Crema batida original Reddi-wip Original Dairy Whipped Topping.\r\n'),(7,2,4,'1/4 de taza de fresas frescas picadasPastel \'Shortcake\' de Fresa y Chocolatec.'),(8,3,1,'1 envase (4 onzas liquidas) de yogur griego helado con remolinos de caramelo Healthy Choice® Caramel Swirl Greek Frozen Yogurt.\r\n'),(9,3,2,'4 pretzels rellenos de mantequilla de cacahuate, machacados.'),(10,4,1,'2 galletas graham enteras, partidas por la mitad a lo ancho para conseguir 4 cuadraditos.\r\n'),(11,4,2,'1 envase (3.8 onzas liquidas) de yogur griego helado con remolinos de fudge de chocolate Healthy Choice Dark Fudge Swirl Greek Frozen Yogurt.'),(12,5,1,'1 envase (4 onzas liquidas) de yogur griego helado de fresa Healthy Choice Strawberry Greek Frozen Yogurt.\r\n'),(13,5,2,'2 vasos de postre de pastel esponjoso.\r\n'),(14,5,3,'2 fresas frescas picadas por la mitad.');

/*Table structure for table `ingre_proce_vegetales` */

DROP TABLE IF EXISTS `ingre_proce_vegetales`;

CREATE TABLE `ingre_proce_vegetales` (
  `id` int(11) NOT NULL auto_increment,
  `id_vegetales` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `ingrediente` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Data for the table `ingre_proce_vegetales` */

insert  into `ingre_proce_vegetales`(`id`,`id_vegetales`,`num_pasos`,`ingrediente`) values (1,1,1,'1 lata (15 onzas) de frijoles grandes del norte lavados y escurridos.\r\n'),(2,1,2,'1 frasco (16 onzas) de salsa para pasta Alfredo ligera.\r\n'),(3,1,3,'1/4 de cucharadita de sal de ajo.\r\n'),(4,1,4,'2 latas (14.5 onzas cada una) de tomates en cubos asados al fuego Hunt\'s Fire Roasted Diced Tomatoes, bien escurridos.\r\n'),(5,1,5,'1 taza de queso mozzarella semidescremado rallado.'),(6,2,1,'3 tazas de lechuga iceberg picada.\r\n'),(7,2,2,'2 latas (de 8-3/4 onzas cada una) de granos de maíz enteros, escurridos.\r\n'),(8,2,3,'1 lata (15 onzas) de frijoles negros enteros de primera calidad Rosarita Premium Whole Black Beans, escurridos y lavados.\r\n'),(9,2,4,'1 lata (10 onzas) de tomates en cubos con jugo de limón verde y cilantro estilo mexicano Ro*Tel Mexican Diced Tomatoes with Lime Juice y Cilantro, sin escurrir.\r\n'),(10,2,5,'2 cucharadas de aceite de canola Pure Wesson Canola Oil.'),(11,3,1,'2 cucharadas de aceite de canola Pure Wesson Canola Oil.\r\n'),(12,3,2,'3/4 de libra de espárragos frescos, picados en trozos de 2 pulgadas (alrededor de 2-1/2 tazas).\r\n'),(13,3,3,'2 cucharaditas de salsa de soya La Choy Soy Sauce.\r\n'),(14,3,4,'2 cucharadas de cacahuates asados secos picados.'),(22,5,1,'2 cucharadas de aceite.\r\n'),(23,5,2,'1/4 taza de cebolla picada.\r\n'),(24,5,3,'1 diente de ajo, finamente picado.\r\n'),(25,5,4,'250 gramos de jitomate, finamente picado.\r\n'),(26,5,5,'1/2 kilo de calabacitas, rebanadas.\r\n'),(27,5,6,'1 chile poblano, sin semillas y picado.\r\n'),(28,5,7,'Sal y pimienta, al gusto.'),(29,6,1,'2 cucharaditas de aceite de oliva.\r\n'),(30,6,2,'1 cebolla chica rallada.\r\n'),(31,6,3,'2 dientes de ajo machacados.\r\n'),(32,6,4,'2 zanahorias ralladas.\r\n'),(33,6,5,'3 calabacitas ralladas.\r\n'),(34,6,6,'1 taza de hojuelas de avena.\r\n'),(35,6,7,'1/4 de taza de queso amarillo rallado.\r\n'),(36,6,8,'1 huevo batido.\r\n'),(37,6,9,'1 cucharada de salsa de soya.\r\n'),(38,6,10,'1 3/4 tazas de harina.'),(39,7,1,'2 cucharaditas de aceite de oliva.\r\n'),(40,7,2,'1 cebolla chica rallada.\r\n'),(41,7,3,'2 dientes de ajo machacados.\r\n'),(42,7,4,'2 zanahorias ralladas.\r\n'),(43,7,5,'3 calabacitas ralladas.\r\n'),(44,7,6,'1 taza de hojuelas de avena.\r\n'),(45,7,7,'1/4 de taza de queso amarillo rallado.\r\n'),(46,7,8,'1 huevo batido.\r\n'),(47,7,9,'1 cucharada de salsa de soya.\r\n'),(48,7,10,'1 3/4 tazas de harina.'),(49,8,1,'3 calabacitas.\r\n'),(50,8,2,'3 cucharadas (45 gramos) de mantequilla a temperatura ambiente.\r\n'),(51,8,3,'2 dientes de ajo, picados.\r\n'),(52,8,4,'1 cucharada de perejil fresco, picado finamente.\r\n'),(53,8,5,'1/2 taza (40 gramos) de queso parmesano recién rallado.'),(54,9,1,'120 ml de aceite de oliva.\r\n'),(55,9,2,'2 calabacitas grandes picadas.\r\n'),(56,9,3,'2 dientes de ajo en rebanadas delgadas.\r\n'),(57,9,4,'½ cucharadita de sal.\r\n'),(58,9,5,'½ cucharadita de chile seco triturado.\r\n'),(59,9,6,'1 caja de pasta linguini.\r\n'),(60,9,7,'1 taza (250 ml) de leche entera.\r\n'),(61,9,8,'½ taza de perejil fresco.\r\n'),(62,9,9,'60 g de queso parmesano fresco, rallado.'),(63,10,1,'6 tomates verdes picados.\r\n'),(64,10,2,'5 jitomates maduros picados.\r\n'),(65,10,3,'½ taza de cebolla picada.\r\n'),(66,10,4,'2 chiles jalapeños picados.\r\n'),(67,10,5,'1 nopal fresco, limpio y picado.\r\n'),(68,10,6,'4 dientes de ajo picados.\r\n'),(69,10,7,'1 manojo de cilantro fresco y picado.\r\n'),(70,10,8,'6 cucharadas de jugo de limón fresco.\r\n'),(71,10,9,'sal y pimienta al gusto.');

/*Table structure for table `main` */

DROP TABLE IF EXISTS `main`;

CREATE TABLE `main` (
  `id` int(11) NOT NULL auto_increment,
  `slayer1` varchar(50) default NULL,
  `slayer2` varchar(50) default NULL,
  `slayer3` varchar(50) default NULL,
  `bienvenidos` text,
  `contenido` text,
  `acercade` text,
  `ungusto_img` varchar(50) default NULL,
  `unarte_img` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `main` */

insert  into `main`(`id`,`slayer1`,`slayer2`,`slayer3`,`bienvenidos`,`contenido`,`acercade`,`ungusto_img`,`unarte_img`) values (1,'Playstation-4-Wallpapers-HD.png','gurmet2.jpg','gurmet3.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Este block contiene informacion referente a el arte culinario el cual dara a conoser el proceso con el que se elavora los diversos platillos por grupos de comida estos varian desde vegetarianos asta grupos de postres, platillos fuertes y otros entremeses.','Recetario Maestro es un grupo de personas dedicadas a dar a conoser los platillos que se pueden consumir asi como su previa preparacion','Playstation-4-Wallpapers-HD - copia.png','restaurant.jpeg');

/*Table structure for table `pastas` */

DROP TABLE IF EXISTS `pastas`;

CREATE TABLE `pastas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(500) default NULL,
  `img` varchar(500) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pastas` */

insert  into `pastas`(`id`,`nombre`,`img`) values (1,'Sopa de Pavo y Tallarines','receta1.jpg'),(2,'Ensalada de Pasta como Antipasto','receta2.jpg'),(3,'Ravioles con Queso al Sartén','receta3.jpg'),(4,'Pasta con Pollo a la Parmesana a la Sartén','receta4.jpg'),(5,'Espaguetis con Salsa de Carne','receta5.jpg');

/*Table structure for table `postres` */

DROP TABLE IF EXISTS `postres`;

CREATE TABLE `postres` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(500) default NULL,
  `img` varchar(500) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `postres` */

insert  into `postres`(`id`,`nombre`,`img`) values (1,'Fresas en una Nube','receta1.jpg'),(2,'Pastel \'Shortcake\' de Fresa y Chocolate','receta2.jpg'),(3,'Sundae de Caramelo Dulce y Salado','receta3.jpg'),(4,'Sándwiches con Galleta Graham','receta4.jpg'),(5,'Pastel de Fresa Estilo Shortcake','receta5.jpg');

/*Table structure for table `proce_ingre_bebidas` */

DROP TABLE IF EXISTS `proce_ingre_bebidas`;

CREATE TABLE `proce_ingre_bebidas` (
  `id` int(11) NOT NULL auto_increment,
  `id_bebida` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `proceso` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `proce_ingre_bebidas` */

insert  into `proce_ingre_bebidas`(`id`,`id_bebida`,`num_pasos`,`proceso`) values (1,1,1,'Coloca el agua y el arroz en una licuadora. '),(2,1,2,'Muele bien hasta que el arroz empiece a pulverizarse, aproximadamente 1 minuto.'),(3,1,3,' Deja que la mezcla repose a temperatura ambiente durante por lo menos 3 horas.\r\n'),(4,1,4,'Filtra el agua y desecha el arroz. '),(5,1,5,'Agrega la leche, vainilla, canela y azúcar.'),(6,1,6,'Revuelve bien y refrigera hasta antes de servir.'),(7,2,1,'Mezcla todos los ingredientes en una licuadora y licua hasta lograr una consistencia suave.'),(8,3,1,'Coloca los cubos de hielo en la licuadora. '),(9,3,1,'Tapa y tritura.'),(10,3,2,' Agrega la sandía y muele durante 1 minuto, hasta obtener el punto frapé. '),(11,3,3,'Agrega la miel y licua durante 10 segundos más.'),(12,4,1,'Coloca el tequila, licor de naranja, jugo de limón, mango y hielo en una licuadora. \r\n'),(13,4,2,'Licua hasta que el hielo se haya triturado.\r\n'),(14,4,3,' Diluye la bebida a tu gusto con el néctar de mango.'),(15,5,1,'Coloca el vodka, cointreau, vermut, jugo de arándano y el hielo en una coctelera. \r\n'),(16,5,2,'Agita bien para mezclar y enfriar. \r\n'),(17,5,3,'Vierte en copas de martini y sirve.\r\n'),(18,5,4,' Adorna con rodajas de naranja o limón.');

/*Table structure for table `proce_ingre_carnes` */

DROP TABLE IF EXISTS `proce_ingre_carnes`;

CREATE TABLE `proce_ingre_carnes` (
  `id` int(11) NOT NULL auto_increment,
  `id_carne` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `proceso` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `proce_ingre_carnes` */

insert  into `proce_ingre_carnes`(`id`,`id_carne`,`num_pasos`,`proceso`) values (1,1,1,'Cocine la carne en una sartén grande a fuego medio-alto durante 7 minutos o hasta que la carne esté desmenuzada y ya no se vea rosada, revuelva ocasionalmente. Escurra. Añada la salsa para pastas y los tomates sin escurrir y revuelva para mezclar bien. Hierva.\r\n'),(2,1,2,'Añada los ravioles a la sartén y con una cuchara, esparza la salsa de carne sobre los ravioles hasta que queden bien cubiertos. Reduzca el fuego a medio, tape y cocine durante 15 minutos o hasta que los ravioles estén tiernos.\r\n'),(3,1,3,'Antes de servir, agregue el queso por encima.'),(4,2,1,'Rocíe con spray antiadherente la rejilla de la parrilla para exteriores y los utensilios. Precaliente la parrilla a fuego medio, según las instrucciones del fabricante.\r\n'),(5,2,2,'Rocíe una sartén grande con el spray antiadherente para parrilla y caliéntela a fuego medio-alto. Añada los champiñones y la cebolla. Cocine durante 8 minutos o hasta que estén tiernos, revolviendo ocasionalmente. Retire del fuego. Agregue la salsa para saltear y revuelva.\r\n'),(6,2,3,'Condimente los filetes con la sal sazonada y la pimienta. Cocine en la parrilla durante 10 minutos o hasta que los filetes estén medio cocidos (160°F). Cuando falten 5 minutos de cocción, voltee.\r\n'),(7,2,4,'Sirva los filetes en los platos. Con una cuchara, distribuya de manera uniforme la mezcla de champiñones sobre los filetes.'),(8,3,1,'1 de taza de salsa barbacoa restante, la carne, 1/4 de taza de arroz, la sal y la pimienta. Con esa mezcla forme 24 albóndigas de aproximadamente 1-1/4 de pulgada cada una. Colóquelas en una sartén grande rociada con spray antiadherente. Con una cuchara, distribuya la salsa sobre las albóndigas.\r\n'),(9,3,2,'Lleve todo a fuego medio-alto hasta que hierva. Revuelva con suavidad y tape. Reduzca el fuego a medio-bajo y cocine durante 16 a 18 minutos, o hasta que las albóndigas estén totalmente cocidas (160°F).\r\n'),(10,3,3,'Mientras tanto, prepare las 2 tazas de arroz restantes según las instrucciones del paquete, sin agregar sal ni azúcar. Agregue el pimiento. Sirva las albóndigas y la salsa sobre el arroz'),(11,4,1,'Cocine la carne de res en una sartén grande a fuego medio-alto \r\n'),(12,4,2,'durante unos 7 minutos o hasta que la carne esté desmenuzada y ya no se vea rosada. Revuelva ocasionalmente. Escurra. Añada 1 taza de los tomates sin escurrir y la mezcla para sazonar. Mezcle bien. Gradualmente, añada el agua y revuelva hasta mezclar bien. Haga hervir. \r\n'),(13,4,3,'Reduzca el fuego a bajo y cocine durante 10 minutos. Revuelva ocasionalmente.\r\n'),(14,4,4,'Con una cuchara, coloque la mezcla de manera uniforme en las tortillas. Cubra con la lechuga y el queso.\r\n'),(15,4,5,'Escurra los tomates de la lata restante. Con una cuchara, colóquelos sobre los tacos.'),(16,5,1,'Precaliente el horno a 375°F. Rocíe un recipiente para hornear de 8x8 pulgadas con el spray PAM.\r\n'),(17,5,2,'Mezcle la carne, la mitad de la salsa de tomate, el pan molido, la cebolla, el vinagre, la sal y la pimienta en un tazón grande. Presione la mitad de la mezcla con la carne en el fondo del recipiente para hornear.\r\n'),(18,5,3,' Coloque las papas, las zanahorias y los huevos en una capa sobre la capa de carne. Cubra con el resto de la mezcla de carne, presionando firmemente para sellarlo.\r\n'),(19,5,4,'Hornee por 40 minutos o hasta que el pastel de carne esté bien cocinado (160°F). Cubra con el resto de la salsa de tomate y hornee por 5 minutos más. Escurra los jugos.'),(20,6,1,'Rocíe una olla eléctrica de cocción lenta de 4 cuartos con el spray de cocina. Coloque todos los ingredientes en la olla de cocción lenta. Cúbrala, y cocínelo todo a BAJA temperatura durante 8 horas, a ALTA temperatura durante 4 horas, o hasta que la carne esté tierna.\r\n'),(21,6,2,'Retire la hoja de laurel. Saque la carne de la olla de cocción lenta; desmenúcela con la ayuda de 2 tenedores. Vuelva a meter la carne en la olla de cocción lenta; remuévala para que se mezcle bien con la salsa.'),(22,7,1,'Caliente 4 tazas de aceite en un sartén grande y profundo a fuego medio-alto (350°F) para freír las empanadas.\r\n'),(23,7,2,'Mientras tanto, caliente 2 cucharadas de aceite en otro sartén grande a fuego medio-alto. Añada la carne; cocínela por 2 o 3 minutos o hasta que se comience a dorar. Añada los tomates escurridos, el cebollín, las aceitunas, el pimentón rojo, el comino y la sal; remuévalo hasta que todo esté mezclado. Cocínelo todo por 2 minutos más o hasta que la carne deje de estar rosada, removiendo de vez en cuando.\r\n'),(24,7,3,'Pase un pincel con Egg Beaters por los bordes de los discos de masa de hojaldre. Coloque alrededor de 2 cucharadas de mezcla en el centro de cada disco de masa de hojaldre. Doble la masa sobre el relleno para cubrirlo; presione los bordes con un tenedor para que quede bien sellada la empanada.\r\n'),(25,7,4,'Fría las empanadas en tandas, por 3 o 4 minutos o hasta que estén bien doradas y calientes. Escúrralas en un plato cubierto con papel de cocina; sírvalas inmediatamente.');

/*Table structure for table `proce_ingre_pastas` */

DROP TABLE IF EXISTS `proce_ingre_pastas`;

CREATE TABLE `proce_ingre_pastas` (
  `id` int(11) NOT NULL auto_increment,
  `id_pasta` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `proceso` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `proce_ingre_pastas` */

insert  into `proce_ingre_pastas`(`id`,`id_pasta`,`num_pasos`,`proceso`) values (1,1,1,'Derrita el Parkay en una olla grande a fuego medio-alto. Añada los vegetales congelados. Cocine de 3 a 5 minutos o hasta que las cebollas se ablanden, removiendo de vez en cuando.\r\n'),(2,1,2,'Añada el pavo y cocine durante 2 minutos o hasta que se caliente. Añada los tallarines, el caldo, la pimienta y el perejil seco a la olla. Remueva para que todo se mezcle bien. Hierva, baje el fuego y cocine de 7 a 10 minutos o hasta que los tallarines estén listos.'),(3,2,1,'Añada todos los ingredientes en un tazón grande y remueva hasta que estén bien mezclados.\r\n'),(4,2,2,'Mientras tanto, coloque en un recipiente grande los tomates escurridos y el aderezo, y mézclelos. Agregue la pasta y los demás ingredientes y revuelva hasta mezclar bien.\r\n'),(5,2,3,'Mientras tanto,Sirva inmediatamente o lleve al refrigerador hasta que esté frío.'),(6,3,1,'Rocíe una sartén antiadherente de 12 pulgadas con spray antiadherente. Agregue los ravioles y el agua. Tape y cocine durante 3 a 5 minutos a fuego medio-alto o hasta que la pasta se descongele totalmente. Revuelva 2 o 3 veces para separar los ravioles.\r\n'),(7,3,2,'Añada la salsa para pastas y la espinaca. Cocine a fuego medio hasta que burbujee. Tape la sartén, reduzca el fuego a bajo y cocine durante 5 a 7 minutos o hasta que la pasta esté tierna. Cubra con queso. Tape, retire del fuego y deje reposar hasta que el queso se derrita.'),(8,4,1,'Rocíe un sartén grande de 2-1/2 pulgadas de profundidad con el spray de cocina. Añada la pasta y el agua. Hierva. Baje el fuego y cocine durante 15 minutos o hasta que la pasta esté tierna y el agua se haya absorbido, removiendo de vez en cuando.\r\n'),(9,4,2,'Mientras tanto, cocine en el microondas el pollo Banquet según las instrucciones del paquete. Corte el pollo cocinado en tiras de 1/2 pulgada de ancho.\r\n'),(10,4,3,'Añada los tomates sin escurrir y el pollo a la pasta cocinada en el sartén. Remueva ligeramente para que todo se mezcle. Espolvoree el queso. Tape y deje reposar durante 5 minutos hasta que el queso se haya derretido.'),(11,5,1,'Cocine los espaguetis según las instrucciones del paquete.\r\n'),(12,5,2,'Mientras tanto, caliente el aceite en un sartén grande a fuego medio-alto. Añada la cebolla y el ajo. Cocine durante 5 minutos o hasta que la cebolla se ablande, removiendo frecuentemente. Añada la carne y cocine durante 7 minutos o hasta que se haya desmenuzado y deje de estar rosada, removiendo de vez en cuando. Escurra.\r\n'),(13,5,3,'Añada la salsa para pasta al sartén y remuévalo todo. Tape y cocine a fuego medio-bajo durante 10 minutos o hasta que esté caliente. Escurra los espaguetis. Sirva la salsa de carne con los espaguetis. Espolvoree queso por encima si lo desea.');

/*Table structure for table `proce_ingre_postres` */

DROP TABLE IF EXISTS `proce_ingre_postres`;

CREATE TABLE `proce_ingre_postres` (
  `id` int(11) NOT NULL auto_increment,
  `id_postre` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `proceso` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `proce_ingre_postres` */

insert  into `proce_ingre_postres`(`id`,`id_postre`,`num_pasos`,`proceso`) values (1,1,1,'Coloque las galletas de vainilla (wafer cookies) en un plato de servir. Cubra cada galleta con media porción (1 cucharada) de Reddi-wip. Después cubra cada galleta con un tercio de fresa. Sirva inmediatamente.'),(2,2,1,'Mezcle la galleta graham machacada y la cucharada de pretzels en un plato para servir. Cubra con una porción (2 cucharadas) de Reddi-wip, las fresas y otra porción de Reddi-wip. Sírvalo inmediatamente.'),(3,3,1,'Deje el yogur helado a temperatura ambiente durante 5 minutos o hasta que esté ligeramente descongelado.\r\n'),(4,3,2,'Coloque con ayuda de una cuchara la mitad del yogur helado en un tazón pequeño de postre. Espolvoree la mitad de los pretzels machacados.\r\n'),(5,3,3,'Cubra con el resto del yogur y los pretzels machacados.'),(6,4,1,'Quite la cubierta al envase de yogur. Pase un cuchillo por el borde del envase y saque el yogur helado en una pieza. Córtelo por la mitad de forma vertical. Coloque cada mitad de yogur helado entre 2 cuadraditos de galleta graham. Presione con cuidado para hacer los 2 sándwiches.\r\n'),(7,4,2,'Sirva inmediatamente o colóquelos en el congelador hasta que lo vaya a comer.'),(8,5,1,'Quite la cubierta al envase de yogur. Pase un cuchillo por el borde del envase y saque el yogur helado en una pieza. Córtelo por la mitad de forma vertical.\r\n'),(9,5,2,'Cubra cada vaso de postre con una mitad e yogur y adorne con dos mitades de fresa.');

/*Table structure for table `proce_ingre_vegetales` */

DROP TABLE IF EXISTS `proce_ingre_vegetales`;

CREATE TABLE `proce_ingre_vegetales` (
  `id` int(11) NOT NULL auto_increment,
  `id_vegetal` int(11) default NULL,
  `num_pasos` int(11) default NULL,
  `proceso` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `proce_ingre_vegetales` */

insert  into `proce_ingre_vegetales`(`id`,`id_vegetal`,`num_pasos`,`proceso`) values (1,1,1,'*Cocine la pasta según las instrucciones del paquete sin añadir sal.\r\n'),(2,1,2,'*Mientras tanto, caliente el aceite en un sartén grande a fuego medio-alto. Añada los calabacines. Cocínelos 5 minutos o hasta que estén tiernos, removiendo de vez en cuando. Añada los frijoles, la salsa Alfredo y la sal de ajo al sartén. Caliente hasta que burbujee.\r\n'),(3,1,3,'*Añada la pasta cocinada al sartén. Remueva para que todo se mezcle bien. Añada los tomates escurridos y remueva para que se mezcle con el resto de los ingredientes. Cubra con el queso. Baje el fuego, tape y cocine de 2 a 3 minutos o hasta que el queso se haya derretido.'),(4,2,1,'*Añada todos los ingredientes en un tazón grande y remueva hasta que estén bien mezclados.'),(5,3,1,'Caliente el aceite en un sartén grande antiadherente a fuego medio-alto.\r\n'),(6,3,2,' Añada los espárragos. Cocínelos, removiendo, por 4 minutos o hasta que estén tiernos.\r\n'),(7,3,3,'Añada los cacahuates.'),(8,3,4,' Saque el sartén del fuego. Añada la salsa de soya y remueva para que cubra bien a los espárragos. \r\n'),(13,5,1,'*Preparación: 15min › Cocción: 25min › Listo en:40min\r\n'),(14,5,2,'*Coloca los granos de elote en una cacerola mediana, cúbrelos con agua y deja que suelten el hervor a fuego alto. Tapa, reduce el fuego a bajo y cocina durante 5 minutos o hasta que se hayan ablandado. Escurre bien.\r\n'),(15,5,3,'*Mientras, calienta el aceite en un sartén grande a fuego medio, y sofríe la cebolla y el ajo hasta que se vean transparentes. Agrega el jitomate y cocina hasta que cambie de color. Incorpora las calabacitas, chile poblano y granos de elote cocidos; sazona con sal y pimienta. Cocina a fuego bajo, moviendo de vez en cuando, hasta que las calabacitas estén suaves, pero aún firmes, aproximadamente 10 minutos.');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(50) default NULL,
  `contrasena` varchar(50) default NULL,
  `nombre` varchar(50) default NULL,
  `correo` varchar(50) default NULL,
  `estatus` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`usuario`,`contrasena`,`nombre`,`correo`,`estatus`) values (1,'raul','123','raul','www@www.com',1),(2,'luis','123','luison','www@algo.com',0),(3,'raul','123','jose','lalal@lala.lalla',0),(4,'raul','202cb962ac59075b964b07152d234b70','jose','lalal@lala.lalla',0),(5,'raul','202cb962ac59075b964b07152d234b70','jose','lalal@lala.lalla',0),(6,'raul','202cb962ac59075b964b07152d234b70','jose','lalal@lala.lalla',0),(7,'raul','202cb962ac59075b964b07152d234b70','jose','lalal@lala.lalla',0),(8,'raul','202cb962ac59075b964b07152d234b70','222','2222',0),(9,'raul','202cb962ac59075b964b07152d234b70','222','2222',0),(10,'raul','202cb962ac59075b964b07152d234b70','yyyy','yy',0),(11,'raul','202cb962ac59075b964b07152d234b70','jose','44',0),(12,'jose','90e528618534d005b1a7e7b7a367813f','jose','lalal@lala.lalla',0),(13,'loko','202cb962ac59075b964b07152d234b70','loko','fabian@loko.com',0),(14,'Rulo_rules99','202cb962ac59075b964b07152d234b70','Raul','2012030266@upsin.edu.mx',0),(15,'loko','950f0129ab240dd16c1d31e377b8f3a7','33','2222@lko.ccc',1),(16,'lquintero019','81dc9bdb52d04dc20036dbd8313ed055','Luis Jesus Quintero Lopez','lquintero019@gmail.com',1);

/*Table structure for table `vegetales` */

DROP TABLE IF EXISTS `vegetales`;

CREATE TABLE `vegetales` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(500) default NULL,
  `img` varchar(500) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `vegetales` */

insert  into `vegetales`(`id`,`nombre`,`img`) values (1,'Lasaña Vegetariana al Sartén','receta1.jpg'),(2,'Ensalada de Maíz y Frijoles Negros','receta2.jpg'),(3,'Salteado de Espárragos con Cacahuates','receta3.jpg'),(5,'Calabacitas con elote','receta5.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
