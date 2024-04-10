<?php 

    namespace controller;
    use model\TFrutas;

    class Frutas {
        public static function getData() {
            $fruta = new TFrutas();
            return json_encode($fruta->consulta());
        }

        public static function insertData() {
            $fruta = new TFrutas();
            return json_encode($fruta->insert(['nombre'=>'Manzana', 'categoria'=>'fruta', 'precio'=>50]));
        }

        public static function updateData() {
            $fruta = new TFrutas();
            return json_encode($fruta->update(['id_fruta'=>1], ['categoria'=>'fruta de todo el year', 'precio'=>45]));
        }

        public static function deleteData() {
            $fruta = new TFrutas();
            return json_encode($fruta->delete(['id_fruta'=>1]));
        }
    }


?>