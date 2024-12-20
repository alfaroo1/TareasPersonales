<?php
//Iniciamos sesion
session_start();
?>
<?php
//Variable que va a contener el error
$error = null;
//Comporbamos lo que el usuario nos manda por el fomrulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "./functions/funciones_bd.php";
    include "./functions/funciones.php";
    //Nos concecatamos a la base de datos
    connect();
    //Controlamos que el fomrulario no este vacio
    if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {
        $error = '<p class="bg-danger-subtle text-danger border border-danger rounded-1 p-2 text-center mt-2 fs-5">Hay algun apartado sin rellenar</p>';
    } else {
        //Añadimos comillas a los datos que vamos a insertar
        $usuario = "'" . $_POST['usuario'] . "'";
        $contraseña = "'" . $_POST['contraseña'] . "'";
        //Controlamos que no haya damos reptidos
        $sesion = inicioSesion($usuario, $contraseña);
        //Controlaos el tipo de usuario
        $tipo = tipoUser($usuario, $contraseña);
        if ($sesion >= 1) {
            if ($tipo >= 1) {
                $_SESSION['token'] = crearToken(session_id());
                $_SESSION['usuario'] = $_POST['usuario'];
                header('Location: ./pages/vistaAdmin.php');
            } else if ($tipo == 0) {
                $_SESSION['token'] = crearToken(session_id());
                $_SESSION['usuario'] = $_POST['usuario'];
                header('Location: ./pages/vistaUsuario.php');
            }
        } else if ($sesion == 0) {
            $error = '<p class="bg-danger-subtle text-danger border border-danger rounded-1 p-2 text-center mt-2 fs-5">Este usuario no existe</p>';
        }
    }
}
?>
<!DOCTYPE html>
<lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tareas Personales | Login</title>
        <link rel="stylesheet" href="./estilos/styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="imagenFondo bg-dark container-fluid vh-100 w-100 d-flex justify-content-center align-items-center p-0">
            <!-- Columna del formulario -->
            <div class="col-12 col-md-6 flex-col justify-content-center align-items-center m-3">
                <h2 class="text-center  mt-3 text-white text-light fs-4"><span class="fs-2">Tareas Personales </span> Organiza tu vida de una forma sencilla</h2>
                <main class="bg-dark-subtle container-lg text-dark mt-5 border border-dark rounded p-4 w-75">
                    <h2 class="text-center fs-3 mt-2">Inicia Sesion</h2>
                    <form action="./index.php" method="POST" class="d-flex flex-column justify-content-center align-items-center w-100 mt-2">
                        <div class="col-12 col-md-8 m-2">
                            <label for="usuario" class="form-label fs-6">Usuario</label>
                            <input type="text" name="usuario" class="form-control">
                        </div>
                        <div class="col-12 col-md-8 m-2">
                            <label for="contraseña" class="form-label fs-6">Contraseña</label>
                            <input type="password" name="contraseña" class="form-control">
                        </div>
                        <!-- Comprobamos el valor de token -->
                        <?php
                        $valor = isset($_SESSION['token']) ? $_SESSION['token'] : '';
                        ?>
                        <input type="hidden" name="token" value="<?php echo $valor; ?>">
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
                        <div class="row gap-3 col-6 mt-4 d-flex justify-content-end align-items-end mb-3">
                            <hr class="mb-0">
                            <a href="./pages/register.php" class="text-center">¿No estas registrado?</a>
                        </div>
                    </form>
                </main>
            </div>
        </div>
        </div>
    </body>

    </body>