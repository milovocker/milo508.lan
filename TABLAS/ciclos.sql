DROP TABLE ciclos;
CREATE TABLE ciclos(

    ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY
    ,nombre_ciclo VARCHAR(100) NOT NULL
    ,siglas_ciclo VARCHAR(100) NOT NULL
    ,curso INT(1) NOT NULL 
);

INSERT INTO ciclos(nombre_ciclo, siglas_ciclo)VALUES('Desarrollo de aplicaciones web','DAW', 1);