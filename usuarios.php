<?php

    require_once 'general.php';

    echo Plantilla::header("Milo 35508");

    // definir constantes (error y limite de usuarios mostrados)
    define('TEXTO_ERROR', '<em class="error_campo_texto">El campo es inválido</em> <br />');

    define('LIMITE_SCROLL', '5');

    $html_salida = '';

    // recoger la operación que se desea realizar (con request se recoge post y get)
    $oper = $_REQUEST['oper'];

    $errores = [];

    // ver que operación se va a realizar con un switch case
    switch($oper)
    {
        case 'create':

            if (!empty($_POST['paso']))
            {
                $errores = validar_campos();

                if(count($errores) == 0)
                {
                    insertar();

                }
            }


            $html_salida .= cabecera('alta');
            $html_salida .= formulario($oper,$errores);

        break;
        case 'update':

            if (empty($_POST['paso']))
            {
                //Cargar los datos
                recuperar();
            }
            else
            {
                $errores = validar_campos();

                if(count($errores) == 0)
                {
                    actualizar();
                }
            }

            $html_salida .= cabecera('actualizar');
            $html_salida .= formulario($oper,$errores);

        break;
        case 'delete':
            eliminar();

            header("location: /usuarios.php");
            exit(0);

        break;
        default:

            $html_salida .= cabecera();

            $html_salida .= resultados_busqueda();
            

        break;

    }

    // funcion validar los campos introducidos
    function validar_campos()
    {
        $errores = [];

        $campos = ['nombre', 'email', 'edad'];

        // recorrer campos para validarlos
        foreach($campos as $campo)
        {
            // si el campo está vacío, error
            if(empty($_POST[$campo]))
            {
                $errores[$campo]['error']       = True;
                $errores[$campo]['desc_error']  = TEXTO_ERROR;
                $errores[$campo]['class_error'] = 'error_campo_texto';
            }
        }



        return $errores;

    }

    // funcion para crear nav (para ver donde se encuentra el usuario)
    function cabecera($titulo_seccion='')
    {
        if(empty($titulo_seccion))
        {
            // breadcrump se usa para mapear el camino que ha hecho el usuario por las paginas /home/alta...
            $breadcrumb = "<li class=\"breadcrumb-item\">Gestion de usuarios</li>";
        }
        else
        {
            $breadcrumb = "
                <li class=\"breadcrumb-item\"><a href=\"/ejercicico_plantilla/usuarios.php\">Gestion de usuarios</a></li>
                <li class=\"breadcrumb-item active\" aria-current=\"page\">{$titulo_seccion}</li>
            ";
        }


        return "
            <nav aria-label=\"breadcrumb\">
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"/\">Milo508</a></li>
                    {$breadcrumb}
                </ol>
            </nav>
        ";
    }


    // formulario que se le mostrará al usuario
    function formulario($oper, $errores = [])
    {
        // guardar en variable el id del elemento de la tabla sql
        $id = $_REQUEST['id'];

        $mensaje_exito = $botones_extra = $disabled = '';
        if($_POST['paso'] && count($errores) == 0)
        {
            $mensaje_exito = '<div class="exito">Operación realizada con éxito</div>';
            $disabled = 'disabled';
            $botones_extra = '<a href="/ejercicico_plantilla/usuarios.php?oper=create" class="btn btn-primary">Nuevo usuario</a>';

            if($oper == 'update')
                $botones_extra .= ' <a href="/ejercicico_plantilla/usuarios.php?oper=update&id='. $id .'" class="btn btn-primary">Editar</a>';
        
        }

        $html_formulario = "
        
            <form method=\"POST\" action=\"/ejercicico_plantilla/usuarios.php\">
                <input type=\"hidden\" name=\"paso\" value=\"1\" />
                <input type=\"hidden\" name=\"oper\" value=\"{$oper}\" />
                <input type=\"hidden\" name=\"id\" value=\"{$id}\" />

                {$mensaje_exito}

                <label class=\"". $errores['nombre']['class_error'] ." form-label\" for=\"nombre\">Nombre:</label>
                <input {$disabled} class=\"form-control\" type=\"text\" id=\"nombre\" name=\"nombre\" value=\"{$_POST['nombre']}\" placeholder=\"Nombre del usuario...\">
                ". $errores['nombre']['desc_error'] ."
                <br />

                <label class=\"". $errores['email']['class_error'] ." form-label\" for=\"email\">Email:</label>
                <textarea {$disabled} class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Email del usuario...\">{$_POST['email']}</textarea>
                ". $errores['email']['desc_error'] ."
                <br />

                <label class=\"". $errores['edad']['class_error'] ." form-label\" for=\"edad\">Edad:</label>
                <input {$disabled} class=\"form-control\" type=\"text\" id=\"edad\" name=\"edad\" value=\"{$_POST['edad']}\" placeholder=\"Edad del usuario...\"> 
                ". $errores['edad']['desc_error'] ."
                <br />
                <div style=\"text-align:right\">
                    {$botones_extra}
                    <input {$disabled} type=\"submit\" class=\"btn btn-primary\" value=\"Enviar\" />
                </div>
            </form>
        ";

        return $html_formulario;
    }

    // para eliminar usuarios de la bbdd
    function eliminar()
    {
        global $conexion;

        if (!empty($_GET['id']))
        {
            $sql = "
                DELETE FROM usuarios
                WHERE id = '{$_GET['id']}'
            ";
            $resultado = BBDD::query($sql);
        }
    }

    // mostrar datos de la bbdd
    function recuperar()
    {
        global $conexion;

        $id = $_REQUEST['id'];

        $sql = "
            SELECT * 
            FROM   usuarios
            WHERE  id = '{$id}'
        ";

        $resultado = BBDD::query($sql);

        // fetch assoc devuelve los datos de la query
        $fila = $resultado->fetch_assoc();

        $_POST['nombre']      = $fila['nombre'];
        $_POST['email'] = $fila['email'];
        $_POST['edad']       = $fila['edad'];
    }

    // modificar usuario
    function actualizar()
    {
        global $conexion;

        if (!empty($_POST['id']))
        {
            $sql = "
                UPDATE usuarios

                SET    nombre      = '{$_POST['nombre']}'
                    ,email = '{$_POST['email']}'
                    ,edad       = '{$_POST['edad']}'

                WHERE id = '{$_POST['id']}'

            ";
            $resultado = BBDD::query($sql);
        }
    }

    // añadir usuario
    function insertar()
    {
        global $conexion;


        $sql = "
            INSERT INTO usuarios
            (
                nombre
               ,email
               ,edad
            )
            VALUES
            (   
                 '". $_POST['nombre'] ."'
                ,'". $_POST['email'] ."'
                ,'". $_POST['edad'] ."'

            );
        ";

        $resultado = BBDD::query($sql);
    }

    function resultados_busqueda()
    {
        global $conexion;


        $listado_usuarios = '
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edad</th>
                </tr>
            </thead>
            <tbody>
        
        ';

        $limite = LIMITE_SCROLL;

        $pagina = $_GET['pagina'];

        $offset = $pagina * $limite;

        $sql = "SELECT * FROM usuarios LIMIT {$limite} OFFSET {$offset}";

        $resultado = BBDD::query($sql);

        if ($resultado->num_rows > 0) 
        {
            while ($fila = $resultado->fetch_assoc()) 
            {

                $listado_usuarios .= "
                    <tr>
                        <th scope=\"row\">
                            <a href=\"/ejercicico_plantilla/usuarios.php?oper=update&id={$fila['id']}\" class=\"btn btn-primary\">Actualizar</a>
                            <a onclick=\"if(confirm('Cuidado, estás tratando de eliminar al usuario: {$fila['nombre']}')) location.href = '/ejercicico_plantilla/usuarios.php?oper=delete&id={$fila['id']}';\" class=\"btn btn-danger\">Eliminar</a>
                        </th>
                        <td>{$fila['nombre']}</td>
                        <td>{$fila['email']}</td>
                        <td>{$fila['edad']}</td>
                    </tr>
                ";
            }
        } 
        else 
        {
            $listado_usuarios = '<tr><td colspan="5">No hay resultados</td></tr>';
        }

        if($pagina)
            $pagina_anterior = '<li class="page-item"><a class="page-link" href="/ejercicico_plantilla/usuarios.php?pagina='. ($pagina - 1) .'"">Anterior</a></li>';

        $listado_usuarios .= '
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    '. $pagina_anterior .'
                    <li class="page-item"><a class="page-link" href="/ejercicico_plantilla/usuarios.php?pagina='. ($pagina + 1) .'">Siguiente</a></li>
                </ul>
            </nav>


            <div class="alta">
                <a href="/usuarios.php?oper=create" class="btn btn-success">Alta de usuario</a>
            </div>
        ';


        return $listado_usuarios;


    }
    ?>
    <div class="container">
    <br><br><br><br><br><br><br><br>
    <?php echo $html_salida; ?>

    </div>
    <br />
<?php

    echo Plantilla::footer();

?>