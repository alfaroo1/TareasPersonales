<?php
//Funcion para crear el token
function crearToken($id_sesion)
{
    $date = date('H:i');
    $token = hash('sha256', $id_sesion . $date);
    return $token;
}
//Recorres los arrays de consultas
function recorrerConsulta($array)
{
    //Controlamos que la consulta devuelva algun dato
    if (count($array) == 0) {
        echo "No existe ninguna tarea o evento";
    } else {
        //Recorremos el array que nos devuelve
        foreach ($array as $key => $value) {
            echo '<hr class="m-1">';
            echo '<li class="d-flex justify-content-center align-items-center">';
            //Imprimimos los datos
            foreach ($value as $clave => $valor) {
                echo '<span class="px-5">';
                echo $valor;
                echo '</span>';
            }
            echo '</li>';
            echo '<hr class="m-1">';
        }
    }
}
function recorrerConsultaUsuarios($array)
{
    // Verificamos si la consulta devuelve algún dato
    if (count($array) == 0) {
        echo '<tr><td colspan="3" class="text-center">No existe ningún usuario</td></tr>';
    } else {
        // Recorremos el array y generamos filas de la tabla
        foreach ($array as $value) {
            echo '<tr>';
            // Creamos un formulario para cada fila
            echo '<form method="post" class="d-flex justify-content-center align-items-center">';
            // Campos de la fila
            foreach ($value as $clave => $valor) {
                if ($clave == "id") {
                    // ID como campo oculto
                    echo '<input type="hidden" value="' . htmlspecialchars($valor) . '" name="id">';
                } elseif ($clave == "rol") {
                    // Rol como campo editable
                    echo '<td><input type="text" value="' . htmlspecialchars($valor) . '" name="tipo" class="form-control"></td>';
                } else {
                    // Otras columnas como texto
                    echo '<td>' . htmlspecialchars($valor) . '</td>';
                }
            }
            // Botones de acción
            echo '<td>';
            echo '<input type="submit" value="Modificar" name="mod" class="btn btn-sm btn-warning me-2">';
            echo '<input type="submit" value="Borrar" name="borrar" class="btn btn-sm btn-danger">';
            echo '</td>';
            echo '</form>'; // Cerramos el formulario para esta fila
            echo '</tr>';
        }
    }
}

