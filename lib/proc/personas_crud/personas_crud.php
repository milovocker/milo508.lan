<?php

    class PersonasCRUD extends ProgramaBase
    {
        const LIMITE_SCROLL = 5;

        function __construct()
        {

            $this->persona = new Persona();


            parent::__construct($this->persona);

        }

        function inicializar()
        {
            $this->form->accion('/'. $this->seccion .'/');

            $paso        = new Hidden('paso'); 
            $paso->value = 1;

            $oper        = new Hidden('oper'); 
            $id          = new Hidden('id');        

            $nif         = new Input   ('nif'          ,['placeholder' => 'nif'     , 'validar' => True, 'ereg' => EREG_TEXTO_100_OBLIGATORIO  ]);
            $nombre      = new Input   ('nombre'       ,['placeholder' => 'Nombre', 'validar' => True ]);
            $apellido_1   = new Input   ('apellido_1'        ,['placeholder' => 'Primer Apellido'      , 'validar' => True, 'ereg' => EREG_TEXTO_150_OBLIGATORIO  ]);
            $apellido_2   = new Input   ('apellido_2'        ,['placeholder' => 'Segundo Apellido'      , 'validar' => False]);

            $this->form->cargar($paso);
            $this->form->cargar($oper);
            $this->form->cargar($id);
            $this->form->cargar($nif);
            $this->form->cargar($nombre);
            $this->form->cargar($apellido_1);
            $this->form->cargar($apellido_2);
        }

        function existe($id='')
        {

            $cantidad = 0;
            if (   !empty($this->form->val['nif']) 
                && !empty($this->form->val['nombre'])
                && !empty($this->form->val['apellido_1'])
                && !empty($this->form->val['apellido_2'])
            )
            {   

                $cantidad = $this->persona->existePersona(
                    $this->form->val['nif']
                ,$this->form->val['nombre']
                ,$this->form->val['apellido_1']
                ,$this->form->val['apellido_2']
                ,$this->form->val['id']
                );
            }

            return $cantidad;
        }

       function recuperar()
        {

            $this->persona->recuperar($this->form->val['id']);



            $this->form->elementos['nif']->value        = $this->persona->nif;
            $this->form->elementos['nombre']->value     = $this->persona->nombre;
            $this->form->elementos['apellido_1']->value  = $this->persona->apellido_1;
            $this->form->elementos['apellido_2']->value  = $this->persona->apellido_2;
        } 

        function resultados_busqueda()
        {
            $listado_personas = '
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIF</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Primer apellido</th>
                        <th scope="col">Segundo apellido</th>
                    </tr>
                </thead>
                <tbody>
            
            ';

            $limite = PersonasCRUD::LIMITE_SCROLL;

            $pagina = $this->form->val['pagina'];

            $offset = $pagina * $limite;



            $opt = [];
    
            $opt['orderby']['fecha_ult_mod'] = 'DESC';   
            $opt['offset'] = $offset;
            $opt['limit']  = $limite;
        
        
            $resultado = $this->persona->seleccionar($opt);

            if ($resultado->num_rows > 0) 
            {
                while ($fila = $resultado->fetch_assoc()) 
                {

                    $listado_personas .= "
                        <tr>
                            <th scope=\"row\">
                                ". enlace("/{$this->seccion}/actualizar/{$fila['id']}",'Actualizar',['class' => 'btn btn-primary']) ."
                                ". enlace("#",'Eliminar',['class' => 'btn btn-danger','onclick' => "if(confirm('Cuidado, estás tratando de eliminar a: {$fila['nombre']}')) location.href = '/personas/eliminar/{$fila['id']}';"]) ."
                            </th>
                            <td>{$fila['nif']}</td>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['apellido_1']}</td>
                            <td>{$fila['apellido_2']}</td>
                        </tr>
                    ";
                }

                if ($resultado->num_rows == PersonasCRUD::LIMITE_SCROLL)
                    $siguiente = '<li class="page-item">'. enlace("/{$this->seccion}/pag/". ($pagina + 1), 'Siguiente',['class' => 'page-link']) .'</li>';
            } 
            else 
            {
                $listado_personas = '<tr><td colspan="5">No hay resultados</td></tr>';
            }

            if($pagina)
                $pagina_anterior = '<li class="page-item">'. enlace("/{$this->seccion}/pag/". ($pagina - 1), 'Anterior',['class' => 'page-link']) .'</li>';
            

            $listado_personas .= '
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        '. $pagina_anterior .'
                        '. $siguiente .'
                    </ul>
                </nav>


                <div class="alta">'. enlace("/{$this->seccion}/alta/", 'Alta de persona',['class' => 'btn btn-success']) .'</div>
            ';
            

            return $listado_personas;


        }



    }