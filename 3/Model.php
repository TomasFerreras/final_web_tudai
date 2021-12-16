<?php

class Model {
    private $DB;

    function __construct(){
        $this->DB = new PDO('mysql:host=localhost;'.'dbname=DB;charset=utf8', 'root', '');
    }

    function getEmisorData($dniEmisor) {
        $sentencia = $this->DB->prepare(" SELECT FROM cliente WHERE dni = ?");
        $sentencia->execute($dniEmisor);
        $emisorData = $sentencia->fetch(PDO::FETCH_OBJ);
        return $emisorData;
    }

    function getActividad($emisorID) {
        $sentencia = $this->DB->prepare(" SELECT FROM actividad WHERE id_cliente = ?");
        $sentencia->execute($emisorID);
        $emisorActividad = $sentencia->fetch(PDO::FETCH_OBJ);
        return $emisorActividad;
    }

    function getDestinatario($dniDestinatario) {
        $sentencia = $this->DB->prepare(" SELECT FROM cliente WHERE dni = ?");
        $sentencia->execute($dniDestinatario);
        $destinatario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $destinatario;
    }

    function transferenciaRapidaModel($valorTransferencia, $dniDestinatario) {
        $sentencia = $this->DB->prepare(" UPDATE actividad SET  kms = ? WHERE id_cliente = ?");
        $sentencia->execute($valorTransferencia, $dniDestinatario);
    }
}