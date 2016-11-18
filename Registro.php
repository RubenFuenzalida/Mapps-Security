<?php
    $con = mysqli_connect("localhost", "mappsecu_Hidan", "elamor222", "mappsecu_mappssecurity");
    
    $Nombre = $_POST["Nombre"];
    $Apellidos = $_POST["Apellidos"];
    $Telefono = $_POST["Telefono"];
    $ComunaResidencia = $_POST["ComunaResidencia"];
    $Usuario = $_POST["Usuario"];
    $Password = $_POST["Password"];
    $Correo = $_POST["Correo"];
    $statement = mysqli_prepare($con, "INSERT INTO Cliente (Nombre, Apellidos, Telefono, ComunaResidencia, Usuario, Password, Correo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "ssissss" , $Nombre, $Apellidos, $Telefono, $ComunaResidencia, $Usuario, $Password, $Correo);
    mysqli_stmt_execute($statement);
            
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>