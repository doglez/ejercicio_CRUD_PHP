<?php
// Funcion para cargar las paginas
function CargarPagina($page)
{
    if (isset($_GET['page'])) {
        $modulo = $_GET['page'] . ".php";
        if (file_exists($modulo)) {
            $page = $_GET['page'];
        } else {
            $page = '404';
        }
    } else {
        $page = 'leer';
    }
    return include($page . ".php");
}

// Funcion para mostrar todos los libros, autores y disponibilidad
function MostrarLibros()
{
    // conexion a la db
    require 'include/conexion.php';
    // Prepare Consulta
    $query = 'SELECT * FROM libros';
    $stmt = $pdo->prepare($query);

    // Ejecutar la consulta
    $stmt->execute();

    // Almacenar el dato en un array
    $resultado = $stmt->fetchAll();
    
    // Cerrar conexion
    $stmt = null;
    $pdo = null; 

    return $resultado;
}

// funcion para cargar nuevos libros a la db
function NuevoLibro($titulo, $autor, $disponible)
{
    // conexion a la db
    require 'include/conexion.php';    
    
    // Validar si recibimos datos por POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recolecta de variables metodo POST
        $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
        $autor = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
        $disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;

        // preparacion de la consulta para insertar datos
        $query = 'INSERT INTO libros (titulo,autor,disponibilidad) VALUES (:titulo, :autor, :disponible)';
        $stmt = $pdo->prepare($query);

        // Ejecucion del INSERT de datos
        $stmt->execute(
            array(
                'titulo'=>$titulo,
                'autor'=>$autor,
                'disponible'=>$disponible
            )
        );

        // redireccionamiento a leer.php
        return header('Location: index.php?page=leer');
    }
    // Cerrar conexion
    $stmt = null;
    $pdo = null; 
}

// funcion para modificar un libro en la db
function ModificarLibro($codigo, $titulo, $autor, $disponible)
{   
    // conexion a la db
    require 'include/conexion.php'; 

    // Validar si se reciben datos por POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Preparar el update 
        $query = 'UPDATE libros SET titulo = :titulo, autor = :autor, disponibilidad = :disponible WHERE codigo = :codigo';
        $stmt = $pdo->prepare($query);

        // Ejecutar el update
        $stmt->execute(
            [
                'codigo'=>$codigo,
                'titulo'=>$titulo,
                'autor'=>$autor,
                'disponible'=>$disponible
            ]
        );
        
        header('Location: index.php?page=leer');
    } else {
        // Preparar el SELECT
        $query = 'SELECT * FROM libros WHERE codigo = :codigo';
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            [
                'codigo'=>$codigo
            ]
        );
    }
    $libro = $stmt->fetch();

    // Cerrar conexion
    $stmt = null;
    $pdo = null; 
    return $libro;
}

// funcion para eliminar un libro de la db
function ConfirmarBorrarLibro($codigo)
{
    // conexion a la db
    require 'include/conexion.php';

    // Validacion de variables
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
    // Prepare Consulta
    $query = "SELECT * FROM libros WHERE codigo = $codigo";
    $stmt = $pdo->prepare($query);

    // Ejecutar la consulta
    $stmt->execute();

    // Almacenar el dato en un array
    $resultado = $stmt->fetchAll();
    
    // Cerrar conexion
    $stmt = null;
    $pdo = null; 

    return $resultado;    
}

// Funcion que confirma el borrado
function BorrarLibro($confirmar, $codigo)
{
    // conexion a la db
    require 'include/conexion.php';

    // Validacion de variables
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    $confirmar = isset($_GET['confirmar']) ? $_GET['confirmar'] : null;    

    if ($confirmar == 1) {
        // preparacion de la consulta para borrar datos
        $query = "DELETE FROM libros WHERE codigo = $codigo";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'codigo' => $codigo
        ]);
        // redireccionamiento a leer.php
        return header('Location: index.php?page=leer');
    }
    // Cerrar conexion
    $stmt = null;
    $pdo = null; 

}