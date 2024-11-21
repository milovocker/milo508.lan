<?php



    class Ciclo extends Tabla
    {
        const TABLA = 'ciclos';

        const CICLOS = ['DAW1', 'DAW2', 'Jardineria'];
        function __construct()
        {
            parent::__construct(self::TABLA);

        }



        function existeCiclo($nombre,$descripcion,$autor,$editorial,$id='')
        {
            $opt = [];
            
            $opt['select']['nombre']     = '';
            $opt['where']['nombre']      = $nombre;
            $opt['where']['siglas']      = $siglas;
            $opt['where']['curso']       = $curso;
            $opt['where']['letra']       = $letra;

            if(!empty($id))
                $opt['notwhere']['id'] = $id;
      
            $resultado = $this->seleccionar($opt);

            return $resultado->num_rows;
            
        }

        function mostrarCiclo()
        {
            $ciclos = [];

            $sql = 'SELECT siglas, nombre, curso FROM ciclos';

            // Ejecutamos la consulta
            $resultado = BBDD::query($sql);

            // Recorremos el resultado de la consulta
            foreach($resultado as $fila) {
                $ciclo_unitario = [
                    'siglas' => $fila['siglas'],  // Guardamos las siglas
                    'nombre' => $fila['nombre'],  // Guardamos el nombre
                    'curso' => $fila['curso']   // Guardamos el nombre
                ];
                
                // Añadimos el ciclo unitario al array de ciclos
                array_push($ciclos, $ciclo_unitario);
            }

            // Retornamos el array con todos los ciclos
            return $ciclos;
        }

    }
