<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {

        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $usuario->email);

                if (!$usuario || !$usuario->confirmado) {
                    Usuario::setAlerta('error', 'El usuario no existe o no está confirmado');
                } else {
                    // El usuario existe

                    if (password_verify($_POST['password'], $usuario->password)) {
                        // Iniciar sesion
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        // Redireccionar

                        header('Location: /dashboard');

                    } else {
                        Usuario::setAlerta('error', 'Password Incorrecto');

                    }

                }
            }
        }

        $alertas = Usuario::getAlertas();

        // Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesion',
            'alertas' => $alertas,

        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');

    }

    public static function crear(Router $router)
    {

        $alertas = [];
        $usuario = new Usuario();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validadCuentaNueva();
            if (empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El usuario ya se encuentra registrado');
                    $alertas = Usuario::getAlertas();
                } else {

                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el token
                    $usuario->crearToken();

                    // Crear usuario

                    $resultado = $usuario->guardar();

                    // Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);

                    $email->enviarConfirmacion();

                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }
        // Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crear tu cuenta en PlusTask',
            'usuario' => $usuario,
            'alertas' => $alertas,
        ]);
    }

    public static function olvide(Router $router)
    {

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarEmail();

            if (empty($alertas)) {
                // Buscar el usuario
                $usuario = Usuario::where('email', $usuario->email);

                if ($usuario && $usuario->confirmado) {

                    // Generar token
                    $usuario->crearToken();
                    unset($usuario->password2);

                    // Actualizar el usuario
                    $usuario->guardar();

                    // Enviar el email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    // Imprimir la alerta
                    Usuario::setAlerta('exito', 'Revisa tu correo');

                } else {
                    Usuario::setAlerta('error', 'El usuario no existe o no esta confirmado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        // Render a la vista
        $router->render('auth/olvide', [
            'titulo' => 'Olvide mi Contraseña',
            'alertas' => $alertas,
        ]);
    }

    public static function reestablecer(Router $router)
    {

        $token = s($_GET['token']);
        $mostrar = true;

        if (!$token) {
            header('Location: /');
        }

        // Identeficiar el usuario

        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            // No se encontró el usuario
            Usuario::setAlerta('error', 'Token no váldo');
            $mostrar = false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Añadir el nuevo password

            $usuario->sincronizar($_POST);

            // Valiar el password

            $alertas = $usuario->validarPassword();

            if (empty($alertas)) {
                // Hashea el nuevo password

                // Hashear el password
                $usuario->hashPassword();

                // Eliminar password2
                unset($usuario->password2);

                // Chau token
                $usuario->token = null;

                // Crear usuario

                $resultado = $usuario->guardar();

                // Redireccionar

                if ($resultado) {
                    header('Location: /');
                }

            }
        }

        $alertas = Usuario::getAlertas();

        // Render a la vista
        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer Contraseña',
            'alertas' => $alertas,
            'mostrar' => $mostrar,
        ]);
    }

    public static function mensaje(Router $router)
    {

        // Render a la vista
        $router->render('auth/mensaje', [

            'titulo' => 'Cuenta Creada Exitosamente',
        ]);
    }

    public static function confirmar(Router $router)
    {

        $token = s($_GET['token']);

        if (!$token) {
            header('Location: /');
        }

        // Encontrar al usuario del token
        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            // No se encontró el usuario
            Usuario::setAlerta('error', 'Token no váldo');
        } else {

            // Confiramr la cuenta
            $usuario->confirmado = 1;
            $usuario->token = null;
            unset($usuario->password2);

            // GUARDAR DB!!!
            $usuario->guardar();

            Usuario::setAlerta('exito', 'Cuenta Comprobada Correctamente');

        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/confirmar', [

            'titulo' => 'Cuenta Confirmada',
            'alertas' => $alertas,
        ]);

    }
}
