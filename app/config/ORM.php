<?php

    namespace config;
    use config\Conexion;
    
    use PDO;
    require_once realpath('.../../vendor/autoload.php');

    class ORM {


        // protected $tabla;
        // protected $idTabla;
        // protected $atributos;
        
        // function __construct()
        // {
        //     // $this->tabla = $tabla;
        //     // $this->idTabla = $idTabla;
        //     // $consulta=Conexion::obtenerConexion()->prepare("DESCRIBE $this->tabla");
        //     // $consulta->execute();
        //     // $campos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        //     // $atributos = [];
        //     // foreach($campos as $campo){
        //     //     array_push($atributos, $campo['Field']);
        //     // }
        //     // //echo print_r($atributos);
        //     // $this->atributos = $atributos;
        //     $this->atributos = $this->obtenerCampos();

        // }


        // public function obtenerCampos(){
        //     $consulta=Conexion::obtenerConexion()->prepare("DESCRIBE $this->tabla");
        //     $consulta->execute();
        //     $campos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        //     $atributos = [];
        //     foreach($campos as $campo){
        //         array_push($atributos, $campo['Field']);
        //     }
        //     //echo print_r($atributos);
        //     return $atributos;

        // }

        // public function where($campo,$valor_campo){
        //     $seleccion = $this->quey;
        //     $consulta = Conexion::obtenerConexion()->prepare("$seleccion WHERE $campo = :filtro");
        //     if($consulta->execute(['filtro'=>$valor_campo])){
        //         $data = $consulta->fetch(PDO::FETCH_ASSOC);
        //     }else{
        //         $data = [];
        //     }
        //     return $data;
        // }

        // public function all(){
        //     $seleccion = $this->quey;
        //     $consulta = Conexion::obtenerConexion()->prepare("$seleccion");
        //     if($consulta->execute()){
        //         $data = $consulta->fetch(PDO::FETCH_ASSOC);
        //     }else{
        //         $data = [];
        //     }
        //     return $data;
        // }

        // public function first(){
        //     $seleccion = $this->quey;
        //     $consulta = Conexion::obtenerConexion()->prepare("$seleccion");
        //     if($consulta->execute()){
        //         $data = $consulta->fetch(PDO::FETCH_ASSOC);
        //     }else{
        //         $data = [];
        //     }
        //     return $data;
        // }

        // public function consultaSeleccion($seleccion = ['*']) {
        //     $seleccion = implode(',',$seleccion);
        //     $this->quey = "SELECT $seleccion FROM $this->tabla";
        //     return $this;
        // }

        // public function consulta(){
        //     $query = Conexion::obtenerConexion()->prepare("SELECT * FROM $this->tabla");
        //     if ($query->execute()) {
        //         $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //         // echo print_r($data);
        //         // $id = array_values($data);
        //         // $id = $valores[0];
        //         // echo print_r($this->atributos);
        //         //echo print_r($id);
        //         //var_dump($data);
        //         // $val = $this->atributos;
        //         // $valores = array_values($val);
        //         // $id = $valores[0];
        //         // echo print_r($id);
        //         echo "<p>Consulta completada</p><br/>";
        //     }
        //     else {
        //         echo "error al consultar";
        //     }
        // }

        // public function getEncargadosID($tabla, $id){
        //     // $val = $this->atributos;
        //     // echo print_r($val);
        //     // $valores = array_values($val);
        //     // // echo print_r($valores);
        //     // $idTabla = $valores;
        //     // // echo print_r($idTabla);
        //     // $idT = implode(", ", array_keys($valores));
        //     // echo print_r($idT);
        //     //$iTabla = implode(":", array_keys($id));
        //     // echo print_r($id);
        //     $idBD = implode(", ", array_keys($id));
        //     // echo print_r($idBD);
        //     $idUSER = ":" . implode(", :", array_keys($id));
        //     // echo print_r($idUSER);
        //     $query = Conexion::obtenerConexion()->prepare("SELECT * FROM $tabla WHERE $idBD=$idUSER");
        //     if ($query->execute($id)) {
        //         $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //         // echo print_r($data);
        //     }
        //     else {
        //         $data = [];
        //     }
        //     return $data;
        // }

        // public function insert($parametros){
        //     // $argumentos = self::obtenerCampos($tabla);
        //     // $ag = array_shift($argumentos);
        //     $temp = array();
        //     foreach ($this->atributos as $valor){
        //         if ($this->idTabla != $valor) {
        //             array_push($temp, $valor);
        //         }
        //     }
        //     // $temp = $this_>atributos;
        //     // $columnas = implode(", ", array_keys($parametros));

        //     $propiedades = implode(",", $temp);
        //     $propiedades_key = ":" . implode("", $temp);
        //     // echo print_r($columnas);
        //     $datos = ":" . implode(", :", array_keys($parametros));
        //     $sql = "INSERT INTO $this->tabla ($columnas) VALUES ($datos)";
        //     $query = Conexion::obtenerConexion()->prepare($sql);
        //     if ($query->execute($parametros)) {
        //         echo json_encode([1, "Se agrego correctamente la info"]);
        //     } else {
        //         echo json_encode("Error la ingresar la informacion");
        //     }
            
        // }
        // public function consultaParametros($parametros = []){
        //     try {
        //         $atributosTabla = array_keys($this->atributos);
        //         // echo print_r($atributosTabla);
        //         $datosParametros = implode(", ", array_keys($parametros));
        //         // echo print_r($datosParametros);
        //         $datosBD = ":" . implode(", :", array_keys($parametros));
                
        //         if($parametros == null){
        //             $query = Conexion::obtenerConexion()->prepare("SELECT * FROM $this->tabla");
        //         // } else if(!in_array($parametros, $atributosTabla)){
        //         //     echo "hubo un error al relizar la petición";
        //         // }
        //         }
        //         else{
        //             $query = Conexion::obtenerConexion()->prepare("SELECT * FROM $this->tabla WHERE $datosParametros=$datosBD");
        //         }


        //         if ($query->execute($parametros)) {
        //             $data = $query->fetchAll(PDO::FETCH_ASSOC);
        //             echo print_r($data);
        //             // echo '<br/>';
        //             // echo print_r(array_values($atributosTabla));
        //         }
        //         else {
        //             $data = [];
        //         }
        //         return $data;
        //     } catch (\Throwable $th) {
        //         echo "se produjo un error";
        //     }

        // }


        // public function update($id, $parametros){
        //     //$dataActual = self::getEncargadosID($tabla,$id);
        //     $columnas = implode("=?, ", array_keys($parametros)) . "=?";
        //     $datos = array_values($parametros);
        //     $idColumna = key($id);
        //     $idValor = $id[$idColumna];
            
        //     $consulta = "UPDATE $this->tabla SET $columnas WHERE $idColumna=?";
        //     $datos[] = $idValor;
            
        //     $conexion = Conexion::obtenerConexion()->prepare($consulta);
        //     if ($conexion->execute($datos)) {
        //         echo json_encode([1, "Actualizacion correcta"]);
        //     } else {
        //         echo json_encode("Error al actualizar");
        //     }

        // }

        // public function delete($id){
        //     $consulta = "DELETE FROM $this->tabla WHERE id=:id";
        //     $conexion = Conexion::obtenerConexion()->prepare($consulta);
        //     if ($conexion->execute($id)) {
        //         echo json_encode([1, "eliminacion correcta"]);
        //         //Conexion::consulta();
        //     }else {
        //         echo json_encode("Error al eliminar");                
        //     }
        // }
        protected $query;
        protected $tabla;
        protected $id_tabla;
        protected $consulta;
        protected $atributos;
        protected $contadorWhere;
        function __construct(){
            $this->atributos = $this->atributos_tabla();        
        }
  
        private function atributos_tabla(){
            try {
                $consulta = Conexion::obtenerConexion()->prepare("DESCRIBE $this->tabla");
                $consulta->execute();
                $campos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                $atributos = [];
                foreach($campos as $campo){
                    array_push($atributos,$campo['Field']);              
                }
                return $atributos; 
            } catch (\Throwable $th) {
                return $atributos;
            }       
        }


        public function whereWhere($campo,$valor_campo, $campo2="", $valor_campo2=""){
            $queryFinal = $this->query;
            // $consulta = Conexion::obtenerConexion()->prepare("$queryFinal WHERE $campo = :filtro");

            if ($valor_campo2 == "" && $campo2 == "") {
                $consulta = Conexion::obtenerConexion()->prepare("$queryFinal WHERE $campo = :filtro");
                if($consulta->execute(['filtro'=>"$valor_campo"])){
                    $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    echo print_r($data);
                }else{
                    $data = [];
                }
            } else {
                $consulta = Conexion::obtenerConexion()->prepare("$queryFinal WHERE $campo = :filtro AND $campo2 = :filtro2 ");
                
                if($consulta->execute(['filtro'=>"$valor_campo", 'filtro2'=>"$valor_campo2"])){
                    $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    echo print_r($data);
                }else{
                    $data = [];
                }
            }          
            return $data;
        }

        public function offset($offset = ""){
            try {
                $queryFinal = $this->query;
                if ($offset == "") {
                    $offset = 1;
                    $this->query = "$queryFinal OFFSET $offset";
                    return $this;
                } else {
                    $this->query = "$queryFinal OFFSET $offset";
                    return $this;
                }
            } catch (\Throwable $th) {
                return $th;
            }
        }
        
        public function limit($limite = ""){
            try {
                $queryFinal = $this->query;
                if ($limite == "") {
                    $limite = 100;
                    $this->query = "$queryFinal LIMIT $limite";
                    return $this;
                } else {
                    $this->query = "$queryFinal LIMIT $limite";
                    return $this;
                }
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function like($like = ""){
            try {
                $queryFinal = $this->query;
                if ($like == "") {
                    $like = 100;
                    $this->query = "$queryFinal LIKE '$like'";
                    return $this;
                } else {
                    $this->query = "$queryFinal LIKE '$like'";
                    return $this;
                }
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function where($campo,$valor_campo = "", $tipo="AND"){
            $queryFinal = $this->query;
            
            if ($valor_campo == "") {
                $this->query = "$queryFinal WHERE $campo";
                $this->contadorWhere++;
                return $this;
            } else {
                if ($this->contadorWhere > 0) {
                    $this->query = "$queryFinal ".($tipo != "AND" ? 'OR' : $tipo)." $campo = '$valor_campo'";
                }else {
                    $this->query = "$queryFinal WHERE $campo = '$valor_campo'";
                }
                
                $this->contadorWhere++;
                return $this;
            }

        }

        public function all(){
            $queryFinal = $this->query;
            $consulta = Conexion::obtenerConexion()->prepare($queryFinal);
            if($consulta->execute()){
                $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                echo print_r($data);
            }else{
                $data = [];
            }    
            return $data;        
        }
        public function first(){
            try {
                $queryFinal = $this->query;
                $consulta = Conexion::obtenerConexion()->prepare($queryFinal);
                if($consulta->execute()){
                    $data = $consulta->fetch(PDO::FETCH_ASSOC);
                }else{
                    $data = [];
                }    
                return $data; 
            } catch (\Throwable $th) {
                return $th;
            }       
        }

        public function get(){
            try {
                $queryFinal = $this->query;
                $consulta = Conexion::obtenerConexion()->prepare($queryFinal);
                return print_r($consulta->execute());
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function consulta($seleccion = ['*']){
            try {
                $seleccion = implode(',',$seleccion);
                $this->query = "SELECT * FROM $this->tabla";
                return  $this;
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function count($seleccion){
            try {
                
                $this->query = "SELECT count($seleccion) FROM $this->tabla";
                return $this;
                
                
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function min($seleccion){
            try {
                
                $this->query = "SELECT MIN($seleccion) FROM $this->tabla";
                return $this;
                
                
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function max($seleccion){
            try {
                
                $this->query = "SELECT MAX($seleccion) FROM $this->tabla";
                return $this;
                
                
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function sum($seleccion){
            try {
                
                $this->query = "SELECT SUM($seleccion) FROM $this->tabla";
                return $this;
                
                
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function avg($seleccion){
            try {
                
                $this->query = "SELECT AVG($seleccion) FROM $this->tabla";
                return $this;
                
                
            } catch (\Throwable $th) {
                return $th;
            }
        }



        public function insert($datos){
            try {
                $temp = array();
                foreach($this->atributos as $valor){
                    if($this->id_tabla != $valor){
                        array_push($temp,$valor);                    
                    }
                }
                $propiedades = implode(",", $temp);
                $propiedades_key = ":" . implode(", :", $temp);
                $consulta = Conexion::obtenerConexion()->prepare("INSERT INTO $this->tabla ($propiedades) VALUES ($propiedades_key)");
                return $consulta->execute($datos);
            } catch (\Throwable $th) {
                return $th;
            }
        }
        
        
        public function updateDinamico($datos){
            try {
                $queryBloque = [];
                foreach(array_keys($datos) as $key ){
                    if($this->id_tabla != $key){
                        array_push($queryBloque,$key.'='."'$datos[$key]'");
                    }
                }
                $queryBloque = implode(', ',$queryBloque);
                // $consulta = Conexion::obtenerConexion()->prepare("UPDATE $this->tabla SET $query WHERE $this->id_tabla = :$this->id_tabla");
                $this->query = "UPDATE $this->tabla SET $queryBloque";
                return $this;
            } catch (\Throwable $th) {
                return $th;
            }
        }


        public function update($datos){
            try {
                $query = [];
                foreach(array_keys($datos) as $key ){
                    if($this->id_tabla != $key){
                        array_push($query,$key.'=:'.$key);
                    }
                }
                $query = implode(', ',$query);
                $consulta = Conexion::obtenerConexion()->prepare("UPDATE $this->tabla SET $query WHERE $this->id_tabla = :$this->id_tabla");
                return $consulta->execute($datos);
            } catch (\Throwable $th) {
                return $th;
            }
        }
        
        public function delete($id){
            try {
                $consulta = Conexion::obtenerConexion()->prepare("DELETE FROM $this->tabla WHERE $this->id_tabla = :$this->id_tabla");
                return $consulta->execute($id);
            } catch (\Throwable $th) {
                return $th;
            }
        }
        public function deleteDinamico(){
            // $consulta = Conexion::obtener_conexion()->prepare("DELETE FROM $this->tabla WHERE $this->id_tabla = :$this->id_tabla");
            // $consulta->execute($id);
            try {
                $this->query = "DELETE FROM $this->tabla";
                return $this;
            } catch (\Throwable $th) {
                return $th;
            }
        }
    }



?>