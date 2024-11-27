<?php
//Funcion para crear el token
function crearToken($id_sesion)
{
    $date = date('H:i');
    $token = hash('sha256', $id_sesion . $date);
    return $token;
}
