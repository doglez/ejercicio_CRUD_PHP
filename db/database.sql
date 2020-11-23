-- Creacion de la base de datos db_crud
create database if not exists db_crud default character set utf8 default collate utf8_general_ci;

use db_crud;

-- Creacion de tabla libros, PK es Codigo
CREATE TABLE IF NOT EXISTS libros (
    codigo INT AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    disponibilidad TINYINT NOT NULL,
    PRIMARY KEY (codigo)
)  ENGINE=INNODB;

DESC libros;

-- Carga de informacion dentro de la tabla libros
insert into libros 
(titulo,autor,disponibilidad)
values
('La Guerra y la Paz', 'León Tolstoi', TRUE),
('Las Aventuras de Huckleberry Finn', 'Mark Twain', FALSE),
('Hamlet', 'William Shakespeare', TRUE),
('En busca del tiempo perdido', 'Marcel Proust', FALSE),
('Don Quijote de la Mancha', 'Miguel de Cervantes', TRUE);
