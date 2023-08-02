PROCESO PARA LA BASE DE DATOS:


1. Conectar a la base de datos: Cambiar las variables de entorno por nuestras propias opciones(nombre base de datos, usuario, password, puerto, etc)

2. Crear modelos: Un modelo es la representación de una tabla en nuestro proyecto. Hacemos esto para no tener la necesidad de escribir
sentencias SQL en ningún momento (sólo para crear la base de datos). El método para crear un modelo es mediante la consola con el comando:

-- php artisan make:model <nombre> -m

Importante mencionar que el nombre del modelo debe estar en singular (user, rol, name, etc). La bandera de -m es para crear la primera migración
de este modelo, que corresponde a la creación de la tabla en la base de datos.

Esta migración, contiene la información general y los campos de nuestra tabla (o modelo), y, aunque Laravel la escribe sin problemas, no se ejecuta
automáticamente, sino que tenemos que ejecutarla nosotros mismos. Esto debido a que primero debemos definir en esta migración las columnas que 
estarán en nuestra tabla.

La migración estará en database/migrations/<fechaDeMigracion_tipoDeMigracion_NombreModelo>  <!-- 2023_07_23_203422_create_notes_table.php  !>
Nuestro modelo se creará automáticamente y estará en app/Models/<nombreModelo>

3. Ejecutar migraciones: Después de tener nuestras migraciones listas, debemos ejecutarlas. De nuevo, esto lo hacemos mediante la consola de comandos.
El comando para hacer esto es:

-- php artisan migrate

Si por alguna razón nuestra base de datos la creamos mal, o queremos eliminar la última migración ejecutada, con el comando
-- php artisan migrate:rollback
conseguimos esto

4. Ahora necesitamos modificar nuestro modelo mediante nuestras vistas. Esto lo conseguimos mediante un controlador (MVC). Antes de explicar cómo funciona cada cosa, creemos uno. El comando que usaremos es 

-- php artisan make:controller <nombre>

Este archivo lo encontraremos en app/http/controllers/<nombre>

Este controlador contendrá todos los métodos que necesitemos para interactuar con nuestro modelo, insertar, leer, editar, etc. (recordar que el modelo es básicamente una tabla). 
Estos métodos, aunque no es 100% necesario, usualmente usan un estándar de nombramiento para saber qué hacen cada uno:

index -> Leer todos los registros de la tabla
store -> Insertar un registro
update -> Actualizar un registro
destroy -> Eliminar un registro
edit -> Para hacer el update, necesitamos mostrar una vista con un formulario. Para eso usamos este método

En cada uno de estos métodos podremos validar campos de la request con el método validate. Este método recibe como argumento un arreglo de campos,
y podrá validar cosas como si es requerido, la longitud minima, maxima, expresiones regulares, etc