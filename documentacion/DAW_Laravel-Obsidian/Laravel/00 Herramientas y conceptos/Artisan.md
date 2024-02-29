---
title: Artisan
aliases:
  - artisan
tags:
  - laravel
  - programacion
date: 2024-02-20
---
- [ ] Añadir imagen. 
- [ ] Hacer lista de comando
---
## Artisan la consola de Laravel

>[!info]+ Artisan - Interfaz linea de comando
>Artisan es la interfaz de línea de comandos de Laravel, que automatiza tareas de desarrollo y administración como la** generación de código** y la **ejecución de migraciones**, permitiendo acciones eficientes desde la línea de comandos.
>🌐 [Artisan - Laravel](https://laravel.com/docs/10.x/artisan) 

> [!tip]
> Podemos crear un alias **("p")** en nuestra bash para php artisan. 
## Lista de comandos 💻
### Levantar servidor 	
``` bash
php artisan serve &
```
### Mirar rutas controlador 	
>-path = "nombre ruta a buscar"
``` bash
php artisan route:list --path='api/alumnos'
```
---
### Ecosistema CRUD
#### Crear todo (model, seed, factory)
```bash 
php artisan make:model "NombreModelo" -all
```
> Modelo API
```bash
php artisan make:model Alumno --api -fm
```

> [!attention]- Archivos Creados
> - _app_/**Models**: Clase que permite interactuar con una tabla concreta de la Base de Datos a través de nuestra aplicacion.
> - _app_/Http/**Controlador**: clase con los métodos que se ejecutarán dependiendo de la situación.
> - _database_/**Migration**: Clase anónima abstracta que sirve para crear o eliminar elementos DDL. Dos métodos: Up or Down. Ejecutar DDL.
> - _database_/**Factory**: Clase para fabricar el tipo de registros que metemos en la tabla.
> -  _database_/**Seeder**: Puebla la BD con los valores fabricados con el modelo _Factory_.

#### Crear solo Modelo
```bash
php artisan  make:model Alumno
```
#### Crear solo Seed
``` bash
php artisan make:seed Alumno
```

#### Ejecutar Seeders
>Ejecuta los seeder de _DatabaseSeeder.php_ se llaman los seeders de los diferentes modelos.
``` bash
php artisan db:seeder
```
#### Crear Resource & Collection
>API - Creacion clase **Resource**
```bash
php artisan make:resource NombreResource
```
>API - Creación clase **Collection**
```bash
php artisan make:resource NombreCollection --collection
```
---
#### Middleware: crear
>API - Creacion clase **Midlleware**
```bash
php artisan make:middleware HeaderMiddleware
```
---
#### Request: crear
>API - Creacion clase **Midlleware**
```bash
php artisan make:request NombreStoreRequest
```


---
### Migrar tablas de la base de datos
``` bash 
php artisan migrate
```
>Poblar tabla
``` bash
php artisan migrate --seed
```
>Borrar y volver a poblar
``` bash
php artisan migrate:fresh --seed
```
##### Mirar lista de rutas 
``` bash 
php artisan route:list
```
Devuelve rutas con nombre
#### Instalar Breeze en el servidor
``` bash
php artisan breeze:install
```
---
