<?php

class userModel {
    private $DB;

    function __construct(){
        $this->DB = new PDO('mysql:host=localhost;'.'dbname=DB;charset=utf8', 'root', '');
    }

    function getClientes($dni) {
        $sentencia = $this->DB->prepare(" SELECT FROM cliente WHERE dni = $dni");
        $sentencia->execute();
        $cliente = $sentencia->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

    function addCliente($nombre, $dni, $direccion, $ejecutivo) {
        $sentencia = $this->DB->prepare(" INSERT INTO cliente(nombre, dni, direccion, ejecutivo) VALUE (?,?,?,?)");
        $sentencia->execute(array($nombre, $dni, $direccion, $ejecutivo));
    }

    function addKM($userID) {
        $sentencia = $this->DB->prepare(" UPDATE actividad SET  km = ? WHERE id_cliente = $userID");
        $sentencia->execute(array(200, $userID));
    }

    function addTarjetaEjecutiva($fecha_alta, $nro_tarjeta, $fecha_vencimiento, $ejecutivo, $clienteID) {
        $sentencia = $this->DB->prepare(" INSERT INTO tarjeta(fecha_alta, nro_tarjeta, fecha_vencimiento, tipo_tarjeta, id_cliente) VALUE (?, ?, ?, ?, ?)");
        $sentencia->execute(array($fecha_alta, $nro_tarjeta, $fecha_vencimiento, $ejecutivo, $clienteID));
    }
}