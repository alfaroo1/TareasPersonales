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
//Sacar id usuario
function idUser($nombre)
{
    global $pdo;
    try {
        $consulta = "SELECT id 
        FROM usuarios 
        WHERE usuario = $nombre";
        //La ejecutamos
        $listarConsulta = $pdo->query($consulta);
        while ($fila = $listarConsulta->fetch(PDO::FETCH_ASSOC)) {
            foreach ($fila as $key => $value) {
                if ($key == 'id') {
                    return $value;
                }
            }
            return $fila;
        }
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para insertar tarea e insertar el id de la tearea y el id del user
function insertarTareas($titulo, $estado, $user_id)
{
    global $pdo;
    try {
        //Ejecutamos la inserccion de tareas
        $fila = $pdo->exec("INSERT INTO tareas (titulo,estado)
        VALUES($titulo,$estado)");
        //Sacamos el id de la terea
        $tarea_id = $pdo->lastInsertId();
        //Ejecutamos la inserccion en USUARIO_CREA_TAREAS
        $userTareas = $pdo->exec("INSERT INTO usuario_crea_tareas (usuario_id,tarea_id)
        VALUES ($user_id,$tarea_id)");
        echo '<p class="text-center mt-4 fs-5">La tarea ha sido creada con éxito!</p>';
        echo '<p class="text-center fs-6"><a href="./vistaUsuario.php" class="text-decoration-none m-0">Volver al Inicio</a></p>';
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para listar tareas
function listarTareas($estado, $user)
{
    global $pdo;
    try {
        $arrayTareas = [];
        //Declaramos la consulta
        $consulta = "SELECT tareas.id,tareas.titulo,tareas.estado 
        FROM tareas 
        JOIN 
        usuario_crea_tareas ON tareas.id = usuario_crea_tareas.tarea_id
        JOIN
        usuarios ON usuario_crea_tareas.usuario_id = usuarios.id
        WHERE 
        usuarios.usuario = $user
        AND
        estado = $estado";
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
function insertarEvento($titulo, $fecha, $duracion, $user)
{
    global $pdo;
    try {
        //Ejecutamos la inserccion 
        $fila = $pdo->exec("INSERT INTO eventos (titulo,fecha,duracion)
        VALUES($titulo,$fecha,$duracion)");
        //Sacamos el id de la terea
        $evento_id = $pdo->lastInsertId();
        //Ejecutamos la inserccion en USUARIO_CREA_TAREAS
        $userTareas = $pdo->exec("INSERT INTO usuario_crea_eventos (usuario_id,evento_id)
        VALUES ($user,$evento_id)");
        echo '<p class="text-center mt-2 fs-5">Se ha insertado evento correctamente</p>';
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Funcion para listar eventos
function listarEventos($user)
{
    global $pdo;
    try {
        $arrayEventos = [];
        //Declaramos la consulta
        $consulta = "SELECT eventos.id,eventos.titulo,eventos.fecha,eventos.duracion 
        FROM eventos 
        JOIN 
        usuario_crea_eventos ON eventos.id = usuario_crea_eventos.evento_id
        JOIN
        usuarios ON usuario_crea_eventos.usuario_id = usuarios.id
        WHERE 
        usuarios.usuario = $user";
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
//Funcion para listar usuarios
function listarUsuarios()
{
    global $pdo;
    try {
        $arrayUsuarios = [];
        //Declaramos la consulta
        $consulta = "SELECT id,usuario,rol FROM usuarios";
        //La ejecutamos
        $listarConsulta = $pdo->query($consulta);
        //Recorremos la consulta
        while ($fila = $listarConsulta->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrayUsuarios, $fila);
        }
        //Devolvemos el resultado de contado
        return $arrayUsuarios;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Modificar rol de usuario
function modificarUser($tipo, $id)
{
    global $pdo;
    try {
        //Declaramos la modificacion
        $modificacion = "UPDATE usuarios SET rol = $tipo WHERE id = $id";
        $resultado = $pdo->query($modificacion);
        // //Dependiendo del resultado mostramos un mensaje u otro
        if ($resultado) {
            echo "Usuario modificado correctamente" . "<br>";
            echo "Filas actualizafadas " . $resultado->rowCount() . "<br>";
        } else {
            $pdo->errorInfo();
        }
        // echo "Usuario modificado correctamete";
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
//Eliminar usuario
function deleteUser($id)
{
    global $pdo;
    try {
        //Borramos el usuario
        $eliminacion = "DELETE FROM usuarios WHERE id = $id";
        $resultado = $pdo->query($eliminacion);
        // //Dependiendo del resultado mostramos un mensaje u otro
        if ($resultado) {
            echo "Usuario eliminado correctamente" . "<br>";
            echo "Filas eliminadas " . $resultado->rowCount() . "<br>";
        } else {
            $pdo->errorInfo();
        }
        // echo "Usuario modificado correctamete";
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}
