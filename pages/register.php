<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Personales | Registro</title>
    <link rel="stylesheet" href="../estilos/styles.css">
    <link rel="stylesheet" href="../estilos/register.css">
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex flex-column w-100 p-0 bg-secondary">
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3">
            <div class="container-fluid">
                <!-- Imagen redonda -->
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="/imagenes/img_usuario.jpg" alt="Usuario" class="rounded-circle me-2 border border-white" width="40" height="40">
                    <span>Bienvenido a tus tareas personales, Usuario.</span>
                </a>

                <!-- Botones alineados a la derecha -->
                <div class="ms-auto d-flex align-items-center">
                    <a href="#" class="me-2 text-white text-decoration-none fs-6 px-2">Inicio</a>
                    <a href="logout.html" class="btn btn-danger">Cerrar Sesión</a>
                </div>
            </div>
        </nav>
        <!-- Main -->
        <main class="container-lg bg-dark text-light mt-5 border border-dark rounded p-5">
            <h2 class="text-center">Registrate</h2>
            <form action="" class="row">
                <div class="col-6">
                    <label for="" class="form-label col-4">Nombre</label>
                    <input type="text" class="form-control ">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Apellidos</label>
                    <input type="text" class="form-control text-dark">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Usuario</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Contraseña</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Tipo de Usuario</label>
                    <select name="tipoUser" id="" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="registrado">Registrado</option>
                    </select>
                </div>
                <div class="row gap-3 col-6 mt-4 ms-2">
                    <button type="submit" class="btn btn-primary mt-2 col-4">Enviar</button>
                    <button type="reset" class="btn btn-danger mt-2 col-4">Borrar</button>
                </div>
            </form>
        </main>
        <!-- Footer -->
        <footer class="py-5 bg-dark mt-auto">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
            </div>
        </footer>
    </div>
</body>

</html>