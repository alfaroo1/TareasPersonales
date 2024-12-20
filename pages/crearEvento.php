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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Personales | Crear Evento</title>
    <link rel="stylesheet" href="../estilos/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="imagenFondo container-fluid min-vh-100 d-flex flex-column w-100 p-0 bg-secondary">
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3">
            <div class="container-fluid">
                <!-- Imagen redonda -->
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="../imagenes/img_usuario.jpg" class="rounded-circle me-2 border border-white" alt="" width="40" height="40">
                    <span>Bienvenido a tus tareas personales, <?php echo $_SESSION['usuario']; ?></span>
                </a>

                <!-- Botones alineados a la derecha -->
                <div class="ms-auto d-flex align-items-center">

                    <a href="./vistaUsuario.php" class="me-2 text-white text-decoration-none fs-6 px-2">Inicio</a>
                    <a href="./crearTarea.php" class="me-2 text-white text-decoration-none fs-6 px-2">Crear Tarea</a>
                    <a href="#" class="me-2 text-white text-decoration-none fs-6 px-2">Crear Evento</a>
                    <a href="./logout.php" class="btn btn-danger fs-6">Cerrar Sesión</a>
                </div>

            </div>
        </nav>
        <!-- Main -->
        <main class="container-lg bg-dark text-light mt-5 border border-dark rounded p-5 w-75 mb-5">
            <h2 class="border-bottom border-2">Crea un nuevo evento</h2>
            <form action="./crearEvento.php" method="post" class="row mt-4 ">
                <div class="col-6">
                    <label for="" class="form-label col-4">Titulo</label>
                    <input type="text" class="form-control  mb-3" name="titulo">
                </div>

                <div class="col-6">
                    <label for="" class="form-label">Fecha</label>
                    <input type="date" name="fecha" id="" class="form-control mb-3">
                </div>
                <div class="col-6">
                    <label for="" class="form-label col-4">Duracion (min)</label>
                    <input type="number" class="form-control  mb-3" name="duracion">
                </div>
                <div class="col-6">
                    <label for="" class="form-label col-4">Ubicacion</label>
                    <input type="text" class="form-control  mb-3" name="ubicacion">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Descripcion</label>
                    <textarea name="descripcion" id="" class="form-control mb-3"></textarea>
                </div>

                <div class="row gap-3 col-6 mt-4 ms-2 d-flex justify-content-end align-items-end mb-3">
                    <button type="submit" style="height: 40px;" class="btn btn-primary mt-2 col-6">Crear </button>
                    <button type="reset" style="height: 40px;" class="btn btn-danger mt-2 col-3">Borrar</button>
                </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Inlcuimos el archivo donde tenemos la funcion de añadir tareas
                include "../functions/funciones_bd.php";
                //Nos conectamos a la base de datos
                connect();
                //Sacamos los datos
                $titulo = "'" . $_POST['titulo'] . "'";
                $fecha = "'" . $_POST['fecha'] . "'";
                $duracion = "'" . $_POST['duracion'] . "'";
                //Sacamos el id
                $nomUser = "'" . $_SESSION['usuario'] . "'";
                $id = idUser($nomUser);
                //Insertamos una fila
                insertarEvento($titulo, $fecha, $duracion, $id);
            }
            ?>
        </main>
        <!-- Footer -->
        <footer class="py-4 bg-dark mt-auto">
            <div class="container">
                <p class="m-0 text-center text-white fs-5">Copyright &copy; Tareas Personales 2024</p>
                <p class="m-0 text-center text-white fs-6">Creadores Carlos Alfaro y Jose Luis Vázquez</p>
            </div>
        </footer>
    </div>
</body>

</html>