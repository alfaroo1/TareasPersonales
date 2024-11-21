<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tareas Personales</title>
    <link rel="icon" type="image/x-icon" href="../imagenes/icon.ico" />
    <link href="../estilos/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex flex-column w-100 p-0">
        <!-- NAV -->
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

        <!-- Header - set the background image for the header in the line below-->
        <header class="header py-5 flex-grow-1" style="background-color: #f8f9fa;">
            <div class="intro-text">
                <h2 class="text-center">Gestiona todas tus tareas y eventos de forma sencilla.</h2>
            </div>
            <div class="header-overlay mt-5">
                <div class="container">
                    <div class="row text-center text-dark">
                        <!-- Primer apartado -->
                        <div class="col-md-4 mb-3">
                            <label for="tipo-select" class="form-label">Seleccionar Tipo</label>
                            <select id="tipo-select" class="form-select">
                                <option value="tipo1">Tipo 1</option>
                                <option value="tipo2">Tipo 2</option>
                                <option value="tipo3">Tipo 3</option>
                            </select>
                        </div>
                        <!-- Segundo apartado -->
                        <div class="col-md-4 mb-3">
                            <label for="tareas-select" class="form-label">Tipos de Tareas</label>
                            <select id="tareas-select" class="form-select">
                                <option value="tarea1">Tarea 1</option>
                                <option value="tarea2">Tarea 2</option>
                                <option value="tarea3">Tarea 3</option>
                            </select>
                        </div>
                        <!-- Tercer apartado -->
                        <div class="col-md-4 mb-3">
                            <label for="eventos-select" class="form-label">Eventos</label>
                            <select id="eventos-select" class="form-select">
                                <option value="evento1">Evento 1</option>
                                <option value="evento2">Evento 2</option>
                                <option value="evento3">Evento 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <footer class="py-5 bg-dark mt-auto">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>