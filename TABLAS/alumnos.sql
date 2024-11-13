DROP TABLE alumnos;
CREATE TABLE alumnos(

    DNI VARCHAR(11) NOT NULL
    ,ciclo_cursando VARCHAR(100) NOT NULL

    FOREIGN KEY (DNI) REFERENCES personas(DNI)
);

INSERT INTO alumnos(DNI, ciclo_cursando)VALUES('00000000A','Desarrollo de aplicaciones web');
