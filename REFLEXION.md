# Reflexión (Etapa 4)

Responde con tus palabras (mínimo 40 palabras por respuesta). Ver README, Etapa 4.

## Pregunta 1
Código personal y tipos de datos: Mi código personal de estudiante generado es "07fc85a7". Al revisarlo con la función gettype(), el sistema indica que es un dato de tipo "string" o cadena de texto. Esto ocurre porque la función substr() siempre recorta secuencias y devuelve texto, independientemente de si hay números adentro. Si intentara usar este código alfanumérico en una suma matemática, PHP intentaría aplicar "type juggling" o conversión de tipos automática, y generaría un error o advertencia en mi versión de PHP, ya que contiene letras y no es un número bien formado.

## Pregunta 2
Decimales, precisión y división: La variable $precio aparece como double y no como float en gettype() debido a que en PHP ambos términos representan exactamente el mismo tipo de número decimal internamente. La comparación 0.1 + 0.2 == 0.3 resulta falsa porque los números decimales sufren pérdidas minúsculas de precisión al procesarse en memoria binaria. Por otro lado, la variable $n1 es un "integer" número entero. Al dividir enteros, usar la barra / puede devolver un decimal si la división no es exacta, mientras que la función intdiv() descarta cualquier residuo y garantiza que el resultado sea estrictamente un tipo entero.

## Pregunta 3
Constantes y el servidor: La diferencia principal radica en cuándo se evalúan const es una estructura nativa del lenguaje que se procesa en tiempo de compilación, mientras que define() es una función que se ejecuta dinámicamente en tiempo de ejecución. En mi instalación local, donde utilizo la versión de PHP 8.2.12 sirviendo a través de Apache, al intentar sobrescribir el valor en la clave "redefinir", el sistema devolvió false , y ocultó la advertencia gracias al símbolo @. Esto demuestra que una constante, por su propia naturaleza y definición, está blindada y no permite que su valor sea modificado una vez declarada.
