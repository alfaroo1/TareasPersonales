<?php
//Funcion para conectarse a base de datos
function connect()
{
    global $pdo;
    try {
        $pdo = new PDO(
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
function insertarUser($user, $pas, $rol, $mail)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO usuarios (user,password,rol,mail) VALUES($user,$pas,$rol,$mail)");
        echo '<p class="text-center mt-2 fs-5">Se ha registrado correctamente</p>';
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para consultar si existe ese usuario
function consultaUser($user)
{
    global $pdo;
    try {
        $contador = 0;
        //Declaramos la consulta
        $consulta = "SELECT * FROM usuarios WHERE user = $user";
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
function insertarTareas($titulo, $descripcion, $estado, $prioridad, $fecha_limite)
{
    global $pdo;
    try {
        //Inserccion a relizar
        $fila = "INSERT INTO tareas (titulo,descripcion,estado,prioridad,fecha_limite,user)
        VALUES(:titulo,:descripcion,:estado,:prioridad,:fecha_limite)";
        $inserccion = $pdo->prepare($fila);
        //Asignacion valores
        $inserccion->bindParam(':titulo', $titulo);
        $inserccion->bindParam(':descripcion', $descripcion);
        $inserccion->bindParam(':estado', $estado);
        $inserccion->bindParam(':prioridad', $prioridad);
        $inserccion->bindParam(':fecha_limite', $fecha_limite);
        //Ejecutamos la inserccion
        $inserccion->execute();
        echo "Se han añadido filas<br />";
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
