
# CRUD en Laravel
## En esta página
0. Definición CRUD
1. Generar ecosistema CRUD. Modelo
2. Creación de tablas. 
Vamos a realizar un CRUD para el modelo Alumnos.

> Crear (Create), Leer (Read), Actualizar (Update) y Eliminar (Delete). Estas acciones son esenciales para gestionar datos en aplicaciones y sistemas informáticos.

Laravel usa la libreria Eloquent ORM 
> ORM es un marco de trabajo o libreria que nos provee comunicacion entre una base de datos y un lenguaje de programacion.
> Eloquen permite intractuar con la BD. Crea la clase para crear CRUD

---




### Dentro de *ProfesorController*
#### Mostrar datos resultado *index()*
```php
	public function index()  
	{  
	  $profesores = Profesor::all();  
	  return view("profesores.listado",["profesores"=>$profesores]);  
	}
```
1. Recoger todos los datos 



---

---

### Otros conceptos
- **Policy**: Define permisos. 
- **Request**: Validadcion de susuarios.
- **Routes**: Definier las redirecciones.

---
### Comandos interesantes

Recoger todos registros de una tabla (*select * from alumnos*). Por eloquent 
``` php
$alumnos = Alumno::all();
```
--- 


> [!info]- Fillable
>  Creación con asignación masiva
>  Especificar, seguridad que campos permito que compongan el array para instanciar el objeto de la clase.
>  Si tuviera más datos el array que le pasamos solo le ponemos los campos del fillable