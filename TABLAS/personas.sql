DROP TABLE personas;
CREATE TABLE personas(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,dni VARCHAR(11) 
    ,nombre VARCHAR(50) NOT NULL
    ,email VARCHAR(100) NOT NULL UNIQUE
    ,edad INT(3) NOT NULL
    ,genero VARCHAR(1) NOT NULL
    ,ocupacion VARCHAR(1) NOT NULL

);

INSERT INTO personas(dni, nombre, email, edad, genero, ocupacion) VALUES
('00000001B', 'Luna', 'luna.sol@gmail.com', 22, 'M', 'A'),
('00000002C', 'Alex', 'alex.river@gmail.com', 30, 'H', 'P'),
('00000003D', 'Camila', 'camila.estrella@gmail.com', 27, 'M', 'P'),
('00000004E', 'Javier', 'javier.martinez@gmail.com', 25, 'H', 'P'),
('00000005F', 'Sara', 'sara.luz@gmail.com', 23, 'M', 'A'),
('00000006G', 'Leo', 'leo.mar@gmail.com', 28, 'H', 'A'),
('00000007H', 'Ana', 'ana.roca@gmail.com', 24, 'M', 'A'),
('00000008I', 'Tomás', 'tomas.cielo@gmail.com', 45, 'H', 'P'),
('00000009J', 'Valeria', 'valeria.flor@gmail.com', 59, 'M', 'P'),
('00000010K', 'Pablo', 'pablo.fuego@gmail.com', 26, 'H', 'P'),
('00000011L', 'Carla', 'carla.viento@gmail.com', 33, 'M', 'A'),
('00000012M', 'Mateo', 'mateo.rios@gmail.com', 31, 'H', 'P'),
('00000013N', 'Laura', 'laura.nieves@gmail.com', 20, 'M', 'A'),
('00000014O', 'Diana', 'diana.marina@gmail.com', 32, 'M', 'A'),
('00000015P', 'Nico', 'nico.solano@gmail.com', 21, 'H', 'A'),
('00000016Q', 'Elena', 'elena.aurora@gmail.com', 27, 'M', 'A'),
('00000017R', 'Santiago', 'santiago.cerro@gmail.com', 34, 'H', 'A'),
('00000018S', 'Lucia', 'lucia.brisa@gmail.com', 29, 'M', 'A'),
('00000019T', 'Hugo', 'hugo.montes@gmail.com', 23, 'H', 'A'),
('00000020U', 'Natalia', 'natalia.estela@gmail.com', 28, 'M', 'A');
