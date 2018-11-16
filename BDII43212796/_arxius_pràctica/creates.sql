CREATE DATABASE BDII43212796;

CREATE 	TABLE 	Restaurant(
id_restaurant 	INT 		AUTO_INCREMENT,
adreca			CHAR(50)	NOT NULL,
PRIMARY KEY(id_restaurant)
);

CREATE	TABLE	Treballador(
id_treballador 	INT 		AUTO_INCREMENT,
nomUsuari		CHAR(50),
contrasenya		CHAR(50)	NOT NULL,
id_restaurant	INT			NOT NULL,
PRIMARY KEY(id_treballador),
FOREIGN KEY(id_restaurant)	REFERENCES Restaurant(id_restaurant)
);

CREATE	TABLE	Comanda(
estat			CHAR(50)	NOT NULL,
targeta			CHAR(50),
id_comanda		INT 		AUTO_INCREMENT,
id_restaurant	INT			NOT NULL,
PRIMARY KEY(id_comanda),
FOREIGN KEY(id_restaurant)	REFERENCES Restaurant(id_restaurant)
);

CREATE	TABLE 	Element(
nomElem			CHAR(50)	NOT NULL,
id_element		INT 		AUTO_INCREMENT,
PRIMARY KEY(id_element)
);

CREATE	TABLE	Quantitat(
numQuant		INT 		NOT NULL,
id_comanda 		INT,
id_element 		INT,
id_quantitat 	INT 		AUTO_INCREMENT,
PRIMARY KEY(id_quantitat), 
FOREIGN KEY(id_comanda) 	REFERENCES Comanda(id_comanda),
FOREIGN KEY(id_element) 	REFERENCES Element(id_element)
);

CREATE	TABLE	Menu(
id_menu 		INT,
preuMenu		INT 		NOT NULL,
PRIMARY KEY(id_menu),
FOREIGN KEY(id_menu)		REFERENCES Element(id_element)
);

CREATE	TABLE	Categoria(
nomCat 			CHAR(50)	NOT NULL,
fotoCat			CHAR(100),
id_categoria 	INT 		AUTO_INCREMENT,
PRIMARY KEY(id_categoria)
); 

CREATE 	TABLE 	Article(
preuArt			INT 		NOT NULL,
fotoArt 		CHAR(200),
kcal 			INT,
g				INT,
p 				INT,
id_article 		INT,
id_categoria 	INT,
PRIMARY KEY(id_article),
FOREIGN KEY(id_article) 	REFERENCES Element(id_element),
FOREIGN KEY(id_categoria) 	REFERENCES Categoria(id_categoria)
);

CREATE	TABLE	Estoc(
numEst			INT 		NOT NULL,
id_restaurant	INT,
id_element 		INT,
id_estoc 		INT 		AUTO_INCREMENT,
PRIMARY KEY(id_estoc),
FOREIGN KEY(id_restaurant) 	REFERENCES Restaurant(id_restaurant),
FOREIGN KEY(id_element) 	REFERENCES Article(id_article)
);

CREATE	TABLE	R_MENU_ARTICLE(
id_elementM 	INT,
id_elementA 	INT,
PRIMARY KEY(id_elementM,id_elementA),
FOREIGN KEY(id_elementM) 	REFERENCES Menu(id_menu),
FOREIGN KEY(id_elementA) 	REFERENCES Article(id_article)
);

CREATE TABLE	HISTORIC(
id_historic		INT 		AUTO_INCREMENT,
data 			DATE 		NOT NULL,
PRIMARY KEY(id_historic)
);