<?php
//Funcion para conectarse a base de datos
function connect()
{
    global $pdo;
    try {
        $pdo = new PDO(
            // port=3307
            'mysql:host=localhost;dbname=tareas_personales',
            'tareas_personales',
            'pass'
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    } catch (PDOException $e) {
        echo 'Error en la conexión: ' . $e->getMessage();
    }
}
//Funcion para insertar usuarios
function insertarUser($user, $pas)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO usuarios (usuario,password) VALUES($user,$pas)");
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para comprobar si el inicio de sesion es correcto
function inicioSesion($user, $pass)
{
    global $pdo;
    try {
        $contador = 0;
        //Declaramos la consulta
        $consulta = "SELECT * FROM usuarios WHERE usuario = $user AND password = $pass";
        //La ejecutamos
        $listarConsulta = $pdo->query($consulta);
        //Recorremos la consulta
        while ($fila = $listarConsulta->fetch()) {
            $contador++;
        }
        //Devolvemos el resultado de contado
        return $contador;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Consulta para el tipo de usuaro
function tipoUser($user, $pass)
{
    global $pdo;
    try {
        $contador = 0;
        //Declaramos la consulta
        $consulta = "SELECT * FROM usuarios WHERE usuario = $user AND password = $pass AND rol='admin'";
        //La ejecutamos
        $listarConsulta = $pdo->query($consulta);
        //Recorremos la consulta
        while ($fila = $listarConsulta->fetch()) {
            $contador++;
        }
        //Devolvemos el resultado de contado
        return $contador;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para consultar si existe ese usuario
function consultaUser($user, $pass)
{
    global $pdo;
    try {
        $contador = 0;
        //Declaramos la consulta
        $consulta = "SELECT * FROM usuarios WHERE usuario = $user AND password = $pass";
        //La ejecutamos
        $listarConsulta = $pdo->query($consulta);
        //Recorremos la consulta
        while ($fila = $listarConsulta->fetch()) {
            $contador++;
        }
        //Devolvemos el resultado de contado
        return $contador;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para insertar tarea
function insertarTareas($titulo, $estado)
{
    global $pdo;
    try {
        //Ejecutamos la inserccion 
        $fila = $pdo->exec("INSERT INTO tareas (titulo,estado)
        VALUES($titulo,$estado)");
        echo '<p class="text-center mt-2 fs-5">Se ha insertado tarea correctamente</p>';
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para listar tareas
function listarTareas($estado)
{
    global $pdo;
    try {
        $arrayTareas = [];
        //Declaramos la consulta
        $consulta = "SELECT titulo,estado FROM tareas WHERE estado = $estado";
        //La ejecutamos
        $listarConsulta = $pdo->query($consulta);
        //Recorremos la consulta
        while ($fila = $listarConsulta->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrayTareas, $fila);
        }
        //Devolvemos el resultado de contado
        return $arrayTareas;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para crear evento
function insertarEvento($titulo, $fecha, $duracion)
{
    global $pdo;
    try {
        //Ejecutamos la inserccion 
        $fila = $pdo->exec("INSERT INTO eventos (titulo,fecha,duracion)
        VALUES($titulo,$fecha,$duracion)");
        echo '<p class="text-center mt-2 fs-5">Se ha insertado tarea correctamente</p>';
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para listar eventos
function listarEventos()
{
    global $pdo;
    try {
        $arrayEventos = [];
        //Declaramos la consulta
        $consulta = "SELECT titulo,fecha,duracion FROM eventos ORDER BY fecha";
        //La ejecutamos
        $listarConsulta = $pdo->query($consulta);
        //Recorremos la consulta
        while ($fila = $listarConsulta->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrayEventos, $fila);
        }
        //Devolvemos el resultado de contado
        return $arrayEventos;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
