<?php



    class Horario extends Tabla
    {
        const TABLA = 'horario';


        function __construct()
        {
            parent::__construct(self::TABLA);

        }


        //Crear todos los métodos igual que en libro
        function existeHorario($id_modulo,$dia,$hora_desde,$hora_hasta,$id_horario='')
        {
            $opt = [];
            
            $opt['select']['nombre']     = '';
            $opt['where']['id_modulo']   = $id_modulo;
            $opt['where']['dia']         = $dia;
            $opt['where']['hora_desde']  = $hora_desde;
            $opt['where']['hora_hasta']  = $hora_hasta;

            if(!empty($id))
                $opt['notwhere']['id'] = $id;
      
        
        
            $resultado = $this->seleccionar($opt);

            return $resultado->num_rows;
            
        }

    }