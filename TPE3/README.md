107- Mariano Vazquez. Carlota Loustau

Nuestra API permite el acceso a los recursos(Libros, Autores) existentes en nuestra base de datos.

URL : http://localhost/TPE3/api

-GET http://localhost/TPE3/api/Autores
-GET http://localhost/TPE3/api/Autores/11
-GET http://localhost/TPE3/api/Autores/11/Nombre_Autor
Estos endpoints nos permiten tres opciones: obtener todos los autores, obtener un autor por su id y obtener un atributo específico del autor deseado. Tanto el autor como el atributo que se desea obtener deben existir, sino se devolverá un error 404.

-GET http://localhost/TPE3/api/Libros?order=Genero&sort=ASC
Este endpoint nos devuelve la lista de entera de libros ordenada de forma ascendente o descendente y organizada a partir de un atributo de esta tabla, estos atributos pueden ser Libro_id, Titulo, Descripcion, Genero, Autor_id. Para una correcta utilizacion los parametors URL order y sort deben estar bien escritos, ya que en el caso contrario devolveran un error 400 de mala sintaxis. Si los parametros url son correctos, se verificará que order contenga los atributos existentes y también que sort sea ascendente o descendete (tambien se admitirá que este vacío ya que es un valor predeterminado de MYSQL) en el caso contrario devolerá un error 404, ya que no existen.


-GET http://localhost/TPE3/api/Libros/11
Este endpoint devuelve una lista de libros donde se filtra por autor. En el caso de introducir un id de autor inexistente devolverá un error 404.



-PUT http://localhost/TPE3/api/Autores/11
Este endpoint permite modificar un autor existente. El id que se le provee debe existir en la tabla, de lo contrario devolverá un error 404. En el caso de que el id sea correcto, pero los datos que se le proveen tengan un error de escritura de los atributos o se envíen vacíos se devolverá un error 400. 


-POST http://localhost/TPE3/api/Autores
Este endpoint permite crear un autor y agregarlo a su correspondiente tabla en la base de datos. Las validaciones serán las mismas que se plantean anteriormente, los atributos que se escriben en el cuerpo de postman deben corresponder con las de la base de datos y, también, no se deben enviar vacías.