# CRUD - Errores y validaciones


## [[Postman]]: Probar solicitud REST

---
## Status solicitud : Tipos
Indican el resultado de la solicitud realizada entre cliente-servidor.

> [!info]- Tipo de Status REST
> 1. **Éxito (2xx)**:
>     
>     - **200 OK**
>     - **201 Created**
>     - **204 No Content**: Solicitud exitosa sin contenido, para _eliminacion_ 
> 2. **Redirección (3xx)**:
>     
>     - **301 Moved Permanently**: Url solicitada movida  *permanentemente* nueva ubicación. 
>     - **302 Found**: Url solicitada movida  *temporalmente* nueva ubicación
>     - **304 Not Modified**: Sin modificar desde ultima solicitud
> 3. **Error del cliente (4xx)**:
>     
>     - **400 Bad Request**: Sintaxis incorrecta o parámetros no validos.
>     - **401 Unauthorized**: Requiere autentificación
>     - **404 Not Found**: Servidor no pudo encontrar el recurso.
>     - **406 Not Acceptable**: No cumple las normas requeridas. Header
>     - **422 Error en validación datos**: No se validan con las reglas del request.
> 1. **Error del servidor (5xx)**:
>     
>     - **500 Internal Server Error**: Error genérico en el servidor
>     - **502 Bad Gateway**: Indica que el servidor actuó como puerta de enlace o proxy y recibió una respuesta no válida del servidor ascendente.
>     - **503 Service Unavailable**: Sin servicio temporalmente


> [!help]+ Handler - Clase manejar errores
> >_api/Exceptions/Handler.php_
> 
> Desde donde manejar el mensaje en caso de producirse determinado error. 



Controlar el mensaje en caso de producirse determinado error.  Realizaremos una respuesta Json `"errors=>[ ]`

---

### DB: Error en database: 500
Sobrescribimos el método <span style="color:pink;">render</span> de la clase Handler. 

> [!bug]+ Database Error - 500
> > *app/exceptions/Handler/render()*
> ```php
> public function render($request, Throwable $exception)
> {  
>     if ($exception instanceof QueryException)  
>         return response()->json([  
>             "errors" => [  
>                 "status" => "500",  
>                 "title" => "Database Error",  
>                 "detail" => "Error procesando la respuesta"  
>             ]  
>         ],500);  
>   
>     return parent::render($request, $exception);  
> }
> ```


> [!Tip] [[Docker#Levantar - bajar contedor| Comprobar bajando el docker de la DB.]]


---
### HEADER: Validación : 406
Validar que las solitudes que se hagan a nuestra APi se hagan con un encabezado: ***application/vnd.api-json.*** Necesitamos crear un [[Conceptos#^17e7cd|Middleware]].
1. [[Artisan#Middleware crear|Creamos el Middleware en Artisan ]]

> [!attention]+ Header Validation - 406
> > *app/Http/Middleware/HeaderMiddleware,php*
> ```php  
>         public function handle(Request $request, Closure $next): Response
>         {
>                 if ($request->header('accept') != 'application/vnd.api+json') {
>                 return response()->json([
>                         "errors"=>[
>                         "status"=>406,
>                         "title"=>"Not Accetable",
>                         "deatails"=>"Content File not specifed"
>                         ]
>                 ],406);
>                 }
>                 return $next($request);
>         }
> ```

- **_next()_ -**> Pasa a la siguiente peticion

2. **Asociamos el Middleware a la ruta en _kernel.php_**. Especificar uso
>  *app/Http/Kernel./HeaderMiddleware,php

```php
'api' => [  
    \Illuminate\Routing\Middleware\SubstituteBindings::class,  
    HeaderMiddleware::class,  
],
```

---
### GET: Registro no existe: 404 (not found)
Si un registro no existe devolver una respuesta estado 404 (not found).
1. Implementamos en *Controlador* en los métodos: *show, destroy, update.* Siempre y cuando se solicita un registro.

> [!bug]+ Registro no existe - 404 
> >  *app/Http/Controllers/AlumnoController
> ```php
> public function show(int $id)  
> {  
>     //  
>     $alumno = Alumno::find($id);  
>     if (!$alumno) {  
>         return response()->json([  
>             "errors" => [  
>                 "status" => "404",  
>                 "title" => "Resource not found",  
>                 "details" => "$id Alumno not found"            ]  
>         ], 404);  
>     }  
>     return new AlumnoResource($alumno);  
> 	/*//En caso de destroy ()
> 	$alumno->delete();  
> 	return response()->noContent();*/
> }
> ```


> [!success]- Check Postman show() GET
> Comprobamos realizando la peticion de un registro que sepamos que no existe en [[Postman]].
> >No encuentra registro 404
> 
> ![[Pasted image 20240228201318.png]]
> 
> >Encontrado con éxito 200
> 
> ![[Pasted image 20240228211126.png]]

---

### POST/PUT/PATCH: Validar datos Formulario: 422

Vamos a validar que los datos enviados a la API para crear (POST) o actualizar (PUT/PATCH) cumplan las normas de validación que el programador elige. 
#### POST Crear registro. *StoreRequest*
1. Creamos Store Request
```php
php artisan make:request AlumnoStoreRequest
```


> [!info] Clase ***Request***
> Clases para validar los datos de entrada de solicitudes HTTP. Objetivos:
> 	- Autorizar la acción
> 	- Validar los campos del recurso
> Crearemos *FormRequest* para [[Artisan#Request crear|store(POST) y update(PUT). ]]

---
2. Indicamos las normas que ha de cumplir cada campo en *rules()*. 
```php
public function rules(): array  
{  
    return [  
        "data.attributes.nombre" =>["required","min:5"],  
        "data.attributes.direccion" =>"required",  
        "data.attributes.email" =>["required","email",  
            Rule::unique("alumnos", "email")->ignore($this->alumno)]  
    ];  
}
```
> Los datos estructurados en *data.attributes.campo*

> [!warning]- Autorizar entrada de datos
> ```php
> public function authorize(): bool
> {
> return true;
> }
> ```

---
3. Validar en Handler. Añadir `*protected function invalidJson()` 
>Devuelve error por cada uno de los requisitos que no cumpla formulario. 

```php
    protected function invalidJson($request, ValidationException $exception):JsonResponse
    {
        return response()->json([
            'errors' => collect($exception->errors())->map(function ($message, $field) use
            ($exception) {
                return [
                    'status' => '422',
                    'title'  => 'Validation Error',
                    'details' => $message[0],
                    'source' => [
                        'pointer' => '/data/attributes/' . $field
                    ]
                ];
            })->values()
        ], $exception->status);
    }
```

---
4. Handler->Renderizar respuesta con el nombre de la excepción que tira 422 

```php
public function render($request, Throwable $exception)  
{  
    if ($exception instanceof ValidationException)  
        return $this->invalidJson($request, $exception);
```
---
5. _Controlador_-> Crea el nuevo registro con los datos validados por el *StoreRequest*. si hay fallo devuelve el render con el objeto 
```php 
	public function store(AlumnoFormRequest $request)  
{  
    $datos = $request->input("data.attributes");  
    $alumno = new Alumno($datos);  
    $alumno->save();  
    return new AlumnoResource($alumno);  
}
```

> [!error]- Si hay fallo, el Handler  devuelve el render con el tipo de excepción, el campo. 

---

6. En el controlador al llamar método *store()* metemos los datos al request, aplica las normas indicadas en el StoreFormRequest
	1. Especificar el tipo de request pasado de request -> *AlumnoFormRequest*
```php 
	public function store(AlumnoFormRequest $request)  
{  
    $datos = $request->input("data.attributes");  
    $alumno = new Alumno($datos);  
    $alumno->save();  
    return new AlumnoResource($alumno);  
}
```

> [!success]- Check validación store() POST
> >No deja repetir *email* nombra error y status 422.
> 
> ![[Pasted image 20240228205421.png]]
> >Creado con éxito 201

---

#### PUT/PATCH: Actualizar registro . *UpdateRequest*
*UpdateAlumnoFormRequest*
1. Igual que *store().*  Modificaciones para diferenciar entre actualización completa o parcial 
	- Comprobar si en solicitud PATCH el campo a validar existe, y si lo hace validarlo. 

> [!example]- Metodo update() - Codigo
> ```php
> public function update(Request $request, int $id)  
> {  
>     $alumno = Alumno::find($id);  
>     if (!$alumno) {  
>         return response()->json([  
>             "errors" => [  
>                 "status" => "404",  
>                 "title" => "Resouce not found",  
>                 "details" => "$id Alumno not found"            ]  
>         ], 404);  
>     }  
>     $verbo = $request->method();  
>     switch ($verbo) {  
>         case "PUT":  
>             $rules = [  
>                 "data.attributes.nombre" => ["required", "min:5"],  
>                 "data.attributes.direccion" => "required",  
>                 "data.attributes.email" => ["required", "email",  
>                     Rule::unique("alumnos", "email")->ignore($alumno)]];  
>             break;  
>         case "PATCH":  
>             if ($request->has("data.attributes.nombre"))  
>                 $rules["data.attributes.nombre"] = ["required", "min:5"];  
>             if ($request->has("data.attributes.direccion"))  
>                 $rules["data.attributes.direccion"] = "required";  
>             if ($request->has("data.attributes.email"))  
>                 $rules["data.attributes.email"] = ["required", "email",  
>                     Rule::unique("alumnos", "email")->ignore($alumno)];  
>             break;  
>     }  
>   
>     $datos_validados = $request->validate($rules);  
>     foreach ($datos_validados["data"]["attributes"] as $campo => $valor)  
>         $datos[$campo] = $valor;  
>   
>     $alumno->update($datos);  
>     return new AlumnoResource($alumno);  
> }
> ```

> [!success]- Check Postman update() PUT/PATCH
> >Request error. Unprocess content 422
> 
> ![[Pasted image 20240229092118.png]]
> 
> >Actualizado con éxito 200
> 
> ![[Pasted image 20240229091954.png]]

---


### DELETE: 404 (not found)
Mismo estatus no encuentra registro para borrar. Añadir [[#Registro no existe 404 (not found)|manejo del error]] al metodo *destroy()* 

> [!success]- Check Postman destroy() DELETE
> >No encuentra registro 404
> 
> ![[Pasted image 20240228210814.png]]
> 
> >Destruido con éxito 204
> 
> ![[Pasted image 20240228210839.png]]





