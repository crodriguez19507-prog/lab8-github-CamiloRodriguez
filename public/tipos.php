<?php
// 3.1 Cabecera, constantes y datos
declare(strict_types=1);

define('SEMILLA_LAB8', 'WEB2026-L8');
const LAB_NUMERO = 8;

require_once __DIR__ . '/../lib/estudiante.php';
$est = cargar_estudiante();

// 3.2 Valores únicos calculados con mi cédula
// Generamos la huella concatenando la cédula, el separador '|' y la constante SEMILLA_LAB8
$huella = hash('sha256', $est['cedula'] . '|' . SEMILLA_LAB8);

// Extracción y cálculo según las posiciones indicadas en la guía
$codigo = (string) substr($huella, 0, 8);                                  // Los primeros 8 caracteres
$n1     = (int) (hexdec(substr($huella, 8, 2)) % 90 + 10);                 // Caracteres 8 y 9 (longitud 2)
$n2     = (int) (hexdec(substr($huella, 10, 2)) % 90 + 10);                // Caracteres 10 y 11 (longitud 2)
$precio = (float) round(hexdec(substr($huella, 12, 4)) / 100, 2);          // Caracteres 12 a 15 (longitud 4)
$activo = (bool) ($n1 % 2 === 0);                                          // Verdadero si $n1 es par

// Cálculos matemáticos
$suma     = $n1 + $n2;
$division = round($n1 / $n2, 2);
$resto    = $n1 % $n2;
$cociente = intdiv($n1, $n2);

// Otras variables solicitadas
$nulo  = null;
$lista = [1, 2, 3];

// --- 3.3 Tipos de datos y conversión de tipos ---

// Mostrar variables con var_dump
var_dump($codigo, $n1, $precio, $activo, $nulo, $lista);

// Expresiones de type juggling y comentarios explicativos
// El operador "+" convierte strings a números para sumar matemáticamente
$suma_str = "5" + "10"; 

// El operador "." se usa estrictamente para concatenar texto
$concat   = "5" . "10"; 

// El casting (int) lee los números al inicio y descarta el texto "abc"
$cast_int = (int) "12abc"; 

// Falso debido a la imprecisión de punto flotante en memoria (0.30000000000000004 != 0.3).
$float_eq = (0.1 + 0.2 == 0.3); 

// Verdadero. == compara el valor matemático y PHP interpreta "1e1" como notación científica (10).
$loose    = ("10" == "1e1"); 

// Falso. === compara valor Y tipo. Como strings, "10" y "1e1" no son exactamente iguales caracter por caracter.
$strict   = ("10" === "1e1"); 


// --- Salida final para el autograde ---

// Construir el arreglo asociativo con la estructura exacta
$resultado = [
    'codigo'   => $codigo,
    'n1'       => $n1,
    'n2'       => $n2,
    'suma'     => $suma,
    'division' => $division,
    'resto'    => $resto,
    'cociente' => $cociente,
    'precio'   => $precio,
    'activo'   => $activo,
    'tipos'    => [
        'codigo' => gettype($codigo),
        'n1'     => gettype($n1),
        'precio' => gettype($precio),
        'activo' => gettype($activo),
        'nulo'   => gettype($nulo),
        'lista'  => gettype($lista)
    ],
    'juggling' => [
        'suma_str' => $suma_str,
        'concat'   => $concat,
        'cast_int' => $cast_int,
        'float_eq' => $float_eq,
        'loose'    => $loose,
        'strict'   => $strict
    ],
    'constantes' => [
        'SEMILLA_LAB8' => constant('SEMILLA_LAB8'),
        'LAB_NUMERO'   => LAB_NUMERO,
        // Devuelve false (o lanza un warning ocultado por el @) porque una constante, por definición, no puede cambiar su valor una vez definida.
        'redefinir'    => @define('SEMILLA_LAB8', 'otra') 
    ]
];

// Imprimir la única línea final
echo "\n##JSON## " . json_encode($resultado) . "\n";