<!DOCTYPE html>
<lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tareas Personales | Registro</title>
        <link rel="stylesheet" href="../estilos/styles.css">
        <link rel="stylesheet" href="../estilos/register.css">
    </head>

<body>
<div class="bg-dark container-fluid vh-100 w-100 d-flex justify-content-center align-items-center p-0">
    <!-- Contenedor con imagen a la izquierda y formulario a la derecha -->
    <div class="row w-100 h-100">
        <!-- Columna de la imagen -->
        <div class="col-12 col-md-5 d-flex flex-column justify-content-center align-items-center d-none d-md-flex m-3">
           
                <h2 class="text-white mt-4 text-center">No eres usuario todavía? <br> Registrate y descubre tus ventajas.</h2>
         
            <img src="../imagenes/img_register.png" class="img-fluid" alt="Imagen de registro" >
            
        </div>

        <!-- Columna del formulario -->
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center m-3">
            <main class="container-lg text-light mt-5 border border-dark rounded p-4 w-100">
                <h2 class="text-center">Formulario de Registro</h2>
                <form action="" class="d-flex flex-column justify-content-center align-items-center w-100">
                    <div class="col-12 col-md-8 m-2">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" class="form-control">
                    </div>
                    <div class="col-12 col-md-8 m-2">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" id="apellidos" class="form-control text-dark">
                    </div>
                    <div class="col-12 col-md-8 m-2">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" id="usuario" class="form-control">
                    </div>
                    <div class="col-12 col-md-8 m-2">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" id="contraseña" class="form-control">
                    </div>
                    <div class="col-12 col-md-8 m-2">
                        <label for="tipoUser" class="form-label">Tipo de Usuario</label>
                        <select name="tipoUser" id="tipoUser" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="registrado">Registrado</option>
                        </select>
                    </div>
                    <div class="row gap-3 col-6 mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary col-4">Enviar</button>
                        <button type="reset" class="btn btn-danger col-4">Borrar</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</div>



    
</body>

    </body>