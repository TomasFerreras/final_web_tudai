<?php
require_once "./Model.php";
require_once "./View.php";
require_once "./Helper.php";

class Controller {
    private $Model;
    private $View;
    private $helper;

    function __construct(){
        $this->Model = new userModel;
        $this->helper = new helper;
    }

    function showData($userID) { // DOY POR SUPUESTO QUE VIENE POR PARAMS
        $this->helper->checkLogin();
        $userData = $this->Model->getUserData($userID);

        if ($userData) {
            $userActividad = $this->Model->getActividad($userData->id);
            $userTarjetas = $this->Model->getTarjetas($userData->id);
            
            if($userActividad && $userTarjetas) {
                $this->View->showData($userData->nombre, $userData->dni, $userActividad->kms,$userActividad->fecha, $userActividad->fecha, $userTarjetas->nro_tarjeta, $userTarjetas->fecha_vencimiento);
                // le pase un choclo pero preferia hacer eso a pasarle la data del usuario, su actividad y sus tarjetas de una forma tan cruda
            } else {
                $this->View->showData('el usuario no tiene tarjetas asociadas o actividad');
                // en caso que por algun motivo se pueda dar de alta sin cumplir los requisitos
            }
        }
    }
}