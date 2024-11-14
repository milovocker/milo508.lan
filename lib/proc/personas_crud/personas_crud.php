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

            $dni         = new Input ('dni', ['placeholder' => 'DNI del usuario'     , 'validar' => True, 'ereg' => EREG_TEXTO_100_OBLIGATORIO  ]);
            $nombre      = new Input   ('nombre'       ,['placeholder' => 'Nombre del usuario'     , 'validar' => True, 'ereg' => EREG_TEXTO_100_OBLIGATORIO  ]);
            $email       = new Input('email'  ,['placeholder' => 'Email usuario...', 'validar' => True ]);
            $edad        = new Input   ('edad'        ,['placeholder' => 'Autor del libro...'      , 'validar' => True, 'ereg' => EREG_TEXTO_150_OBLIGATORIO  ]);
            $genero      = new Select  ('genero'    ,Persona::GENEROS,['validar' => True]);
            $ocupacion   = new Select   ('ocupacion'        ,Persona::OCUPACIONES,['validar' => True]);

            $this->form->cargar($paso);
            $this->form->cargar($oper);
            $this->form->cargar($id);
            $this->form->cargar($dni);
            $this->form->cargar($nombre);
            $this->form->cargar($email);
            $this->form->cargar($edad);
            $this->form->cargar($genero);
            $this->form->cargar($ocupacion);
        }


        function existe($id='')
        {

            $cantidad = 0;
            if (   !empty($this->form->val['dni']) 
                && !empty($this->form->val['nombre'])
                && !empty($this->form->val['email'])
                && !empty($this->form->val['edad'])
                && !empty($this->form->val['genero'])
                && !empty($this->form->val['ocupacion'])
            )
            {   

                $cantidad = $this->persona->existePersona(
                    $this->form->val['dni']
                ,$this->form->val['nombre']
                ,$this->form->val['email']
                ,$this->form->val['edad']
                ,$this->form->val['genero']
                ,$this->form->val['ocupacion']
                ,$this->form->val['id']
                );
            }

            return $cantidad;
        }


        function recuperar()
        {

            $this->persona->recuperar($this->form->val['id']);



            $this->form->elementos['dni']->value        = $this->persona->dni;
            $this->form->elementos['nombre']->value     = $this->persona->nombre;
            $this->form->elementos['email']->value      = $this->persona->email;
            $this->form->elementos['edad']->value       = $this->persona->edad;
            $this->form->elementos['genero']->value     = $this->persona->genero;
            $this->form->elementos['ocupacion']->value  = $this->persona->ocupacion;
        }


        function resultados_busqueda()
        {
            $listado_personas = '
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Género</th>
                        <th scope="col">Ocupación</th>
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
                                ". enlace("/{$this->seccion}/actualizar/{$fila['dni']}",'Actualizar',['class' => 'btn btn-primary']) ."
                                ". enlace("#",'Eliminar',['class' => 'btn btn-danger','onclick' => "if(confirm('Cuidado, estás tratando de eliminar a: {$fila['nombre']}')) location.href = '/personas/eliminar/{$fila['dni']}';"]) ."
                            </th>
                            <td>{$fila['dni']}</td>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['email']}</td>
                            <td>{$fila['edad']}</td>
                            <td>". Persona::GENEROS[$fila['genero']] ."</td>
                            <td>". Persona::OCUPACIONES[$fila['ocupacion']] ."</td>
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





