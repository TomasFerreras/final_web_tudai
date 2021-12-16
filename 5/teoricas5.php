<?php 

/*
 a_ REST o Representational State Transfer es una arquitectura WEB que nos permite hacer interacciones con servicios RESTful.
    Una API REST consta de recursos como por ejemplo USUARIOS, TARJETAS, ACTIVIDAD, endpoints que se encuentran en la URL y son
    los puntos de entrada a un recurso api/usuarios/:ID y un metodo que indica que accion se realizara, GET, PUT, POST, DELETE

    Una de las principales ventajas del desarrollo REST es la division del cliente y el servidor dando como resultado una buena
    optimizacion, carga mas rapida del sitio y un SEO mas optimizado.

    Una nueva funcionalidad seria que el usuario pueda ver informacion como nombre y dni de otro usuario para hacer transacciones
    sin tener que preguntarle al destinatario por su dni, con esta supuesta funcionalidad aprovechamos la velocidad que nos brinda
    el SSR para darle al usuario una mejor experiencia, mas rapida, eficaz y segura.


 b_ SERVER-SIDE-RENDERING: con SSR el usuario hace una peticion, el servidor busca y procesa la informacion y genera una respuesta,
    esta respuesta sera luego mostrada por el buscador, se reduce la carga del lado del cliente ya que no debe procesarlo.

    HTTP STATUS CODE: los codigos HTTP nos indican el estado de las peticiones, si ha sido satisfactoria o si ha fallado.
    Hay grupos de codigos de respuesta, por ejemplo los 200 nos indican una respuesta satisfactoria, los 400 se relacionan con errores
    del cliente y los 500 con errores del servidor
    Ejemplo:

    $tarjetas = $this->model->getUserTarjetas($id);
    if($tarjetas){
        $this->view->response($tarjetas,200); EN CASO DE SER SATISFACTORIA ENVIAMOS LA RESPUESTA AL VIEW PARA MOSTRARLA
                                              Y EN CASO DE NO SERLO PODEMOS ENVIAR LA RESPUESTA VACIA O MANEJAR EL ERROR
                                              MOSTRANDO UN MENSAJE DE QUE HA SUCEDIDO Y PORQUE, ESTO ULTIMO ES LO MAS RECOMENDABLE.
    }else{
        $this->view->response([],200);        
    }

 c_ SESSIONS: el protocolo HTTP es un protocolo sin estado, lo que quiere decir que no podemos guardar datos entre peticiones consecutivas,
    esto trae un problema, en caso de que el usuario quiera loguearse por ejemplo, no habria forma de guardar su informacion de ese modo,
    lo bueno es que hay multiples soluciones a este problema, el local storage, las cookies o los SESSION.
    Los SESSION son la forma mas segura de guardar esa informacion ya que al estar del lado del servidor dificulta la obtencion de dicha info,
    la cual persistira mientras el usuario este conectado al servidor.
    En PHP los session se inician con session_start(), a traves de $_SESSION[""] se puede acceder por ejemplo al nombre $_SESSION["nombre"]
*/