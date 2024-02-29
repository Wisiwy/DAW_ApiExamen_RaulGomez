# Referencias CSS personalizado

# Authentificación

## Acceder y Registrar

## Modificamos Login.jsx

En la parte del return cambiar la etiquta *GuestLayout* por el nuestro *Layout*.

Añadimos div para el css que añadimos . cambiar rutas  
Las rutas de Login y Resgiter las crea Breeze en la carpeta *resources/js/pages/Auth*

### Necesitamos de Base de datos par guardar Usuarios
docker con MySql -> doker compose up levantaslo. 
#### Usar migration
Hacer migración de las tablas 
```bash
php artisan migrate:fresh --seed
``` 
#### Cambiar en register.jsx el formulario
1. El formulario en register.jsx recoge los datos en const
2. const submit -> postea la info del fomrm a la route *register*.
3. En Route service provider

En route.service.provider. cambiar la direccion de HOME poner /main

#### HeaderLayout
Header permite compartir var del front con el back
> **Middleware** sofrtware que se ejecuta entre la petición y la respuetas

Share - Middleware que comparte las cosas entre back y front. Compartir variables del back con el fron . 
Use page es sare. 

Creamos un objeto user donde cogemos la info del user del back para el fron (react)

``` php 
const user= usePage().props.auth.user;
```

>Cuidado con los **comentarios** en html los coge como mal.


>React los returns siempe tienen que estar en un componente como etiqueta <></> 

#### Manerjar el logout
quitar href se maneja con el metodo onclick
En el boton creo una funcion handleLogout que definimos con anterioridad. 
Inertia ofrece solicitud por post. 
- Instalar libreria pakete de inertia para hacer solicitudes al servidor inertia
``` bash 
npm install @inertiajs/inertia @inertiajs/inertia-react
```
- Importar "IInertia"
- En "*authenticatedSessionController*" en el metodo destroy se redirige al */main*
> Controlador Auth seesion controller es quien maneja mis movida

# Llenar base de datos con tablas y datos -CRUD
## Crear tabla y llenarlas
 
 php artisan make:model Proyecto --all

1. Darle a la table las condiciones de los campos schema "create table proyecto"
2. Modificar **factory**
3. En DataBaseSeeder - > llamar al 
	1. Proyecto::factory (10)->create()
	>Otras veces lo hemos hecho en proyecto seeder. En lugar de lamamrlo se llama ahí directamente

4. php artisan migrate --seed

### Visualizar las tablas
1. Boton de ver los proyectos 

```html
<a href={route('proyectos.index')} className="btn  btn-sm  btn-neutral">Proyectos</a>
```
2. Definir la ruta en web.php. Crear todas las rutas de proyectos 
```php
Route::resource("proyectos", ProyectoController::class);
```

1. verl las **rutas de proyectos** creadas con el anteriro comando 
	1. php artisan route:list --path= "proyectos"

3. En el controlador de proyecto enseñar los proyectos con un componente Inertia 
- return Inertia::render("proyecto/listado",['proyectos' =>$proyectos]); 
	- Se podria hacde por compact
4. Cremos la carpeta *proyectos* en /Pages, ahi ira a buscar las paginas
	1. Creamos la pagina Listado y usamos el Layout y como children return una tabla Donde mostraremos el contendio 