DROP TABLE profesores;
CREATE TABLE profesores(

    DNI VARCHAR(11) NOT NULL
    ,ciclo_impartido VARCHAR(100) NOT NULL
    ,mod_impartido

    FOREIGN KEY (DNI) REFERENCES personas(DNI)
);

INSERT INTO alumnos(DNI, ciclo_cursando)VALUES('00000000A','Desarrollo de aplicaciones web');