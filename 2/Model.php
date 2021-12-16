<?php

class userModel {
    private $DB;

    function __construct(){
        $this->DB = new PDO('mysql:host=localhost;'.'dbname=DB;charset=utf8', 'root', '');
    }

    function getUserData($userID) {
        $sentencia = $this->DB->prepare(" SELECT FROM cliente WHERE id = ?");
        $sentencia->execute($userID);
        $userData = $sentencia->fetch(PDO::FETCH_OBJ);
        return $userData;
    }

    function getActividad($userID) {
        $sentencia = $this->DB->prepare(" SELECT FROM actividad WHERE id_cliente = ?");
        $sentencia->execute($userID);
        $userActividad = $sentencia->fetch(PDO::FETCH_OBJ);
        return $userActividad;
    }

    function getTarjetas($userID) {
        $sentencia = $this->DB->prepare(" SELECT * FROM tarjeta WHERE id_cliente = ?");
        $sentencia->execute($userID);
        $userTarjetas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $userTarjetas;
    }

}