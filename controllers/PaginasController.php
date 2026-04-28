<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PaginasController {
    public static function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);

        if(!$propiedad) {
            header('Location: /propiedades');
            exit;
        }

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render('paginas/blog');
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router) {
        $mensaje = null;
        $tipoMensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = array_map('trim', $_POST['contacto'] ?? []);
            $errores = self::validarContacto($respuestas);

            if(empty($errores)) {
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'sandbox.smtp.mailtrap.io';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'cc95b7132bfecb';
                    $mail->Password = '9fa95359e76b42';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 2525;

                    $mail->setFrom('admin@bienesraices.com', 'Bienes Raices');
                    $mail->addAddress('admin@bienesraices.com', 'Bienes Raices');
                    $mail->Subject = 'Nuevo mensaje desde el formulario de contacto';
                    $mail->CharSet = 'UTF-8';
                    $mail->isHTML(true);

                    $mail->Body = self::crearContenidoContacto($respuestas);
                    $mail->AltBody = self::crearContenidoTextoContacto($respuestas);

                    $mail->send();

                    $mensaje = 'Mensaje enviado correctamente';
                    $tipoMensaje = 'exito';
                } catch(Exception $e) {
                    $mensaje = 'El mensaje no se pudo enviar. Error de Mailtrap: ' . $mail->ErrorInfo;
                    $tipoMensaje = 'error';
                }
            } else {
                $mensaje = implode(' ', $errores);
                $tipoMensaje = 'error';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje,
            'tipoMensaje' => $tipoMensaje
        ]);
    }

    private static function validarContacto(array $respuestas) {
        $errores = [];

        if(empty($respuestas['nombre'])) {
            $errores[] = 'El nombre es obligatorio.';
        }

        if(empty($respuestas['mensaje'])) {
            $errores[] = 'El mensaje es obligatorio.';
        }

        if(empty($respuestas['tipo'])) {
            $errores[] = 'Selecciona una operacion.';
        }

        if(!isset($respuestas['precio']) || $respuestas['precio'] === '') {
            $errores[] = 'El precio o presupuesto es obligatorio.';
        }

        if(empty($respuestas['contacto'])) {
            $errores[] = 'Selecciona una preferencia de contacto.';
        }

        if(($respuestas['contacto'] ?? '') === 'telefono') {
            if(empty($respuestas['telefono'])) {
                $errores[] = 'El telefono es obligatorio.';
            }

            if(empty($respuestas['fecha'])) {
                $errores[] = 'La fecha de contacto es obligatoria.';
            }

            if(empty($respuestas['hora'])) {
                $errores[] = 'La hora de contacto es obligatoria.';
            }
        }

        if(($respuestas['contacto'] ?? '') === 'email') {
            if(empty($respuestas['email']) || !filter_var($respuestas['email'], FILTER_VALIDATE_EMAIL)) {
                $errores[] = 'Ingresa un email valido.';
            }
        }

        return $errores;
    }

    private static function crearContenidoContacto(array $respuestas) {
        $contenido = '<html><body>';
        $contenido .= '<h2>Nuevo mensaje desde Bienes Raices</h2>';
        $contenido .= '<p><strong>Nombre:</strong> ' . s($respuestas['nombre'] ?? '') . '</p>';
        $contenido .= '<p><strong>Mensaje:</strong> ' . nl2br(s($respuestas['mensaje'] ?? '')) . '</p>';
        $contenido .= '<p><strong>Operacion:</strong> ' . s($respuestas['tipo'] ?? '') . '</p>';
        $contenido .= '<p><strong>Precio o presupuesto:</strong> $' . s($respuestas['precio'] ?? '') . '</p>';
        $contenido .= '<p><strong>Preferencia de contacto:</strong> ' . s($respuestas['contacto'] ?? '') . '</p>';

        if(($respuestas['contacto'] ?? '') === 'telefono') {
            $contenido .= '<p><strong>Telefono:</strong> ' . s($respuestas['telefono'] ?? '') . '</p>';
            $contenido .= '<p><strong>Fecha:</strong> ' . s($respuestas['fecha'] ?? '') . '</p>';
            $contenido .= '<p><strong>Hora:</strong> ' . s($respuestas['hora'] ?? '') . '</p>';
        } else {
            $contenido .= '<p><strong>Email:</strong> ' . s($respuestas['email'] ?? '') . '</p>';
        }

        $contenido .= '</body></html>';

        return $contenido;
    }

    private static function crearContenidoTextoContacto(array $respuestas) {
        $lineas = [
            'Nuevo mensaje desde Bienes Raices',
            'Nombre: ' . ($respuestas['nombre'] ?? ''),
            'Mensaje: ' . ($respuestas['mensaje'] ?? ''),
            'Operacion: ' . ($respuestas['tipo'] ?? ''),
            'Precio o presupuesto: $' . ($respuestas['precio'] ?? ''),
            'Preferencia de contacto: ' . ($respuestas['contacto'] ?? ''),
        ];

        if(($respuestas['contacto'] ?? '') === 'telefono') {
            $lineas[] = 'Telefono: ' . ($respuestas['telefono'] ?? '');
            $lineas[] = 'Fecha: ' . ($respuestas['fecha'] ?? '');
            $lineas[] = 'Hora: ' . ($respuestas['hora'] ?? '');
        } else {
            $lineas[] = 'Email: ' . ($respuestas['email'] ?? '');
        }

        return implode(PHP_EOL, $lineas);
    }
}
