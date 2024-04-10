<?php 
    
    use controller\Personas;
    use controller\Paises;
    // use controller;
    // $dotenv = Dotenv\Dotenv::createImmutable('./');
    require_once realpath('./vendor/autoload.php');
    require_once './app/config/Config.php';


    //$dotenv->load();   
    // echo $_ENV['VARIABLE_DE_ENTORNO'];
   
    // echo $_ENV['USUARIO'];
   
    // echo $_ENV['PASSWORD'];
   
    // echo $_ENV['HOST'];
    //CRUD::consulta();
    //echo "<br/><br/>";
    //CrudEncargados::getEncargados()
//    //CrudEncargados::obtenerCampos('t_encargados');
//    $crud = new CrudEncargados('t_encargados', 'idEncargado');
// //    $crud->getEncargados();
// // ->obtenerCampos('t_encargados');

// // $newData = array(
// //     'nombre' => "test4", 
// //     'puesto' => "test4"
// // );
// // $crud->insertEncargados('t_encargados', $newData);

// // $newData = array(
// //     'nombre' => "test4", 
// //     'origen' => "test4"
// // );
// // $crud->insertEncargados('animales', $newData);

// // $crud->getEncargados('animales');+
// // */
// $updateID = array(
//     'id_encargado' => 8
// );

// $updateData = array(
//     'puesto' => "dueña"
// );

// $updateNEWID = array(
//     'id' => 7
// );

// $updateNEWData = array(
//     'origen' => "mexico",
// );
// // $crud->getEncargadosID('animales', $updateID);
// //$crud->getEncargadosID('animales', $consultaTablaID);
// $crud->updateEncargados($updateID, $updateData);
//*///
    
    // Personas::obtener_datos();
    // Personas::obtener_datos_count();
    // Personas::obtener_datos_limit();
    // Personas::obtener_datos_count() ;
    // Personas::obtener_datos_like();
    // Personas::insertar_datos();
    // Paises::insertData();
    // Personas::actualizar_datos();
    // Personas::getDataParametros()
    // Personas::actualizar_dinamico();
    // Personas::getWhereWhere();
    // Personas::deletedinamico();

    function vista() {
        $vista = isset($_REQUEST['view']) ? $_REQUEST['view'] : 'home';
        if (array_key_exists($vista, DIRECTORIO)) {
            require_once DIRECTORIO[$vista].'.view.php';
        }else {
            require_once DIRECTORIO['error'].'.view.php';
        }
    }

    vista();
?>