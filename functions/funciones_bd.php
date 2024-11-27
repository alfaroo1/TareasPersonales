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
function inicioSesion($user, $pass, $rol)
{
    global $pdo;
    try {
        $contador = 0;
        //Declaramos la consulta
        $consulta = "SELECT * FROM usuarios WHERE usuario = $user AND password = $pass AND rol = $rol";
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
//Funcion para comprobar usuarios registrados
function consultaUserRegistrados($user, $pass)
{
    global $pdo;
    try {
        $contador = 0;
        //Declaramos la consulta
        $consulta = "SELECT * FROM usuarios WHERE usuario = $user AND password = $pass AND rol = 'registrado'";
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
//Funcion para comprobar usuarios registrados
function consultaUserAdmin($user, $pass)
{
    global $pdo;
    try {
        $contador = 0;
        //Declaramos la consulta
        $consulta = "SELECT * FROM usuarios WHERE usuario = $user AND password = $pass AND rol = 'admin'";
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
