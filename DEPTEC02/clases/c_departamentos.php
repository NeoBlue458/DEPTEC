<?php
// === INCLUSIONES NECESARIAS ===
// Incluye las variables de conexión de tu archivo 'config.php'
// Usamos la ruta relativa para salir de 'clases/' y entrar a 'methods/'
include '../methods/config.php'; 

// === CLASE DE CONEXIÓN (C_Conexion) ===
class C_Conexion {
    public static function conexionBD() {
        global $servidor, $usuario, $pass, $basedatos;
        
        $host = $servidor; 
        $dbName = $basedatos;
        $userName = $usuario;
        $password = $pass;

        try {
            // Cadena de conexión PDO (MySQL)
            $con = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $userName, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            // No mostrar detalles sensibles en producción
            echo "No se logró Conectar a la base de datos. Error: " . $e->getMessage();
            return null;
        }
    }
}

// === CLASE DE DEPARTAMENTOS (C_Departamentos) ===
// Esta clase ahora puede usar C_Conexion porque está definida arriba
class C_Departamentos {
    
    // R: Mostrar Registros
    public static function MostrarDepartamentos() {
        // Llama a la conexión definida arriba
        $con = C_Conexion::conexionBD(); 
        if (!$con) return [];
        
        $query = "SELECT id_departamento, nombre_D, amueblado, precio FROM departamento ORDER BY id_departamento ASC";
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // C: Insertar Nuevo Departamento
    public static function InsertarDepartamento($datos) {
        $con = C_Conexion::conexionBD();
        if (!$con) return false;
        
        $query = "INSERT INTO departamento (nombre_D, amueblado, precio) VALUES (?, ?, ?)";
        $stmt = $con->prepare($query);
        
        $result = $stmt->execute([
            $datos['nombre'], 
            $datos['amueblado'], 
            $datos['precio']
        ]);
        
        return $result;
    }

    // U: Obtener Registro por ID
    public static function ObtenerDepartamentoPorId($id) {
        $con = C_Conexion::conexionBD();
        if (!$con) return null;

        $query = "SELECT id_departamento, nombre_D, amueblado, precio FROM departamento WHERE id_departamento = ?";
        $stmt = $con->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // U: Modificar Departamento
    public static function ModificarDepartamento($datos) {
        $con = C_Conexion::conexionBD();
        if (!$con) return false;

        $query = "UPDATE departamento SET nombre_D = ?, amueblado = ?, precio = ? WHERE id_departamento = ?";
        $stmt = $con->prepare($query);

        $result = $stmt->execute([
            $datos['nombre'], 
            $datos['amueblado'], 
            $datos['precio'], 
            $datos['id']
        ]);

        return $result;
    }

    // D: Eliminar Departamento
    public static function EliminarDepartamento($id) {
        $con = C_Conexion::conexionBD();
        if (!$con) return false;

        $query = "DELETE FROM departamento WHERE id_departamento = ?";
        $stmt = $con->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>