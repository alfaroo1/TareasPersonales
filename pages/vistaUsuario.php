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
                        <!-- Bloque Principal Tareas -->
                        <div class="container mt-4">
                            <!-- Formulario de Filtro -->
                            <form action="" method="post" class="d-flex justify-content-center align-items-center mb-4">
                                <div class="d-flex justify-content-between align-items-center gap-2 w-50">
                                    <label for="tipo-select" class="form-label fs-5 text-white mb-0">Filtrar:</label>
                                    <select id="tipo-select" name="tipo" class="form-select bg-dark text-white w-75">
                                        <option value="todas">- Mostrar Todas -</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="En Progreso">En Progreso</option>
                                        <option value="Completada">Completada</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>

                            <!-- Listado de Tareas -->
                            <div class="card bg-dark text-white w-50 mx-auto border  border-white p-2 mt-3">
                                <ul id="tareas-lista" class="list-group list-group-flush list-unstyled">
                                    <!-- Ejemplo de elementos dinámicos comentados -->
                                    <!--
                                    <li class="list-group-item bg-dark text-white d-flex justify-content-between">
                                        <span>Tarea 1</span>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </li>
                                    -->
                                    <?php
                                    //Incluimos las funciones
                                    include "../functions/funciones_bd.php";
                                    include "../functions/funciones.php";
                                    //Conectamos al servidor
                                    connect();
                                    //Sacamos el nombre del usuario
                                    $user = "'" . $_SESSION['usuario'] . "'";
                                    //Si filtra tareas por tipo
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $tipo = "'" . $_POST['tipo'] . "'";
                                        recorrerConsulta(listarTareas($tipo, $user));
                                    } else {
                                        echo  '   <li class="list-group-item bg-dark text-white d-flex justify-content-center p-0">';
                                        echo  '   <span>Haz click en Buscar para mostrar las tareas!</span>';
                                        echo  '   </li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>


                    </div>


                    <!-- EVENTOS -->
                    <div class="row text-center text-dark w-100 d-flex align-items-center justify-content-center mt-10">
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
                                recorrerConsulta(listarEventos($user));
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