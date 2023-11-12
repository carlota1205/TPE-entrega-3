<?php
require_once 'api/LibrosController.php';
require_once 'api/AutoresController.php';
require_once 'libs/Router.php';


$router = new Router();

$router -> addRoute('Libros','GET','LibrosController','getALL');
$router -> addRoute('Libros/:ID','GET','LibrosController','filtrarLibros');
$router -> addRoute('Autores','GET','AutoresController','getALL');
$router -> addRoute('Autores/:ID','GET','AutoresController','getALL');
$router -> addRoute('Autores/:ID/:subrecurso','GET','AutoresController','getALL');
$router -> addRoute('Autores/:ID','PUT','AutoresController','updateAutor');
$router -> addRoute('Autores','POST','AutoresController','createAutor');

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);