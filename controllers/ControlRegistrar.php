<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlRegistrar{
    public $email;
    public $nombre;
    public $clave;
    public $error;

    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->nombre = $_POST['nombre'];
        $this->clave = $_POST['clave'];
    }

    public function registrar(){
        session_start();
        if($this->email=="" || $this->nombre=="" || $this->clave==""){
            $_SESSION['error']="Los campos están vacíos";
            header("Location:../registrar.php");
            return;
        }
        $modelo = new UsuarioModel();
        $data = ['email'=>$this->email,'nombre'=>$this->nombre,'clave'=>$this->clave];
        $count = $modelo->insertarUsuario($data);
        
        if($count==1){
            $_SESSION['resp']="Usuario creado!";
        }else{
            $_SESSION['error']="Hubo un problema en la base de datos :(";
        }
        header("Location:../registrar.php");
    }
}
$obj = new ControlRegistrar();
$obj->registrar();