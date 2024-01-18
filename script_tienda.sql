CREATE DATABASE db_tienda;

CREATE TABLE db_tienda.categorias(
	ClaveCategoria	 	INT 		NOT NULL AUTO_INCREMENT, 
	Nombre	 			VARCHAR(50) NOT NULL,
    PRIMARY KEY(ClaveCategoria)
)ENGINE=InnoDB;

CREATE TABLE db_tienda.productos(
	ClaveProducto 		INT 			NOT NULL AUTO_INCREMENT,
	Nombre 				VARCHAR(255) 	NOT NULL,
    Cantidad 			INT(5) 			NOT NULL, 
    Precio 				FLOAT 			NOT NULL, 
    Descripcion 		VARCHAR(255) 	NOT NULL,
    ClaveCategoria	 	INT				NOT NULL,
    PRIMARY KEY(ClaveProducto),
    FOREIGN KEY(ClaveCategoria) REFERENCES db_tienda.categorias(ClaveCategoria)
)ENGINE=InnoDB;

INSERT INTO db_tienda.categorias
(Nombre) 
VALUES 
('Cereales'),
('Lácteos'),
('Snacks'),
('Bebidas'),
('Cuidado Personal');

INSERT INTO db_tienda.productos 
(Nombre, 			Cantidad, 	Precio, Descripcion, 						ClaveCategoria) 
VALUES 
('Avena', 			50, 		20, 	'Caja de avena instantánea', 		1),
('Leche', 			100, 		22, 	'Botella de leche entera', 			2),
('Papas Fritas', 	80, 		95, 	'Bolsa de papas fritas clásicas', 	3),
('Refresco', 		120, 		30, 	'Lata de refresco cola', 			4),
('Jabón de Baño', 	40, 		15.9, 	'Barra de jabón de baño', 			5),
('Arroz', 			60,			35, 	'Bolsa de arroz de 1 kg', 			1),
('Yogur', 			80, 		18, 	'Envase de yogur natural', 			2),
('Galletas', 		150, 		20, 	'Paquete de galletas de chocolate', 3),
('Agua Mineral', 	200, 		15, 	'Botella de agua mineral', 			4),
('Papel Higiénico', 30, 		35, 	'Paquete de papel higiénico doble', 5),
('Frijoles en lata',40, 		25, 	'Lata de frijoles cocidos', 		1),
('Queso', 			50, 		40, 	'Cuña de queso cheddar', 			2),
('Cacahuetes', 		120, 		10, 	'Bolsa de cacahuetes salados', 		3),
('Té', 				90, 		105, 	'Caja de bolsitas de té verde', 	4),
('Shampoo', 		60, 		65, 	'Botella de shampoo nutritivo', 	5);

DROP TABLE db_tienda.productos;
DROP TABLE db_tienda.categoria;

