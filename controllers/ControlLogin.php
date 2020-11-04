<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlLogin{
    public $email;
    public $clave;

    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->clave = $_POST['clave'];
    }
    public function iniciarSesion(){
        session_start();
        if($this->email=="" || $this->clave==""){
            $_SESSION['error']="Complete los datos";
            header("Location:../index.php");
            return;
        }
        $modelo = new UsuarioModel();
        $array = $modelo->buscarUsuarioLogin($this->email,$this->clave);
        if(count($array)==0){
            $_SESSION['error']="Correo o clave son incorrectos. Intente Nuevamente";
            header("Location:../index.php");
            return;
        }
        $_SESSION['usuario'] = $array[0];//guardando lo que hay en la posicion 0, un usuario
        header("Location:../views/nuevolink.php");
    }
}
$obj = new ControlLogin();
$obj->iniciarSesion();