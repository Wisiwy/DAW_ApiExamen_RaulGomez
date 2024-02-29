## En esta página
1. Creación proyecto API
2. Enrutar en *api.php*
3. Crear, tabla poblar y migrar. 
---
### 01 Creación proyecto Api
Vamos a realizar la API con un modelo *Alumnos* que muestre su información. 

Primeros pasos:
	1. [[01 Instalación#3. Crear proyecto con Laravel|Nuevo proyecto Laravel]]
	2. [[Artisan#Crear todo (model, seed, factory)|Crear modelo API]]
	3. [[Docker#Dockerizar la DB|Dockerizar DB]]
	4. [[Docker#Levantar - bajar contedor |Levantar contenedor]]
	5. [[Artisan#Levantar servidor|Levantar Servidor]]
	<br>
---
### 02 Enrutar: *api.php*
> Llamar al controlador *AlumnoController* desde la ruta */alumno*
```php
Route::apiResource('alumnos', AlumnoController::class);
```

> [!tip]- [[Artisan#Mirar rutas controlador|Comprobar rutas creadas por modelo]]

---
### 03 Crear tabla, poblar y migrar
[[Crear y poblar tablas.]]
> Esquema de la tabla: 
```php 
        Schema::create('Alumnos', function (Blueprint $table) {
                $table->id();
                $table->string("nombre");
                $table->string("direccion");
                $table->string("email");
                $table->timestamps();
            });
```
<br>

### ➡️[[02 Formatear respuesta JSON|Siguiente formatear JSON]]
