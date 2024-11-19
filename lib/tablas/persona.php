<?php



    class Persona extends Tabla
    {
        const TABLA = 'personas';

        function __construct()
        {
            parent::__construct(self::TABLA);
        }

        function existePersona($dni,$nombre,$email,$apellido1,$apellido2,$id='')
        {
            $opt = [];
            
            $opt['select']['nombre']   = '';
            $opt['where']['dni']       = $dni;
            $opt['where']['nombre']    = $nombre;
            $opt['where']['email']     = $email;
            $opt['where']['apellido1'] = $apellido1;
            $opt['where']['apellido2'] = $apellido2;

            if(!empty($id))
                $opt['notwhere']['id'] = $id;
      
        
            $resultado = $this->seleccionar($opt);

            return $resultado->num_rows;
            
        }
    }