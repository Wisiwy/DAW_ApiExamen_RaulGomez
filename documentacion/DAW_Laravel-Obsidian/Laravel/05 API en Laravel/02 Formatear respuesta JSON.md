## Formatear respuesta

Al realizar una petición a la API esta le devuelve la info solicitada en un formato estandarizado en el protocolo [[00 ¿Qué es un API?#^f171c8|REST]].
Para poder manejar el formato de la respuesta necesitamos crear la clase [[Artisan#Crear Resource & Collection|ResourcesAlumno y CollectionAlumno]]. 

Para llevar a cabo el formateo: 
#### 01 Devolver *Resource* desde AlumnoController
1. Recoger registros con : ***Alumnos::all();***
2. Devolverlos con *json(alumnos)* o con [[02 Formatear respuesta JSON#^030956|AlumnoCollection]]. 
```php
        public function index()
        {
            $alumnos = Alumno::all();
            //return response()->json($alumnos);
			return new AlumnoCollection($alumnos);
        }
        public function show(Alumno $alumno)
        {
             return new AlumnoResource($alumno);
        } 
```

> [!NOTE] show()-> devuelve $alumno con el formato indicado en AlumnoResource
---

#### 02 Indicar el formato en *AlumnoResource*
```php
public function toArray(Request $request): array  
{  
    return[  
        "id"=>(string)$this->id,  
        "type"=>"Alummnos",  
        "attributes"=>[  
            "nombre"=>$this->name,  
            "direccion"=>$this->direccion,  
            "email"=>$this->name  
        ],  
        "links" => [  
            "self" => url("api/alumnos/" . $this->id)  
        ]  
    ];  
}
```


> [!bug] Probar a cambiar "$request" -> "$this". 

> [!attention] Por defecto los datos son devueltos envueltos en **data{}**

<br>

##### AlumnoCollection() + with()

^030956

Esta clase aplica el formato de Resource al array pasado. 
Se llama en el método *index()* de *AlumnoControlador:*
	`return new AlumnoCollection($alumnos);`

> [!hint]- Campo adicional -> with()
> Usar *with()* en caso de querer añadir un campo adicional en la respuesta a la collection y no a cada uno de los registros. Usar *with()*.
> ```php
>         public function toArray(Request $request): array{
>                 return parent::toArray($request);
>         }
> 
>         public function with(Request $request)
>         {
>                 return[
>                 "jsonapi" => [
>                         "version"=>"1.0"
>                 ]
>                 ];
>         }
> ```

## ➡️ Siguiente: [[03 CRUD - Errores y Validaciones]] 