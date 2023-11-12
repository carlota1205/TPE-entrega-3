<?php
require_once 'app/Models/Model.php';
class LibrosModel extends Model{
    function __construct(){
        parent::__construct();  
    }

    function getALL($parametroorder, $parametrosort){
        $query = $this->db->prepare('SELECT * FROM Libros ORDER BY '.$parametroorder.' '.$parametrosort);
        $query-> execute();
        $libros = $query-> fetchAll(PDO::FETCH_OBJ);
        return $libros;
    }
    function get($id){
        $query = $this->db->prepare('SELECT * FROM Libros WHERE Libro_id=?');
        $query-> execute([$id]);
        $libro = $query-> fetch(PDO::FETCH_OBJ);
        return $libro;
    }
    
    public function filtrarLibro($autor){
        $query = $this->db->prepare("SELECT * FROM libros WHERE Autor_id = ?");
        $query->execute([$autor]);
        $libro = $query->fetchAll(PDO::FETCH_OBJ);
        return $libro;
    }
    
} 