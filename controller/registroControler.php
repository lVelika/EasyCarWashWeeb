<?php

$name   = $_POST['name'];
  $email  = $_POST['email'];
  $clave  = $_POST['clave'];
  $clave2 = $_POST['clave2'];
  $dir= $_POST['direccion'];
  $tel=$_POST['telefono'];
  
  if(empty($email) || empty($clave) || empty($clave2)||empty($dir)||empty($tel))
  {
    echo 'error_1'; // Un campo esta vacio y es obligatorio
  }else{
    if($clave == $clave2){
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        # Incluimos la clase usuario
        require_once('../php/usuario.php');
        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();
        # Llamamos al metodo login para validar los datos en la base de datos
        $usuario -> registroUsuario($name, $email,$clave,$dir,$tel);
      }else{
        echo 'error_4';
      }
    }else{
      echo 'error_2';
    }
  }
  
  
    
  