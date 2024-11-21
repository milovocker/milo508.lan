<?php

    class CiclosCRUD extends ProgramaBase
    {
        const LIMITE_SCROLL = 5;

        function __construct()
        {

            $this->ciclo = new Ciclo();


            parent::__construct($this->ciclo);

        }

        function inicializar()
        {
            $this->form->accion('/'. $this->seccion .'/');

            $paso        = new Hidden('paso'); 
            $paso->value = 1;

            $oper        = new Hidden('oper'); 
            $id          = new Hidden('id');        

            $ciclo       = new Select  ('ciclos'    ,Ciclo::CICLOS,['validar' => True]);

            $this->form->cargar($ciclo);
        }

        function existe($id='')
        {

            $cantidad = 0;
            if (   !empty($this->form->val['ciclos']) 
            )
            {   

                $cantidad = $this->ciclo->existeCiclo(
                    $this->form->val['ciclos']
                    ,$this->form->val['id']
                    ,$this->form->val['sigla']
                );
            }

            return $cantidad;
        }

        function recuperar()
        {

            $this->ciclo->recuperar($this->form->val['id']);

            $this->form->elementos['ciclos']->value      = $this->ciclo->ciclos;
        }


        function resultados_busqueda()//Esta es la select de HorariosCRUD
        {
            $prueba = '
                <h3>Selecciona un ciclo para consultar su horario:</h3>
                <br>
            ';
            
            $prueba .= '
                <form action="/index.php">
                    <select id="ciclos" class="form-control form-select" name="ciclos">
            ';

            // Recorremos el array que devuelve mostrarCiclo() y generamos las opciones del select
            foreach($this->ciclo->mostrarCiclo() as $opcion_ciclo){
                // Asegúrate de acceder a las claves 'siglas' y 'nombre' dentro del array $opcion_ciclo
                $prueba .= '<option value="' . ($opcion_ciclo['siglas']).($opcion_ciclo['curso']) . '">' . ($opcion_ciclo['nombre']). ' ('.($opcion_ciclo['curso']). ')</option>';
            }

            $prueba .= '
                    </select>
                    <br>
                    <div class="horario">'. enlace("/horario/{$opcion_ciclo['siglas']}/", 'Ver horario',['class' => 'btn btn-success']) .'</div>
                </form>';

            return $prueba;
        }
    }