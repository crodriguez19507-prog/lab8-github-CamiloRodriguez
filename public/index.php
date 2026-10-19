<?php
/* 
   Comentario 1: Requerimos el archivo que contiene la lógica del estudiante.
   Usamos require_once para asegurar que se cargue una sola vez.
*/
require_once __DIR__ . '/../lib/estudiante.php';

# Comentario 2: Ejecutamos la función cargar_estudiante()
# Guardamos los datos extraídos del JSON en la variable $estudiante
$estudiante = cargar_estudiante();

// Comentario 3: Establecemos la zona horaria predeterminada a Panamá
// Así garantizamos que la hora que se muestre sea correcta según la instrucción
date_default_timezone_set('America/Panama');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 8 - <?php 
        # Comentario 4: Imprimimos dinámicamente el apellido en la etiqueta title
        echo $estudiante['apellido']; 
    ?></title>
</head>
<body>
    <h1>
        <?php 
            // Comentario 5: Mostramos el nombre y el apellido leídos del archivo
            // Utilizamos echo para enviar esta cadena al HTML
            echo $estudiante['nombre'] . ' ' . $estudiante['apellido']; 
        ?>
    </h1>

    <p>
        <?php
            /* 
               Comentario 6: Este bloque muestra la versión actual de PHP.
               Utilizamos la instrucción "print" en lugar de echo, tal como pide la guía.
            */
            print "Versión de PHP: " . PHP_VERSION;
        ?>
    </p>

    <p>
        <?php
            // Comentario 7: Se la fecha y hora con el formato dd/mm/aaaa HH:mm
            // En PHP, la 'd' es día, 'm' mes, 'Y' año de 4 dígitos, 'H' hora 24h e 'i' minutos.
            $fechaHora = date('d/m/Y H:i');
            
            # Comentario 8: Finalmente se imprime la variable con la fecha y hora actual.
            print "Fecha y hora: " . $fechaHora;
        ?>
    </p>
</body>
</html>