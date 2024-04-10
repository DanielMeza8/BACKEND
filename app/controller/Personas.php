<?php

    namespace controller;
    use model\TablaPersona;
    require_once realpath('.../../vendor/autoload.php');
    

    class Personas{
        
        public static function obtener_datos_like(){
            $persona = new TablaPersona();
            return json_encode($persona->consulta()->where('nombre')->like('_a%')->all());
        }
        public static function obtener_datos_avg(){
            $persona = new TablaPersona();
            return json_encode($persona->avg('id')->all());
        }

        public static function obtener_datos_sum(){
            $persona = new TablaPersona();
            return json_encode($persona->sum('id')->all());
        }

        public static function obtener_datos_min(){
            $persona = new TablaPersona();
            return json_encode($persona->min('id')->all());
        }


        public static function obtener_datos_max(){
            $persona = new TablaPersona();
            return json_encode($persona->max('id')->all());
        }


        public static function obtener_datos_limit(){
            $persona = new TablaPersona();
            return json_encode($persona->consulta()->limit(5)->offset(2)->all());
        }

        public static function obtener_datos_count(){
            $persona = new TablaPersona();
            return json_encode($persona->count('origen')->where('nombre', 'lemur')->all());
        }
        
        public static function obtener_datos(){
            $persona = new TablaPersona();
            return json_encode($persona->consulta()->where('nombre', 'lemur')->all());
        }

        public static function insertar_datos(){
            $persona = new TablaPersona();
            return json_encode($persona->insert(['nombre'=>'lemur', 'origen'=>'tanzania']));
        }

        public static function actualizar_datos(){
            $persona = new TablaPersona();
            return json_encode($persona->update(['nombre'=>'ballena jorobada'],['origen'=>'Argentina'] ));
        }

        public static function actualizar_dinamico(){
            $persona = new TablaPersona();
            // return $persona->updateDinamico(['origen'=>'desconocido'])->where('id'=>'9');
            return $persona->updateDinamico(['origen'=>'desconocido'])->where('id' , '9');

        }

        public static function getDataParametros(){
            $persona = new TablaPersona();
            return json_encode(($persona->consulta(['nombre'=>'ballena jorobada'])));
        }

        public static function deletedinamico() {
            $persona = new TablaPersona();
            return $persona->deleteDinamico()->where('id','16')->get();
        }

        public static function getWhereWhere(){
            $persona = new TablaPersona();
            return $persona->consulta()->whereWhere('nombre', 'lemur');
        }
    }
?>