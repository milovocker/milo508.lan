DROP TABLE usuarios;
CREATE TABLE usuarios(

     id INT(11) AUTO_INCREMENT PRIMARY KEY
    ,nombre VARCHAR(50) NOT NULL
    ,email VARCHAR(100) NOT NULL UNIQUE
    ,edad INT(3)
);

INSERT INTO usuarios(nombre, email, edad) VALUES('Milo', 'milovocker.clase@gmail.com', '20');
INSERT INTO usuarios(nombre, email, edad) VALUES('Aleix', 'aleix@gmail.com', '20');
INSERT INTO usuarios(nombre, email, edad) VALUES('Javi', 'javi@gmail.com', '19');
INSERT INTO usuarios(nombre, email, edad) VALUES('Pepe', '@gmail.com', '14');
INSERT INTO usuarios(nombre, email, edad) VALUES('Lucas', '@gmail.com', '16');
INSERT INTO usuarios(nombre, email, edad) VALUES('Pablo', '@gmail.com', '36');
INSERT INTO usuarios(nombre, email, edad) VALUES('Manuel', '@gmail.com', '64');
INSERT INTO usuarios(nombre, email, edad) VALUES('Marcos', '@gmail.com', '32');
INSERT INTO usuarios(nombre, email, edad) VALUES('Marcos', '@gmail.com', '23');
INSERT INTO usuarios(nombre, email, edad) VALUES('Iván', '@gmail.com', '76');
INSERT INTO usuarios(nombre, email, edad) VALUES('Leonardo', '@gmail.com', '12');
INSERT INTO usuarios(nombre, email, edad) VALUES('Alejandro', '@gmail.com', '6');
INSERT INTO usuarios(nombre, email, edad) VALUES('Manuel', '@gmail.com', '12');
INSERT INTO usuarios(nombre, email, edad) VALUES('Silvia', '@gmail.com', '19');
