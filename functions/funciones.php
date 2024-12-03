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
        echo "No existe ninguna tarea de este tipo";
    } else {
        //Recorremos el array que nos devuelve
        foreach ($array as $key => $value) {
            echo '<li class="border border-light">';
            //Imprimimos los datos
            foreach ($value as $clave => $valor) {
                echo '<span>';
                echo $valor;
                echo '</span>';
            }
            echo '</li>';
        }
    }
}
