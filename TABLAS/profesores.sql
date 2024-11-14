DROP TABLE profesores;
CREATE TABLE profesores(

    dni VARCHAR(11) NOT NULL
    ,ciclo_impartido VARCHAR(100) NOT NULL
    ,mod_impartido

    FOREIGN KEY (dni) REFERENCES personas(dni)
);

INSERT INTO alumnos(dni, ciclo_cursando)VALUES('00000000A','Desarrollo de aplicaciones web');