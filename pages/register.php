<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Personales | Registro</title>
    <link rel="stylesheet" href="../estilos/styles.css">
</head>

<body>
    <div class="container-fluid p-0">
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- Imagen redonda -->
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="/imagenes/img_usuario.jpg" alt="Usuario" class="rounded-circle me-2 border border-white" width="40" height="40">
                    <span>Bienvenido a tus tareas personales, Usuario.</span>
                </a>

                <!-- Botones alineados a la derecha -->
                <div class="ms-auto">
                    <a href="#" class="btn btn-primary me-2">Inicio</a>
                    <a href="logout.html" class="btn btn-danger">Cerrar Sesión</a>
                </div>
            </div>
        </nav>
        <!-- Main -->
        <main class="container-lg mt-5 border border-dark rounded p-5">
            <h2 class="text-center">Registrate</h2>
            <form action="" class="">
                <div class="">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control ">
                </div>
                <div>
                    <label for="" class="form-label">Apellidos</label>
                    <input type="text" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Usuario</label>
                    <input type="text" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Contraseña</label>
                    <input type="text" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Tipo de Usuario</label>
                    <select name="tipoUser" id="" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="registrado">Registrado</option>
                    </select>
                </div>
            </form>
        </main>
    </div>
</body>

</html>