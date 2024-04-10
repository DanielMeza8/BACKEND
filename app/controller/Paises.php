<?php

    namespace controller;
    use model\t_paises;

    require_once realpath('.../../vendor/autoload.php');


    class Paises {
        public static function getData() {
            $datos = new t_paises;
            return json_encode($datos->consulta());
        }


        public static function insertData() {
            $datos = new t_paises;
            return json_encode($datos->insert(['nombre'=>'mexico', 'capital'=>'cdmx', 'habitantes'=>'1500000', 'idioma'=>'espanol']));
        }

        public static function updateData() {
            $datos = new t_paises;
            return json_encode($datos->update(['id_pais'=>1],['habitantes'=>'15000000', 'idioma'=>'español']));
        }


        public static function deleteData() {
            $datos = new t_paises;
            return json_encode($datos->delete(['id_pais'=>1]));
        }
    }

?>