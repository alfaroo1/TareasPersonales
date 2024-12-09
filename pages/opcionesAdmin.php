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
    <title>Tareas Personales | ADMIN</title>
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
                    <img src="../imagenes/perfil_admin.jpg" class="rounded-circle me-2 border border-white" alt="" width="40" height="40">
                    <?php
                    if (isset($_SESSION['token'])) {
                        $usuario = $_SESSION['usuario'];
                    } else if (!isset($_SESSION['token'])) {
                        echo "No tienes permiso";
                    } {
                    }
                    ?>
                    <span>Bienvenido al centro de control, <?php echo $usuario; ?></span>
                </a>

                <!-- Botones alineados a la derecha -->
                <div class="ms-auto d-flex align-items-center">
                    <a href="./vistaAdmin.php" class="me-2 text-white text-decoration-none fs-6 px-2">Inicio</a>
                    <a href="#" class="me-2 text-white text-decoration-none fs-6 px-2">Opciones Tarea/Evento</a>
                    <a href="./logout.php" class="btn btn-danger fs-6">Cerrar Sesión</a>
                </div>
            </div>
        </nav>

        <!-- Header - set the background image for the header in the line below-->
        <header class="header imagenFondo py-5 flex-grow-1 text-white">
            <div class="header-overlay mt-2">
                <div class="container d-flex flex-column align-items-center justify-content-center w-100">
                    <!-- Selector de usuarios -->
                    <div class="mb-3 text-center">
                        <form action="" method="post">
                            <label for="userSelect" class="form-label">Selecciona un usuario:</label>
                            <select class="form-select" id="userSelect" name="user">
                                <option selected disabled>Selecciona un usuario</option>
                                <?php
                                include "../functions/funciones.php";
                                include "../functions/funciones_bd.php";

                                // Conectamos a la base de datos
                                connect();

                                // Obtenemos los usuarios registrados
                                $usuarios = obtenerUsuarios();

                                // Llenamos las opciones del select
                                foreach ($usuarios as $usuario) {
                                    echo '<option value="' . htmlspecialchars($usuario['id']) . '">' . htmlspecialchars($usuario['usuario']) . '</option>';
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-secondary mt-3">Buscar</button>
                        </form>
                    </div>

                    <!-- Sección de tareas -->
                    <div class="mt-4 w-50">
                        <h4>Tareas</h4>
                        <ul class="list-group" id="taskList">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $usuario = $_POST['user'];
                                recorrerConsulta(listarTareasAdmin($usuario));
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- Sección de eventos -->
                    <div class="mt-4 w-50">
                        <h4>Eventos</h4>
                        <ul class="list-group" id="eventList">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $usuario = $_POST['user'];
                                recorrerConsulta(listarEventosAdmin($usuario));
                            }
                            ?>
                        </ul>
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