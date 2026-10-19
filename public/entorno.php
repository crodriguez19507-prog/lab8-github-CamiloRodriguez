<?php
declare(strict_types=1);
require_once __DIR__ . '/../lib/estudiante.php';

$est = cargar_estudiante();
$cfg = require __DIR__ . '/../config/db.php';

// Completamos la conexión usando las claves que definiste en db.php:
$db = new mysqli($cfg['host'], $cfg['user'], $cfg['pass'], $cfg['name'], (int) $cfg['port']);

// Si NO es consola, avisa que la respuesta es JSON:
if (PHP_SAPI !== 'cli') { header('Content-Type: application/json; charset=utf-8'); }

// Arreglo con las 9 claves exactas que pide la tabla:
$datos = [
    'php_version' => PHP_VERSION,
    'sapi'        => php_sapi_name(),
    'os_family'   => PHP_OS_FAMILY,
    'servidor'    => $_SERVER['SERVER_SOFTWARE'] ?? 'cli',
    'mysqli'      => extension_loaded('mysqli'),
    'db_version'  => $db->query('SELECT VERSION()')->fetch_row()[0],
    'db_nombre'   => $db->query('SELECT DATABASE()')->fetch_row()[0],
    'filas'       => (int) $db->query('SELECT COUNT(*) FROM estudiantes')->fetch_row()[0],
    'token'       => substr(hash('sha256', $est['cedula']), 0, 10)
];

// Imprimir el único JSON
echo json_encode($datos, JSON_PRETTY_PRINT);