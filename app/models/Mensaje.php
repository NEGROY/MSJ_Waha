<?php

class Mensaje extends Model
{
    public function guardarMensaje($nombre, $telefono, $mensaje, $hora_envio)
    {
        try {
            $sql = "INSERT INTO mensajes (nombre, telefono, mensaje, fecha_envio) 
                    VALUES (:nombre, :telefono, :mensaje, :hora_envio)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':nombre' => $nombre,
                ':telefono' => $telefono,
                ':mensaje' => $mensaje,
                ':hora_envio' => $hora_envio
            ]);
        } catch (PDOException $e) {
            // Log o imprimir error en desarrollo
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
