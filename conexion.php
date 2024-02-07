<?php
	require_once realpath('./vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable('./');
    $dotenv->load();
	
	$hostname=$_ENV['HOST'];
	$username=$_ENV['USUARIO'];
	$password=$_ENV['PASSWORD'];
	$dbname=$_ENV['BD'];
	
	$conexion = mysqli_connect($hostname,$username, $password, $dbname);
	
	# Comprobar si existe registro
	
	
	
	if($conexion){
        echo "Conectado con exito";
	}else{
        echo "error al conectar";
    }
?>