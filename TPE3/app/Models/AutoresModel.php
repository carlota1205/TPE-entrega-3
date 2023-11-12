<?php
require_once 'app/Models/Model.php';
class AutoresModel extends Model{
    function __construct(){
        parent::__construct();    
    }
    function getALL(){
        $query = $this->db->prepare('SELECT * FROM autores');
        $query-> execute();
        $libros = $query-> fetchAll(PDO::FETCH_OBJ);
        return $libros;
    }
    function get($id){
        $query = $this->db->prepare('SELECT * FROM autores WHERE Autor_id=?');
        $query-> execute([$id]);
        $autor = $query-> fetch(PDO::FETCH_OBJ);
        return $autor;
    }
    function insertAutor($nombreautor,$profesionautor,$fechaautor){
        $query = $this->db->prepare("INSERT INTO autores (Nombre_Autor, Profesion_Autor, Fecha_Autor) VALUES (?, ?, ?)");
        $query->execute([$nombreautor,$profesionautor,$fechaautor]);
        return $this->db->lastInsertId();
    }
    function updateAutor($Nombre_Autor,$Profesion_Autor,$Fecha_Autor,$id){
        $query = $this->db->prepare('UPDATE autores SET Nombre_Autor=?, Profesion_Autor=?, Fecha_Autor=? WHERE Autor_id=? ');
        $query->execute([$Nombre_Autor,$Profesion_Autor,$Fecha_Autor,$id]);
        return $this->db->lastInsertId();
    }
    
    
    
} 