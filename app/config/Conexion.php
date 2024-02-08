<?php 
    // Se ocupa la POO en el backend para generar más 
    // el enacapsulamieto se refiere a volverlo privado que solo pertenece a esa clase

    // un token es una llave generado con la data de un usuario

    // app ---> procesos generales del sistemas
    // config --> fragamentos de codigo que son estaticos

    // terminar CRUD 

use PSpell\Config;

use function PHPSTORM_META\elementType;

    require_once realpath('../../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable('../../');
    $dotenv->load();
    // asi se crea un avariable constante define ( nombre d el avariable, de donde lo extrayemos la variable);
    define('SERVIDOR', $_ENV['HOST']);
    define('USUARIO', $_ENV['USUARIO']);
    define('PASSWORD', $_ENV['PASSWORD']);
    define('BD', $_ENV['BD']);
    
    class Conexion {

        // se utiliza static para salta la creacion d el ibjeto

        private static $conexion;

        public static function abrirConexion() {
            // isset s eutiliza para saber si una variable sta definida o no es nula
            // self se utiliza para invocar a variables estaticas
            if (!isset(self::$conexion)) {
                try{
                    self::$conexion = new PDO('mysql:host='.SERVIDOR.';dbname='.BD,USUARIO,PASSWORD);
                    self::$conexion->exec('SET CHARACTER SET utf8');
                    return self::$conexion;
                }catch(PDOException $e){
                    echo "error en la conexion: " . $e;
                    die(); // se encarga de matar el programa
                }
            }else{
                return self::$conexion;
            }
        }


        public static function obtenerConexion(){
            $conexion = self::abrirConexion();
            return $conexion;
        }

        public static function cerrarConexion() {
            self::$conexion = null;// cerrando conexion
        }


        // public static function getAnimals(){
        //     Conexion::obtenerConexion();
        //     $animal = self::$conexion->query("SELECT * FROM animales");
        //     while ($row = $animal->fetch()) {
        //         echo $row['id']." ".$row['nombre']." ".$row['origen']."<br />\n";
                
        //         Conexion::cerrarConexion();
        //     }
            
        // }

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

        public static function insert($nombre, $origen){
            $nom = $nombre;
            $pais = $origen;
            $consulta = "INSERT INTO animales(nombre, origen) VALUES (:nom,:pais)";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if (!$conexion->execute(["nom"=>$nom, ":pais"=>$pais])) {
                echo "Error al insertar el dato";
            }else {
                echo "registro creado correctamente<br/>";
                Conexion::consulta();
                
            }
        }

        public static function update($id,$nombre, $origen){

            $consulta = "UPDATE animales SET nombre=:nombre, origen=:origen WHERE id=:id";
            $conexion = Conexion::obtenerConexion()->prepare($consulta);
            if (!$conexion->execute([":nombre"=>$nombre, ":origen"=>$origen, ":id"=>$id])) {
                echo "Error al insertar el dato";
            }else {
                echo "registro modificado correctamente<br/>";
                Conexion::consulta();
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
                    Conexion::consulta();
                }
        }
        
    }


    Conexion::consulta();
    //Conexion::insert("Bufalo", "india");
    Conexion::update(5,"perro", "mexico");
    //Conexion::delete(4);

?>