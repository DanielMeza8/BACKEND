<?php 
    // Se ocupa la POO en el backend para generar más 
    // el enacapsulamieto se refiere a volverlo privado que solo pertenece a esa clase

    // un token es una llave generado con la data de un usuario

    // app ---> procesos generales del sistemas
    // config --> fragamentos de codigo que son estaticos

    // terminar CRUD 

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


        public static function getAnimals(){
            Conexion::obtenerConexion();
            $animal = self::$conexion->query("SELECT * FROM animales");
            while ($row = $animal->fetch()) {
                echo $row['id']." ".$row['nombre']." ".$row['origen']."<br />\n";
                
                Conexion::cerrarConexion();
            }
            
        }
    }

    Conexion::getAnimals();

?>