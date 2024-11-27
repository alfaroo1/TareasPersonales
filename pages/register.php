<?php
//Variable que va a contener el error
$error = null;
//Comporbamos lo que el usuario nos manda por el fomrulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../functions/funciones_bd.php";
    //Nos concecatamos a la base de datos
    connect();
    //Controlamos que el fomrulario no este vacio
    if (empty($_POST['usuario']) || empty($_POST['contraseña']) || empty($_POST['email'])) {
        $error = '<p class="bg-danger-subtle text-danger border border-danger rounded-1 p-2 text-center mt-2 fs-5">Hay algun apartado sin rellenar</p>';
    } else {
        //Añadimos comillas a los datos que vamos a insertar
        $usuario = "'" . $_POST['usuario'] . "'";
        $contraseña = "'" . $_POST['contraseña'] . "'";
        //Controlamos que no haya damos reptidos
        $datosRepetidos = consultaUser($usuario, $contraseña);
        if ($datosRepetidos >= 1) {
            $error = '<p class="bg-danger-subtle text-danger border border-danger rounded-1 p-2 text-center mt-2 fs-5">Ya existe este usuario</p>';
        } else if ($datosRepetidos == 0) {
            //Insertamos los datos del formulario
            insertarUser($usuario, $contraseña);
            //Tipo de usuario
            $register = consultaUserRegistrados($usuario, $contraseña);
            $admin = consultaUserAdmin($usuario, $contraseña);
            echo $register;
            echo $admin;
            //Depende del tipo de usuario redericcionamos 
            if ($admin >= 1 && $register == 0) {
                echo "mando a admin";
                header('Location: ./vistaAdmin.php');
            } else if ($register >= 1 && $admin == 0) {
                echo "mando a register";
                header('Location: ./vistaUsuario.php');
            }
        }
    }
}
?>
<!DOCTYPE html>
<lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tareas Personales | Registro</title>
        <link rel="stylesheet" href="../estilos/styles.css">
        <link rel="stylesheet" href="../estilos/register.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="bg-dark container-fluid vh-100 w-100 d-flex justify-content-center align-items-center p-0">
            <!-- Contenedor con imagen a la izquierda y formulario a la derecha -->
            <div class="row w-100 h-100">
                <!-- Columna de la imagen -->
                <div class="col-12 col-md-5 d-flex flex-column justify-content-center align-items-center d-none d-md-flex m-3">
                    <div class="container-sm w-50">
                        <img src="../imagenes/Sistema-de-registro-con-fondo.png" class="img-fluid mx-100" alt="Imagen de registro">
                    </div>
                    <h2 class="text-white mt-4 text-center fs-3">No eres usuario todavía?</h2>
                    <p class="text-white fs-5 text-center fw-lighter mt-2 w-50">Regístrate y toma el control de tu productividad.
                        Organiza tus tareas, establece prioridades y alcanza tus objetivos
                        de manera eficiente. Todo en un solo lugar, fácil de usar y accesible
                        en cualquier momento. ¡Empieza hoy y transforma tu forma de trabajar!</p>
                </div>

                <!-- Columna del formulario -->
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center m-3">
                    <main class="bg-dark-subtle container-lg text-dark mt-5 border border-dark rounded p-4 w-75">
                        <h2 class="text-center fs-3 mt-2">Formulario de Registro</h2>
                        <form action="./register.php" method="POST" class="d-flex flex-column justify-content-center align-items-center w-100 mt-4">
                            <div class="col-12 col-md-8 m-2">
                                <label for="usuario" class="form-label fs-6">Usuario</label>
                                <input type="text" name="usuario" class="form-control">
                            </div>
                            <div class="col-12 col-md-8 m-2">
                                <label for="contraseña" class="form-label fs-6">Contraseña</label>
                                <input type="password" name="contraseña" class="form-control">
                            </div>
                            <div class="col-12 col-md-8 m-2">
                                <label for="edad" class="form-label fs-6">Fecha de Nacimiento</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-12 col-md-8 m-2">
                                <label for="email" class="form-label fs-6">Correo electronico</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <!-- En caso de que haya error -->
                            <?php
                            if ($error != null) {
                                echo $error;
                            }
                            ?>
                            <div class="row gap-3 col-6 mt-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success col-5 fs-6">Enviar</button>
                                <button type="reset" class="btn btn-danger col-5 fs-6">Borrar</button>
                            </div>

                        </form>
                    </main>
                </div>
            </div>
        </div>




    </body>

    </body>