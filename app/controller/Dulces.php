<?php 

    namespace controller;
    use model\TDulces;
use model\TFrutas;

    require_once realpath('.../../vendor/autoload.php');


    class Dulces {
        public static function getData(){
            $dulce = new TDulces();
            return json_encode($dulce->consulta());
        }

        public static function insertData(){
            $dulce = new TDulces();
            return json_encode($dulce->insert(['nombre'=>'Mazapan', 'marca'=>'De la Rosa', 'precio'=>9]));
        }

        public static function updateData() {
            $dulce = new TDulces();
            return json_encode($dulce->update(['id_dulce'=>1], ['nombre'=>'Mazapan', 'marca'=>'De la Rosa', 'precio'=>9]));
        }


        public static function deleteData() {
            $fruta = new TFrutas();
            return json_encode($fruta->delete(['id_dulce'=>1]));
        }
    }

?>