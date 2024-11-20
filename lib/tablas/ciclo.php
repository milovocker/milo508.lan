<?php



    class Ciclo extends Tabla
    {
        const TABLA = 'ciclos';

        const CICLOS = ['DAW1', "DAW2"];

        function __construct()
        {
            parent::__construct(self::TABLA);

        }



        function existeCiclo($nombre,$descripcion,$autor,$editorial,$id='')
        {
            $opt = [];
            
            $opt['select']['nombre']     = '';
            $opt['where']['nombre']      = $nombre;
            $opt['where']['siglas'] = $siglas;
            $opt['where']['curso']       = $curso;
            $opt['where']['letra']   = $letra;

            if(!empty($id))
                $opt['notwhere']['id'] = $id;
      
            $resultado = $this->seleccionar($opt);

            return $resultado->num_rows;
            
        }

        function mostrarCiclo()
        {
            $_select = 'nombre';
            if (!empty($opt['select']))
            {
                $_select = '';
                foreach($opt['select'] as $atributo => $valor)
                {
                    $_select .= ",{$atributo}";

                }

                $_select = substr($_select,1);
            }


            $sql = "
                SELECT {$_select}
                FROM {$this->tabla}
            ";
            $resultado = BBDD::query($sql);

            return $resultado;

        }


    }