<?php
require_once "./Model.php";
require_once "./View.php";
require_once "./Helper.php";

class Controller {
    private $userModel;
    private $View;
    private $helper;

    function __construct(){
        $this->userModel = new userModel;
        $this->helper = new helper;
    }

    function altaCliente(){
        $this->helper->checkAdminLogin();
        
        if (isset($_POST["nombre"]) && isset($_POST["dni"]) && isset($_POST["direccion"]) && isset($_POST["ejecutivo"])){
            $nombre = $_POST["nombre"];
            $dni = $_POST["dni"];
            $direccion = $_POST["direccion"];
            $ejecutivo = $_POST["ejecutivo"];

            $cliente = $this->userModel->getClientes($dni);
            // SUPONGO QUE EL EJECUTIVO SE DECIDE A LA HORA DE DARLO DE ALTA
            if(empty($cliente)){
                $this->userModel->addCliente($nombre, $dni, $direccion, $ejecutivo);
                $this->userModel->addKM($cliente->id);

                if ($cliente->ejecutivo == true){
                    $tarjetaData = $this->CardHelper->getBussinesCard() 
                    $this->userModel->addTarjetaEjecutiva($fecha_alta, $nro_tarjeta, $fecha_vencimiento, $ejecutivo, $cliente->id);
                }
        
            } else {
                $this->userView->altaClienteView("Ya existe un usuario con el dni: $dni");
            }
        } else {
            $this->View->altaCliente("campos sin completar");
        }
    }
}