<?php
try {
    // definicion de variables
    $host = 'localhost';
    $db = 'db_crud';
    $username = 'labs';
    $passwd = 'labs123@';

    // Conexion a la db
    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn,$username,$passwd);
} catch (\Exception $e) {
    echo "<h3>No se puede conectar a la DB</h3>";
    echo "<h3>Mensaje: " . $e->getMessage() . "</h3>";
}
