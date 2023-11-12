<?php
require_once 'api/APIController.php';
require_once 'app/Models/AutoresModel.php';
require_once 'api/APIView.php';

class AutoresController extends ApiController{
    private $model;


    function __construct(){
        parent::__construct();
        $this->model = new AutoresModel();
        
    }
    public function getALL($params = []){
        if(empty($params)){
            $autores=$this->model->getALL();
            $this->view->response($autores,200);
        }
        else{
            $autor=$this->model->get($params[':ID']);
            if(!empty($autor)){
                if(isset($params[':subrecurso'])){
                    switch($params[':subrecurso']){
                        case 'Autor_id':
                            $this->view->response($autor->Autor_id,200);
                        break;
                        case 'Nombre_Autor':
                            $this->view->response($autor->Nombre_Autor,200);
                        break;
                        case 'Profesion_Autor':
                            $this->view->response($autor->Profesion_Autor,200);
                        break;
                        case 'Fecha_Autor':
                            $this->view->response($autor->Fecha_Autor,200);
                        break;
                        default:
                            $this->view->response('El subrecurso'.$params[':subrecurso'].' no existe ',404);
                    }
                } else {
                    $this->view->response($autor,200);
                }
                
            }
            else{
                $this->view->response('El autor con el id='.$params[':ID'].' no existe ',404);
            }
        }
    }
    public function createAutor($params = []){
        $body = $this->getData();
        if(property_exists($body, 'Nombre_Autor') && property_exists($body, 'Profesion_Autor') && property_exists($body, 'Fecha_Autor')){
            $nombreautor = $body->Nombre_Autor;
            $profesionautor = $body->Profesion_Autor;
            $fechaautor = $body->Fecha_Autor;
            if(empty($nombreautor) || empty($profesionautor) || empty($fechaautor)){
                $this->view->response("Complete los datos", 400);
            }
            else{
                $id=$this->model->insertAutor($nombreautor,$profesionautor,$fechaautor);
                $this->view->response("El Autor fue insertado con el id=".$id,201);
    
            }
        }
        else{
            $this->view->response('No cumple con la sintaxis necesaria para la base de datos',400);
        }

       

    }

    public function updateAutor($params = []){
        $id = $params[':ID'];
        $autor = $this->model->get($id);
        if($autor){
            $body = $this->getData();
            if(property_exists($body, 'Nombre_Autor') && property_exists($body, 'Profesion_Autor') && property_exists($body, 'Fecha_Autor')){
                $Nombre_Autor = $body->Nombre_Autor;
                $Profesion_Autor = $body-> Profesion_Autor;
                $Fecha_Autor = $body->Fecha_Autor;
                if(empty($Nombre_Autor) || empty($Profesion_Autor) || empty($Fecha_Autor)){
                    $this->view->response("Complete los datos", 400);
                }
                else{
                    $this->model->updateAutor($Nombre_Autor,$Profesion_Autor,$Fecha_Autor,$id);
                    $this->view->response('El autor con el id='.$id.'ha sido modificada con exito',200);
        
                }
   
            }
            else{
                $this->view->response('No cumple con la sintaxis necesaria para la base de datos',400);
            }    
        
        }
        else{
            $this->view->response('El autor con el id='.$id.'no existe',404);
        }
    }
   
   
}