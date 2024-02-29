## Creación modelo
### Creacion tablas
Vamos a crear las tablas desde aplicación de laravel a la base de datos conectada.  Migraciones: aplicación que permite modificaciones en la base de datos. DDL: clase de laravel para migraciones (database/migrations) -> aparecen las tablas de users passtwotd con dos métodos up y down

- up : hacer las migraciones. create. Añadir datos
- timestamps() -> marca de tiempo 
- down : drop table  borrar los datos
-  php artisan migrate :  ejecuta las migraciones a la base de datos 
- php artisan migrate:rollback ->quitar las tablas

### Controladores 
Crear solicitudes con *Resources* .**Ver rutas creadas**
- Controlador: actua cuando se llama. . “ProfesorController”. - Ante esta solicitud ejecuta este metodo. En routes:
    - ![](https://lh7-us.googleusercontent.com/TSEjXmramHkmBLxLboBl9leIiRbiJ2r6MjoTFS1n02-SaY72u5VwS-54X_54wXN2V8fmvDG_E8z3f1IsBMHMekRiPhl81MnVKbcV9cXiaZMuDiV-SCKzaUJJ30Qbj2btFWBtOkk4WlORwXZSKYKZVo0)
    
- Ante un resource llamado profesores , controle, para atender al resource. profesor
- Al poner resources. crear solicitudes y métodos asociados al controlador ProfesorController. Si ponernos php artisan route:LIST –PATH=profesores . vemos los creados . 
     ![](https://lh7-us.googleusercontent.com/KalOEuTTLDEIChDnts9lYWlK_9ePNsLie4pnw-QzZnDh1vvXHQIXVpYFkzKnQYfLupjZChlaeN4kp03pJ51dN1NP8hptTj8MKhtLpjW8TvUHpWSxDbnIWdcFf1Jsu727Ggq1JyoRUBtE6do-g-_lOZg)
       

Resumen de CRUD. Crear modelos, seeders, factories, controllers y recursos necesarios. Entender los conceptos.

### Metodo index modelo profesor

Ejecutar metodo index profesor
Crear una tabla y enseñarla

¿ayuda helper ! dd($profesores); 

un vardump de variables. helper funcion metodo de laravel . 

info("Profesores". $profesores);

Este helper me lo escribe en el fichero log

$profesores = Profesor::all();

1. Creo una carpeta en vies profesores y creo una vista listado.blade.php
2. creo una tabla con los contendio de la tabla profesoresl

--- 
### Metodo store (request)
Meter un nuevo registro crear
public funciton store (

$dattos = request->input() Recogo los datos del request

)

Creado en el cuando creamos el controlador all . crea modelo request todo el copon. 

funcito authorize. -> sirve para dar autorizaciones segun usuario, validar tipo de usuario permisos

funcion rules() ->reglas de validación del formulario . El formulario.

$ = Profesor::all();

  

return [

“nombre” =>”require

]

Store, request form request. Authorize . Qué hacen estas cosas ?

HELPERS: funciones especificas de laravel . 

- fake() ->Crear cosas seeder.
    
- info -> como el vardump. (escribe en log y continua.

#### Resumen crear un nuevo profesor 
preto boton  create profesor. 

1. va a profesor.create usa la ruta creada por post profesor.create. Ruta form 
    
2. LLeva al controlador profesorcontroler al metodo create
    
3. Ahi devolvemos vista “create”: en views/create -> donde estael formulario que rellenaremos para store en la DB
    
4. Cuando damos submit se envia form por  profesor.store 
    

1. add al form el @crsf -> añade cod que indiga que somos desde la propia web
    

6. En el store : le decimos que sea StoreProfesorReqeues. Con los datos recibidos del form creamos un nuevo registro profesor y lo añadimos a la DB.
    
7. En StoreProfesorRequest (form request)hay metodos interesantes.
    

1. Authorize 
    
2. Rules -> normas que para comprobar la solicitud enviada por el formulario antes del store comprueba estas normas y devuelve errores si hay alguno en la var $errors . Validamos la solicitud enviada por el formulario 
    

1. Intentatr que salgan en rojo. Recoger errores en de $errores y ponerlos en el formulario

## UPDATE: update

heroicos web. Delete profesor/{profesor} (eso es algo que se pasa, le pasmos el profesor)

![](https://lh7-us.googleusercontent.com/d9M0ExcF8ZAKlUvHeFnDwGRHgsNVZ0yetFBQFXKlPZ6tTh09xKreFbE6UrVaknF3exmYB863Ar8ee3fZyA8VkaEA0BjyBzwLEHdH_ah7bk_EIGRXvBMDHVvil0stZFC_XLd4Y_F4_vfzIk8Yi9fxDno)

  SHOW: update

Cuando le damos a editar al boton queremos que nos lleve a la . Es por get solo necesito un ancla <<a>

Creamos una view nueva  (“edit.balde.php”)edit basasda  en create.blade. cambiamos los values para que aparezca los datos del profesor a modificar. 

Añadir boton actuaclizar y candelar. 

## update

con lo recogido en el formulario edit el action del form lo cambiamos a profesor.update. y cambiamos metho a patch

1. cambiamos el metodo update del controler, el requetés y el profesor a modificar. 
    

1. revisamos el request UpdateProfesor
    
2. recojo el profesor profesor find
    
3. actualizo con profesor update(datos del request)
    
4. obtendo los profesores y los devuleveo