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