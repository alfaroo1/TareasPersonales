<!-- Codigo PHP para insertar el usuario en la BD -->
<?php
//QUEDA CONTROLAR QUE ESTE USUARIO NO ESTE REGISTRADO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../functions/funciones_bd.php";
    //Nos concecatamos a la base de datos
    connect();
    //Controlamos que el fomrulario no este vacio
    if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {
        echo '<p class="text-center mt-2 fs-5">Hay algun apartado sin rellenar</p>';
    } else {
        //Añadimos comillas a los datos que vamos a insertar
        $usuario = "'" . $_POST['usuario'] . "'";
        $contraseña = "'" . $_POST['contraseña'] . "'";
        $tipo = "'" . $_POST['tipoUser'] . "'";
        //Controlamos que no haya damos reptidos
        $sesion = inicioSesion($usuario, $contraseña, $tipo);
        if ($sesion >= 1) {
            if ($_POST['tipoUser'] == "admin") {
                header('Location: ./vistaAdmin.php');
            } else if ($_POST['tipoUser'] == "registrado") {
                header('Location: ./vistaUsuario.php');
            }
        } else if ($sesion == 0) {
            echo '<p class="text-center mt-2 fs-5">Este usuario no existe</p>';
        }
    }
}
?>