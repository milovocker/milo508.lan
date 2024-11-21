<?php



    class Persona extends Tabla
    {
        const TABLA = 'personas';

        function __construct()
        {
            parent::__construct(self::TABLA);
        }

        function existePersona($nif,$nombre,$email,$apellido_1,$apellido_2,$id='')
        {
            $opt = [];
            
            $opt['select']['nombre']   = '';
            $opt['where']['nif']       = $nif;
            $opt['where']['nombre']    = $nombre;
            $opt['where']['apellido1'] = $apellido_1;
            $opt['where']['apellido2'] = $apellido_2;

            if(!empty($id))
                $opt['notwhere']['id'] = $id;
      
        
            $resultado = $this->seleccionar($opt);

            return $resultado->num_rows;
            
        }
    }