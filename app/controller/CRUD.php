<?php 
    namespace controller;
    use config\Conexion;
    use PDO;
    use PDOException;
    require_once realpath('.../../vendor/autoload.php');

    class Crud {
        public static function consulta(){
            $consulta = Conexion::obtenerConexion()->prepare("SELECT * FROM animales");
            if($consulta->execute()) {
                $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                echo print_r($data);
                echo "consulta completada<br/>";
            }else {
                echo "error al consultar";
            }
        }

        private static function consultaID($id){
            $consulta= Conexion::obtenerConexion()->prepare("SELECT * FROM animales WHERE id=:id");
            if($consulta->execute($id)) {
                $data = $consulta->fetch(PDO::FETCH_ASSOC);
            }else {
                $data = [];
            }
            return $data;
        }

        public static function insert($nombre, $origen){
            $nom = $nombre;
            $pais = $origen;
            $consulta = "INSERT INTO animales(nombre, origen) VALUES (:nom,:pais)";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if (!$conexion->execute(["nom"=>$nom, ":pais"=>$pais])) {
                echo "Error al insertar el dato";
            }else {
                echo "registro creado correctamente<br/>";
                //Conexion::consulta();
                
            }
        }

        public static function insertJaku($datos){
            // $datosActuales = self::consultaID(['id'=>$datos['id']]);
            // if (array_key_exists('nombre', $datos)) {
            //     # code...
            //}
            $consulta = "INSERT INTO animales(nombre, origen) VALUES (:nombre,:origen)";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if ($conexion->execute($datos)) {
                echo json_encode([1, "insercion correcta"]);
                //Conexion::consulta();
            }else {
                echo json_encode("Error al insertar");                
            }
        }
/**
 * / $columnas = implode(", ", array_keys($parametros));
                // echo print_r($columnas);
            $datos = ":" . implode(", :", array_keys($parametros));
            // echo print_r($datos);
            $idBD = implode(array_keys($id));
            // echo print_r($idBD);
            $idUSER = implode(array_keys($id));
            echo print_r($idUSER);

            $consulta = "UPDATE $tabla SET $columnas=$datos WHERE $idBD=$idUSER";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if ($conexion->execute($parametros)) {
                echo json_encode([1, "Actualizacion correcta"]);
                //Conexion::consulta();
            }else {
                echo json_encode("Error al insertar");                
            }
 */
        public static function updateJaku($datos){
            $datosActuales = self::consultaID(['id'=>$datos['id']]);
            $datosActuales['nombre'] = array_key_exists('nombre', $datos) ? $datos['nombre']:$datosActuales['nombre'];
            $datosActuales['origen'] = array_key_exists('origen', $datos) ? $datos['origen']:$datosActuales['origen'];
            echo print_r($datosActuales);
            if(!array_key_exists('nombre', $datos)) {
                $datos['nombre'] = $datosActuales['nombre'];
                print_r($datos);
            }

            $consulta = "UPDATE animales SET nombre=:nombre, origen=:origen WHERE id=:id";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if ($conexion->execute($datosActuales)) {
                echo json_encode([1, "Actualizacion correcta"]);
                //Conexion::consulta();
            }else {
                echo json_encode("Error al insertar");                
            }
        }

        public static function deletJaku($id){
            $consulta = "DELETE FROM animales WHERE id=:id";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if ($conexion->execute($id)) {
                echo json_encode([1, "eliminacion correcta"]);
                //Conexion::consulta();
            }else {
                echo json_encode("Error al eliminar");                
            }
        }

        public static function update($id,$nombre, $origen){

            $consulta = "UPDATE animales SET nombre=:nombre, origen=:origen WHERE id=:id";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if (!$conexion->execute([":nombre"=>$nombre, ":origen"=>$origen, ":id"=>$id])) {
                echo "Error al insertar el dato";
            }else {
                echo "registro modificado correctamente<br/>";
                //Conexion::consulta();
            }
        }

        public static function delete($id){
                $consulta = "DELETE FROM animales
                    WHERE id=:id";
                $conexion = Conexion::obtenerConexion()->prepare($consulta);
                
                if(!$conexion->execute([":id" => $id])) {
                    echo "error al eliminar el registro";
                } else {
                    echo "registro elimando correctamente<br/>";
                    //Conexion::consulta();
                }
        }

        
        
    }


    //Crud::consulta();
    // //Conexion::insert("Bufalo", "india");
    // // Conexion::update(5,"perro", "mexico");
    // //Conexion::delete(4);
    // // Conexion::insertJaku(['nombre'=>'pato', 'origen'=>'españa']);
    // //Conexion::updateJaku(['id'=>1,'nombre'=>'leon', 'origen'=>'finlandia']);
    // Conexion::updateJaku(['id'=>1, 'origen'=>'PEpe']);
    // Conexion::deletJaku(['id'=>5]);
    


?>