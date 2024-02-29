---
tags:
  - laravel
  - php
  - crud
title: Crear tablas
---
## 01. [[Artisan#Crear todo (model, seed, factory)|Generar ecosistema Crud: Alumno]] 
>Ejemplo con modelo ***Alumno***

Explicar que se enera

---
## 02 Crear tabla 
#### 02.1 Esquema tabla: *create_alumnos_table*

En la generación del modelo Alumnos se el archivo:

> [!hint] Ruta
> _'nombreProyecto'/database/migrations/_create_alumnos_table.phap_

Este archivo tiene los metodos _up_ y _down_. En el primero especificamos el esquema con la clase **Schema::create**.
```php funtion up()
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("email");
            $table->string("dir");
            $table->string("dni");
            $table->timestamps();
        });
    }
```
#### 02.2 Desde Modelo llamar a la tabla creada. 

Especificar la tabla de la BD a la que esta asociada el modelo:

```php
class Alumno extends Model{
    use HasFactory;
    protected $table="alumnos";
}
```
---
## 03 Poblar tabla *Alumno*
#### 03.1 Modificar ***AlumnoFactory***
> [!info] Factory
> **Factory** es la fábrica donde indicamos las reglas para generar nuestros nuevos registros como los construiremos. Se especifica como se fabrican los registros.

> *nombreProyecdto'/database/factories/AlumnosFactory*<br>

En el método *definition()*:
```php 
public function definition(): array
    {
        return [
            "nombre"=>fake()->name(),
            "dir"=>fake()->address(),
            "email"=>fake()->email(),
            "dni"=>$this->dni()
        ];
    }
```
Vamos a *config/app.php* para cambiar el idioma a la hora de crear los nombres (En este caso)

```php
        'faker_locale' => 'es_ES',  
```
<br>

Si queremos especificar reglas elaboradas de creación. **Funcion dni**:
``` php 
 private function dni(){
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $num_dni = fake()->randomNumber(8,true);
        $num_dni= $num_dni<0? -($num_dni): $num_dni;
        info("número generao $num_dni");
        $letra = $letras[$num_dni%23];
        $dni = "$num_dni-$letra";
        return $dni;
    }
```
#### 03.2 Generar los registros: ***AlumnoSeeder***

> Database seeder: *nombreProyecto'/database/seeders/DatabaseSeeder.php*
> Alumno: *nombreProyecto'/database/seeders/AlumnosSeeder*.php

1. Llamamos al seeder de Alumno desde _databaseSeeders_

```php
    $this->call([
        AlumnoSeeder::class,
        ProfesorSeeder::class    
    ])
}
```

2. Llamamos a al _factory_ de Alumno y especificamos cuantos registros:

```php
class AlumnoSeeder extends Seeder{
    public function run (): void {
        Alumno::factory()->count(100)->create();
    }
}
```

- _create()_ → Inserta los valores de factory en la tabla _Alumno_ de la BD.

#### [[Artisan#Ejecutar Seeders|03.3 Ejecutar Seeders]]


--- 
## [[Artisan#Migrar tablas de la base de datos|04 Migración de la tabla]] 

