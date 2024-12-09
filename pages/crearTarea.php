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
    <title>Tareas Personales | Crear Tarea</title>
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
                    <a href="#" class="me-2 text-white text-decoration-none fs-6 px-2">Crear Tarea</a>
                    <a href="./crearEvento.php" class="me-2 text-white text-decoration-none fs-6 px-2">Crear Evento</a>
                    <a href="./logout.html" class="btn btn-danger fs-6">Cerrar Sesión</a>
                </div>

            </div>
        </nav>
        <!-- Main -->
        <main class="container-lg bg-dark text-light mt-5 border border-dark rounded p-5 w-75 mb-5">
            <h2 class="border-bottom border-2">Crea una nueva tarea</h2>
            <form action="./crearTarea.php" method="post" class="row mt-4 ">
                <div class="col-6">
                    <label for="" class="form-label col-4">Titulo</label>
                    <input type="text" class="form-control  mb-3" name="titulo" required>
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Fecha limite</label>
                    <input type="date" name="fecha" id="" class="form-control mb-3">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Estado</label>
                    <select name="estado" id="" class="form-control mb-3">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Progreso">En Progreso</option>
                        <option value="Completada">Completada</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Prioridad</label>
                    <select name="prioridad" id="" class="form-control mb-3">
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
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
                //Sacamos los datos del formulario
                $title = "'" . $_POST['titulo'] . "'";
                $estado = "'" . $_POST['estado'] . "'";
                //Sacamos el id del usuario
                //Inlcuimos el archivo donde tenemos la funcion de añadir tareas
                include "../functions/funciones_bd.php";
                //Nos conectamos a la base de datos
                connect();
                $nomUser = "'" . $_SESSION['usuario'] . "'";
                $id = idUser($nomUser);
                insertarTareas($title, $estado, $id);
                //Insertamos el id del user y el id de la tarea

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