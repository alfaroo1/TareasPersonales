<?php
//Iniciamos sesion
session_start();
//Si no existe usuario
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php?redirigido=true');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tareas Personales</title>
    <link rel="icon" type="image/x-icon" href="../imagenes/icono.ico" />
    <link href="../estilos/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex flex-column w-100 p-0">
        <!-- NAV -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3">
            <div class="container-fluid">
                <!-- Imagen redonda -->
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="../imagenes/img_usuario.jpg" class="rounded-circle me-2 border border-white" alt="" width="40" height="40">
                    <?php
                    if (isset($_SESSION['token'])) {
                        $usuario = $_SESSION['usuario'];
                    } else if (!isset($_SESSION['token'])) {
                        echo "No tienes permiso";
                    } {
                    }
                    ?>
                    <span>Bienvenido a tus tareas personales, <?php echo $usuario; ?></span>
                </a>

                <!-- Botones alineados a la derecha -->
                <div class="ms-auto d-flex align-items-center">

                    <a href="#" class="me-2 text-white text-decoration-none fs-6 px-2">Inicio</a>
                    <a href="./crearTarea.php" class="me-2 text-white text-decoration-none fs-6 px-2">Crear Tarea</a>
                    <a href="./crearEvento.php" class="me-2 text-white text-decoration-none fs-6 px-2">Crear Evento</a>
                    <a href="./logout.php" class="btn btn-danger fs-6">Cerrar Sesión</a>
                </div>

            </div>
        </nav>

        <!-- Header - set the background image for the header in the line below-->
        <header class="header imagenFondo py-5 flex-grow-1 text-white">
            <div class="intro-text">
                <h2 class="text-center">Gestiona todas tus tareas y eventos de forma sencilla.</h2>
            </div>
            <div class="header-overlay mt-4">
                <div class="container d-flex flex-column align-items-center justify-content-center w-100">
                    <!-- TAREAS -->
                    <div class="row text-center text-dark w-100 d-flex justify-content-center mt-3">
                        <!-- Título TAREAS -->
                        <div class="col-12 mb-2">
                            <h4 class="text-start border-bottom border-2 pb-2 text-white">TAREAS</h4>
                        </div>
                        <!-- Primer apartado -->
                        <form action="" method="post">
                            <div class="col-md-4 mb-3 mt-3">
                                <label for="tipo-select" class="form-label fs-5 text-white">Filtrar Tipo de Tarea</label>
                                <select id="tipo-select" name="tipo" class="form-select bg-dark text-white">
                                    <option value="todas">- Mostrar Todas -</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En Progeso">En Progeso</option>
                                    <option value="Completada">Completada</option>
                                </select>
                            </div>
                            <button type="submit">Buscar</button>
                        </form>
                        <!-- Segundo apartado -->
                        <div class="col-md-4 mb-3 mt-3">
                            <label for="tareas-lista" class="form-label fs-5 text-white">Tareas Pendientes</label>
                            <ul id="tareas-lista" class="list-group bg-dark text-white">
                                <!-- <li class="list-group-item bg-dark text-white d-flex justify-content-between">
                                    <label for="tarea1" class="form-check-label">Tarea 1</label>
                                    <button class="form-check-input me-2 bg-danger text-center p-1 d-flex justify-content-center align-items-center text-white">X</button>
                                </li>
                                <li class="list-group-item bg-dark text-white d-flex justify-content-between">
                                    <label for="tarea2" class="form-check-label">Tarea 2</label>
                                    <button class="form-check-input me-2 bg-danger text-center p-1 d-flex justify-content-center align-items-center text-white">X</button>
                                </li>
                                <li class="list-group-item bg-dark text-white d-flex justify-content-between">
                                    <label for="tarea3" class="form-check-label">Tarea 3</label>
                                    <button class="form-check-input me-2 bg-danger text-center p-1 d-flex justify-content-center align-items-center text-white">X</button>
                                </li> -->
                                <?php
                                //Sacamos el tipo de tarea que busca el usuario
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    //Sacamos el tipo de tarea que busca el usuario
                                    $tipo = "'" . $_POST['tipo'] . "'";
                                    //Añadimos las funciones BD
                                    include "../functions/funciones_bd.php";
                                    include "../functions/funciones.php";
                                    //Nos conectamos a la BD
                                    connect();
                                    //Vamos a sacar los datos del array y mostrarlos
                                    recorrerConsulta(listarTareas($tipo));
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <!-- EVENTOS -->
                    <div class="row text-center text-dark w-100 d-flex align-items-center justify-content-center mt-4">
                        <!-- Título EVENTOS -->
                        <div class="col-12 mb-2">
                            <h4 class="text-start border-bottom pb-2 border-2 pb-2 text-white">EVENTOS</h4>
                        </div>
                        <!-- Apartado de eventos -->
                        <div class="col-md-4 mb-3 w-50">
                            <label for="eventos-lista" class="form-label fs-5 text-white">Eventos Pendientes</label>
                            <ul id="eventos-lista" class="list-group bg-dark text-white">
                                <?php
                                //Vamos a sacar los datos del array y mostrarlos
                                recorrerConsulta(listarEventos());
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <footer class="py-4 bg-dark mt-auto">
            <div class="container">
                <p class="m-0 text-center text-white fs-5">Copyright &copy; Tareas Personales 2024</p>
                <p class="m-0 text-center text-white fs-6">Creadores Carlos Alfaro y Jose Luis Vázquez</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>