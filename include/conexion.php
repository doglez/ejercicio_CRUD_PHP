<?php
try {
    // definicion de variables
    $host = 'localhost';
    $db = 'db_crud';
    $username = 'labs';
<<<<<<< HEAD
    $passwd = 'Labs123@';
=======
    $passwd = 'labs123@';
>>>>>>> 04220aabe9eff6d2d29b1b36ca4199202284325c

    // Conexion a la db
    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn,$username,$passwd);
} catch (\Exception $e) {
    echo "<h3>No se puede conectar a la DB</h3>";
    echo "<h3>Mensaje: " . $e->getMessage() . "</h3>";
}
