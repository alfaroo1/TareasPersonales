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
//Recorres los arrays de consultas
function recorrerConsultaUsuarios($array)
{
    //Controlamos que la consulta devuelva algun dato
    if (count($array) == 0) {
        echo "No existe ningun usuario";
    } else {
        //Recorremos el array que nos devuelve
        foreach ($array as $key => $value) {
            echo '<hr class="m-1">';
            echo '<form method = "post" class="d-flex justify-content-center align-items-center">';
            //Imprimimos los datos
            foreach ($value as $clave => $valor) {
                if ($clave == "rol") {
                    echo '<input type="text" value="' . $valor . '" placeholder="' . $valor . '" name="tipo">';
                } else if ($clave == "id") {
                    echo '<input type="hidden" value="' . $valor . '" name="id">';
                } else if ($clave != "rol") {
                    echo '<span class="px-5">';
                    echo $valor;
                    echo '</span>';
                }
            }
            echo '<input type="submit" value="Modificar" name="mod">';
            echo '<input type="submit" value="Borrar" name="borrar">';
            echo '</form>';
            echo '<hr class="m-1">';
        }
    }
}
