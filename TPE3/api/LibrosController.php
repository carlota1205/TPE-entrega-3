<?php
require_once 'api/APIController.php';
require_once 'app/Models/LibrosModel.php';
require_once 'api/APIView.php';

class LibrosController extends ApiController{
    private $model;


    function __construct(){
        parent::__construct();
        $this->model = new LibrosModel();
        
    }
    public function getALL(){
        if(isset($_GET['order']) AND isset($_GET['sort'])){
            if(($_GET['order']=='Libro_id' ||$_GET['order']=='Titulo' || $_GET['order']=='Descripcion' || $_GET['order']=='Genero' || $_GET['order']=='Autor_id') AND( $_GET['sort']=='DESC' || $_GET['sort']=='ASC'|| $_GET['sort']== null ) ){
                $parametrosorder=$_GET['order'];
                $parametrossort=$_GET['sort'];
                $libros=$this->model->getALL($parametrosorder,$parametrossort);
                $this->view->response($libros,200);
            }
            else{
                $this->view->response("Los valores ingresados no corresponden a ningun campo",404);
            }

        }
        else{
            $this->view->response("No se puede interpretar la solicitud, debido a una mala sintaxis",400);
        }
        
    }
    
    public function filtrarLibros($params = []){
        $id = $params[':ID'];
        $librofiltrado=$this->model->filtrarLibro($id);
        if($librofiltrado){
            $this->view->response($librofiltrado,200);
        }
        else{
            $this->view->response('El libro del autor con el id='.$id.'no existe',404);
        }
    }

  
}