<?php

class MensajesController extends Controller
{
    public function index()
    {
        // Carga la vista con el formulario
        $this->view('mensajes/crear');
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $mensaje = $_POST['mensaje'] ?? '';
            $hora_envio = $_POST['hora_envio'] ?? '';

            // Validaciones mínimas
            if ($nombre && $telefono && $mensaje && $hora_envio) {
                $modelo = $this->model('Mensaje');
                $resultado = $modelo->guardarMensaje($nombre, $telefono, $mensaje, $hora_envio);

                if ($resultado) {
                    echo "<p style='text-align:center;'>✅ Mensaje guardado correctamente.</p>";
                } else {
                    echo "<p style='text-align:center;color:red;'>❌ Error al guardar el mensaje.</p>";
                }
            } else {
                echo "<p style='text-align:center;color:red;'>❌ Todos los campos son obligatorios.</p>";
            }
        } else {
            echo "Acceso no válido.";
        }
    }
}
