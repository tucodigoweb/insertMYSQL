<?php
//Recibimos los datos

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$nombre=$_POST["nombre"];
$telefono=$_POST["telefono"];
$mensaje=$_POST["mensaje"];



$host = 'localhost';
$db   = 'formulario';
$user = 'root';
$pass = '';
$port = "";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$pdo = new \PDO($dsn, $user, $pass, $options);

$data = [
    'nombre' => $nombre,
    'telefono' => $telefono,
    'mensaje' => $mensaje,
];

$sql = "INSERT INTO solicitud (nombre, telefono, mensaje) VALUES (:nombre, :telefono, :mensaje)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);

echo "Sus datos fueron registrados con éxito";


?>