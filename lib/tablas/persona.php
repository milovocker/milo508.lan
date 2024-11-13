<?php



    class Persona extends Tabla
    {
        const TABLA = 'personas';

        const GENEROS = ['H' => 'Hombre', 'M' => 'Mujer'];
        const OCUPACIONES = ['A' => 'Alumno', 'P' => 'Profesor'];

        function __construct()
        {
            parent::__construct(self::TABLA);

        }



        function existePersona($nombre,$email,$edad,$genero,$ocupacion,$id='')
        {
            $opt = [];
            
            $opt['select']['nombre'] = '';
            $opt['where']['nombre']  = $dni;
            $opt['where']['nombre']  = $nombre;
            $opt['where']['email']   = $email;
            $opt['where']['edad']    = $edad;
            $opt['where']['edad']    = $genero;
            $opt['where']['edad']    = $ocupacion;

            if(!empty($id))
                $opt['notwhere']['id'] = $id;
      
        
        
            $resultado = $this->seleccionar($opt);

            return $resultado->num_rows;
            
        }
    }