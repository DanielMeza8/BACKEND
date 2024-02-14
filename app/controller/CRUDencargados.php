<?php

    namespace controller;
    use config\Conexion;
    use PDO;
    require_once realpath('.../../vendor/autoload.php');

    class CrudEncargados {
        public static function getEncargados(){
            $query = Conexion::obtenerConexion()->prepare("SELECT * FROM t_encargados");
            if ($query->execute()) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                echo print_r($data);
                echo "<p>Consulta completada</p><br/>";
            }
            else {
                echo "error al consultar";
            }
        }

        private static function getEncargadosID($id){
            $query = Conexion::obtenerConexion()->prepare("SELECT * FROM t_encargados WHERE id_encargado=:id_encargado");
            if ($query->execute($id)) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
            }
            else {
                $data = [];
            }
            return $data;
        }

        public static function insertEncargados($data){
            $sql = "INSERT INTO t_encargados(nombre, puesto) VALUES (:nombre, :puesto)";
            $query = Conexion::obtenerConexion()->prepare($sql);
            if ($query->execute($data)) {
                echo json_encode([1, "Se agrego correctamente la info"]);
            } else {
                echo json_encode("Error la ingresar la informacion");
            }
            
        }


        public static function updateEncargados($data){
            $dataActual = self::getEncargadosID(['id_encargado'=>$data['id_encargado']]);
            $dataActual['nombre'] = array_key_exists('nombre', $data) ? $data['nombre']:$dataActual['nombre'];
            $dataActual['puesto'] = array_key_exists('puesto', $data) ? $data['puesto']:$dataActual['puesto'];
            echo print_r($dataActual);
            if(!array_key_exists('nombre', $data)) {
                $datos['nombre'] = $dataActual['nombre'];
                print_r($datos);
            }

            $consulta = "UPDATE t_encargados SET nombre=:nombre, puesto=:puesto WHERE id=:id";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if ($conexion->execute($dataActual)) {
                echo json_encode([1, "Actualizacion correcta"]);
                //Conexion::consulta();
            }else {
                echo json_encode("Error al insertar");                
            }
        }

        public static function deleteEncargado($id){
            $consulta = "DELETE FROM t_Encargados WHERE id=:id";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if ($conexion->execute($id)) {
                echo json_encode([1, "eliminacion correcta"]);
                //Conexion::consulta();
            }else {
                echo json_encode("Error al eliminar");                
            }
        }
    }



?>