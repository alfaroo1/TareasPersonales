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
        echo '<h4 class="text-light">Conexión establecida</h4>';
    } catch (PDOException $e) {
        echo 'Error en la conexión: ' . $e->getMessage();
    }
}
//Funcion para insertar usuarios
function insertarUser($user, $pas, $rol, $mail)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO usuarios 
        VALUES($user,$pas,$rol,$mail)");
        echo "Se han añadido $filasInsertadas filas<br />";
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
