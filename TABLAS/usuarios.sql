DROP TABLE alumnos;
CREATE TABLE alumnos(

     id INT(11) AUTO_INCREMENT PRIMARY KEY
    ,nombre VARCHAR(50) NOT NULL
    ,email VARCHAR(100) NOT NULL UNIQUE
    ,edad INT(3)
);

INSERT INTO usuarios(nombre, email, edad) VALUES('Milo', 'milovocker.clase@gmail.com', '20');
INSERT INTO usuarios(nombre, email, edad) VALUES('Aleix', 'aleix@gmail.com', '20');
INSERT INTO usuarios(nombre, email, edad) VALUES('Javi', 'javi@gmail.com', '19');
INSERT INTO usuarios(nombre, email, edad) VALUES('Pepe', 'pepe@gmail.com', '14');
INSERT INTO usuarios(nombre, email, edad) VALUES('Lucas', 'lucas@gmail.com', '16');
INSERT INTO usuarios(nombre, email, edad) VALUES('Pablo', 'pablo@gmail.com', '36');
INSERT INTO usuarios(nombre, email, edad) VALUES('Manuel', 'manuel@gmail.com', '64');
INSERT INTO usuarios(nombre, email, edad) VALUES('Marcos', 'marcos1@gmail.com', '32');
INSERT INTO usuarios(nombre, email, edad) VALUES('Marcos', 'marcos@gmail.com', '23');
INSERT INTO usuarios(nombre, email, edad) VALUES('Iván', 'ivan@gmail.com', '76');
INSERT INTO usuarios(nombre, email, edad) VALUES('Leonardo', 'leonardo@gmail.com', '12');
INSERT INTO usuarios(nombre, email, edad) VALUES('Alejandro', 'alejandro@gmail.com', '6');
INSERT INTO usuarios(nombre, email, edad) VALUES('Manuel', 'manu3@gmail.com', '12');
INSERT INTO usuarios(nombre, email, edad) VALUES('Silvia', 'silviaa@gmail.com', '19');
