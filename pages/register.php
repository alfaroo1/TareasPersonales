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
                    <h2 class="text-white mt-4 text-center fs-1">No eres usuario todavía?</h2>
                    <p class="text-white fs-4 text-center fw-lighter mt-2 w-50">Regístrate y toma el control de tu productividad.
                        Organiza tus tareas, establece prioridades y alcanza tus objetivos
                        de manera eficiente. Todo en un solo lugar, fácil de usar y accesible
                        en cualquier momento. ¡Empieza hoy y transforma tu forma de trabajar!</p>
                </div>

                <!-- Columna del formulario -->
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center m-3">
                    <main class="bg-dark-subtle container-lg text-dark mt-5 border border-dark rounded p-4 w-75">
                        <h2 class="text-center fs-1 mt-2">Formulario de Registro</h2>
                        <form action="./register.php" method="POST" class="d-flex flex-column justify-content-center align-items-center w-100 mb-2 mt-4">
                            <div class="col-12 col-md-8 m-2">
                                <label for="usuario" class="form-label fs-4">Usuario</label>
                                <input type="text" name="usuario" class="form-control">
                            </div>
                            <div class="col-12 col-md-8 m-2">
                                <label for="contraseña" class="form-label fs-4">Contraseña</label>
                                <input type="password" name="contraseña" class="form-control">
                            </div>
                            <div class="col-12 col-md-8 m-2">
                                <label for="tipoUser" class="form-label fs-4">Tipo de Usuario</label>
                                <select name="tipoUser" id="tipoUser" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="registrado">Registrado</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-8 m-2">
                                <label for="email" class="form-label fs-4">Correo electronico</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="row gap-3 col-6 mt-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success col-5 fs-4 ">Enviar</button>
                                <button type="reset" class="btn btn-danger col-5 fs-4">Borrar</button>
                            </div>
                        </form>
                        <!-- Codigo PHP para insertar el usuario en la BD -->
                        <?php
                        //QUEDA CONTROLAR QUE ESTE USUARIO NO ESTE REGISTRADO
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            include "../functions/funciones_bd.php";
                            //Nos concecatamos a la base de datos
                            connect();
                            //Controlamos que el fomrulario no este vacio
                            if (empty($_POST['usuario']) || empty($_POST['contraseña']) || empty($_POST['email'])) {
                                echo '<p class="text-center mt-2 fs-4">Hay algun apartado sin rellenar</p>';
                            } else {
                                //Añadimos comillas a los datos que vamos a insertar
                                $usuario = "'" . $_POST['usuario'] . "'";
                                $contraseña = "'" . $_POST['contraseña'] . "'";
                                $tipo = "'" . $_POST['tipoUser'] . "'";
                                $gmail = "'" . $_POST['email'] . "'";
                                //Controlamos que no haya damos reptidos
                                $datosRepetidos = consultaUser($usuario);
                                if ($datosRepetidos >= 1) {
                                    echo '<p class="text-center mt-2 fs-4">Ya existe este usuario</p>';
                                } else if ($datosRepetidos == 0) {
                                    //Insertamos los datos del formulario
                                    insertarUser($usuario, $contraseña, $tipo, $gmail);
                                }
                            }
                        }
                        ?>
                    </main>
                </div>
            </div>
        </div>




    </body>

    </body>