<?php
require_once "./Model.php";
require_once "./View.php";
require_once "./Helper.php";

class Controller {
    private $Model;
    private $View;
    private $helper;

    function __construct(){
        $this->Model = new Model;
        $this->helper = new helper;
    }

    function transferenciaRapida() {
        $this->helper->checkLogin();
        
        if (!empty($_POST['dni']) && !empty($_POST['valorTransferencia'])) {
            $dniEmisor = $_SESSION['dni']; // EL DNI LO SACO DE UN SUPUESTO SESSION
            $dniDestinatario = $_POST['dniDestinatario'];
            $valorTransferencia = $_POST['valorTransferencia'];

            
            $emisorData = $this->Model->getEmisorData($dniEmisor);
            $emisorActividad = $this->Model->getActividad($emisorData->id);
            $emisorFondos = $emisorActividad->kms;


            $destinatario = $this->Model->getDestinatario($dniDestinatario);
            if ($destinatario) {
                if ($emisorFondos >= $valorTransferencia) {
                    $this->Model->transferenciaRapidaModel($valorTransferencia, $dniDestinatario);
                } else {
                    $this->View->transferenciaRapidaView('no tiene fondos suficientes');
                }
            } else {
                $this->View->transferenciaRapidaView('el destinatario no existe');
            }


        }
    }
}