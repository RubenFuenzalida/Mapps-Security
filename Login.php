<?php
    $con = mysqli_connect("localhost", "mappsecu_Hidan", "elamor222", "mappsecu_mappssecurity");
        
    $Usuario = $_POST["Usuario"];
    $Password = $_POST["Password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM Cliente WHERE Usuario = ? AND Password = ?");
    mysqli_stmt_bind_param($statement, "ss", $Usuario, $Password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $IdCliente, $Nombre, $Apellidos, $Telefono, $ComunaResidencia, $Usuario, $Password, $Correo);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["Nombre"] = $Nombre;
        $response["Apellidos"] = $Apellidos;
        $response["Telefono"] = $Telefono;
        $response["ComunaResidencia"] = $ComunaResidencia;
        $response["Usuario"] = $Usuario;
        $response["Password"] = $Password;
        $response["Correo"] = $Correo;
    }
    
    echo json_encode($response);
?>