DROP TABLE alumnos;
CREATE TABLE alumnos(

    id_alum INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_persona INT NOT NULL

    ,FOREIGN KEY (id_persona) REFERENCES personas(id_persona)
);

