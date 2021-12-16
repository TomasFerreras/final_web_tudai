<?php

//CAMBIOS
/*
    Se deben crear nuevos controladores de la API,
    una nueva vista para la API (JSON), y un router especifico para la API REST
*/

// ENDPOINTS
/*
    api/usuarios/:ID GET apiUsuariosController getUsuarioData
    api/usuarios/:ID PUT apiUsuariosController updateUsuarioData
    api/tarjetas/:ID GET apiTarjetasController getTarjetasUsuario
    api/actividad/:ID GET apiActividadController getActividadUsuario
    FALTA E
    api/tarjetas/:ID DELETE apiTarketasController deleteTarjeta

*/

class apiUserController{
    private $model;
    private $view;
    private $Helper;

    public function __construct(){
        $this->model = new userModel();
        $this->view = new ApiView();
        $this->Helper = new Helper();
    }

    public function obtenerTarjetas($params = []){
        $id = $params[':ID'];
        $tarjetas = $this->model->getUserTarjetas($id);
        if($tarjetas){
            $this->view->response($tarjetas,200);
        }else{
            $this->view->response([],200);
        }
    }

    //FALTA item E

    public function bajaTarjeta($params = []) {
        $tarjetaID = $params[':ID'];
        $tarjeta = $this->model->getTarjeta($tarjetaID);
        if ($tarjeta) {
            $this->model->bajaTarjeta($tarjetaID);
            $this->view->response("La tarjeta id=$tarjetaID fue eliminada con éxito", 200);
        } else {
            $this->view->response("La tarjeta no pudo ser dada de baja satisfactoriamente", 404);
        }
    }

}


