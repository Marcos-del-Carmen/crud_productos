CREATE DATABASE db_tienda;

CREATE TABLE productos(
	ClaveProducto 		INT 			NOT NULL AUTO_INCREMENT,
	Nombre 				VARCHAR(255) 	NOT NULL,
    Cantidad 			INT(5) 			NOT NULL, 
    Precio 				FLOAT 			NOT NULL, 
    Descripcion 		VARCHAR(255) 	NOT NULL,
    ClaveCategoria	 	INT				NOT NULL,
    imagen              VARCHAR(255)    NOT NULL,
    PRIMARY KEY(ClaveProducto),
    FOREIGN KEY(ClaveCategoria) REFERENCES categorias(ClaveCategoria)
)ENGINE=InnoDB;

CREATE TABLE categorias(
	ClaveCategoria	 	INT 		NOT NULL AUTO_INCREMENT, 
	Nombre	 			VARCHAR(50) NOT NULL,
    PRIMARY KEY(ClaveCategoria)
)ENGINE=InnoDB;

INSERT INTO categorias
(Nombre) 
VALUES 
('Hamburguesas'),
('Hot Dogs'),
('Frappes'),
('Snacks'),
('Chamoyadas');

INSERT INTO productos 
(Nombre, 			    Cantidad, 	Precio, Descripcion, 						ClaveCategoria, Imagen) 
VALUES 
('Hamburguesa Clásica',	10, 		50.00, 	'Hamburguesa con queso, lechuga y tomate.', 	11, ''),
('Hamburguesa Hawaiana',10, 		55.00, 	'Hamburguesa con piña y salsa especial.', 		11, ''),
('Hot Dog Clásico', 	10, 		30.00, 	'Hot Dog con mostaza y ketchup.', 	            12, ''),
('Hot Dog de Tocino', 	10, 		35.00, 	'Hot Dog envuelto en tocino y salsa BBQ.', 		12, ''),
('Frappe de Café', 	    10, 		30.00, 	'Frappe con sabor a café.', 			        13, ''),
('Frapuccino', 			10,			35.00, 	'Frappe con sabor a frapuccino.', 			    13, ''),
('Papas a la Francesa', 10, 		25.00, 	'Papas fritas crujientes.', 			        14, ''),
('Aros de Cebolla', 	10, 		30.00, 	'Aros de cebolla empanizados.',                 14, ''),
('Chamoyada de Mango', 	10, 		35.00, 	'Bebida de chamoy con sabor a mango.', 			15, ''),
('Chamoyada de Fresa',  10, 		35.00, 	'Bebida de chamoy con sabor a fresa.',          15, '');

