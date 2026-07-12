CREATE DATABASE IF NOT EXISTS tareasdb;
USE tareasdb;

DROP TABLE IF EXISTS tareas;

CREATE TABLE tareas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  tipo VARCHAR(50),
  valor INT,
  duracion INT,
  date_start DATE,
  date_end DATE,
  completed TINYINT DEFAULT 0
);

INSERT INTO tareas (title, tipo, valor, duracion, date_start, date_end, completed) VALUES
('1.1. Herramientas del IDE (Entorno de desarrollo integrado)', 'Foro', 6, 1, '2026-06-05', '2026-06-06', 0),
('1.2. Obteniendo elementos HTML para su manipulación', 'Buzón', 6, 2, '2026-06-07', '2026-06-09', 0),
('1.3. Creación de elementos HTML de forma dinámica', 'Buzón', 6, 2, '2026-06-10', '2026-06-12', 0),
('Integradora 1. Agregación de eventos de forma dinámica', 'Buzón', 10, 2, '2026-06-13', '2026-06-15', 0),
('2.1. Comunicación asíncrona', 'Buzón', 6, 2, '2026-06-16', '2026-06-18', 0),
('2.2. Objetos y JSON', 'Buzón', 6, 2, '2026-06-19', '2026-06-21', 0),
('2.3. Funciones asíncronas', 'Buzón', 6, 2, '2026-06-22', '2026-06-24', 0),
('Integradora 2. AJAX y Fetch API', 'Buzón', 10, 2, '2026-06-25', '2026-06-27', 0),
('3.1. La relevancia del uso de librerías y frameworks en Frontend', 'Foro', 6, 1, '2026-06-28', '2026-06-29', 0),
('3.2. Manipulación del DOM y eventos', 'Buzón', 6, 2, '2026-06-30', '2026-07-02', 0),
('3.3. AJAX', 'Buzón', 6, 2, '2026-07-03', '2026-07-05', 0),
('Integradora 3. Animaciones y efectos', 'Buzón', 10, 2, '2026-07-06', '2026-07-08', 0),
('Producto integrador. Aplicación Web con JavaScript', 'Buzón', 16, 3, '2026-07-09', '2026-07-12', 0);
