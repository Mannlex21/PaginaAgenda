<?php

    require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $nombreError = null;
        $domicilioError = null;
        $telefonoError = null;
        $ciudadError = null;
        $emailError = null;
        $tipo2 = null;

        // keep track post values
        $nombre = $_POST['nombre'];
        $domicilio = $_POST['domicilio'];
        $telefono = $_POST['telefono'];
        $ciudad = $_POST['ciudad'];
        $email = $_POST['email'];
        $tipo = $_POST['opcion'];

        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nombreError = 'Por favor, ingrese domicilio';
            $valid = false;
        }
        if (empty($domicilio)) {
                    $domicilioError = 'Por favor, ingrese domicilio';
                    $valid = false;
        }
        if (empty($telefono)) {
                    $telefonoError = 'Por favor, ingrese telefono';
                    $valid = false;
        }
        if (empty($ciudad)) {
                            $ciudadError = 'Por favor, ingrese ciudad';
                            $valid = false;
        }
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        if(empty($tipo)){
            $tipoError = 'Please enter tipo';
            $valid = false;
        }else{

        }
        if ($tipo == "amigo") {
           $tipo2="Amigo";
        }else{
            if($tipo == "compañero"){
                        $tipo2="Compañero";
            }else{
                if($tipo == "familia"){
                    $tipo2="Familia";
                }
            }
        }


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO datos (nombre,domicilio,telefono,ciudad,email,tipo) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre,$domicilio,$telefono,$ciudad,$email,$tipo2));
            Database::disconnect();
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }

?>
