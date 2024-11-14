DROP TABLE alumnos;
CREATE TABLE alumnos(

    dni VARCHAR(11) NOT NULL
    ,ciclo_cursando VARCHAR(100) NOT NULL

    FOREIGN KEY (dni) REFERENCES personas(dni)
);

INSERT INTO alumnos(dni, ciclo_cursando)VALUES('00000000A','Desarrollo de aplicaciones web');
