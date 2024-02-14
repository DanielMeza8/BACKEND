<?php 
    

    /*$dotenv = Dotenv\Dotenv::createImmutable('./');
    require_once realpath('./vendor/autoload.php');
    

    $dotenv->load();
*/
    use controller\CRUD;
    use controller\CrudEncargados;
    require_once realpath('./vendor/autoload.php');
    // $dotenv = Dotenv\Dotenv::createImmutable('./');
    // $dotenv->load();

    // echo $_ENV['VARIABLE_DE_ENTORNO'];
   
    // echo $_ENV['USUARIO'];
   
    // echo $_ENV['PASSWORD'];
   
    // echo $_ENV['HOST'];
    CRUD::consulta();
    echo "<br/><br/>";
    CrudEncargados::getEncargados();
   

?>