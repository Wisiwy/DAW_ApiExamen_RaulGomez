---
parent: [[Index - Laravel]]
---

[![[maxresdefault.jpg]]](<https://laravel.com/docs/10.x/eloquent-resources#main-content)>)

## Índice
- ¿Qué es un API?
- REST: protocolo de estandarización. ^831e43
- Peticiones HTTP. 
- Recurso. Formato JSON
- Códigos estado y excepciones. Errores.
---
## ¿Qué es un API?


Una API **(Interfaz de Programación de Aplicaciones)** ofrece los datos de tu base de datos de manera segura a terceros sin exponerla. Aceptar solicitudes y entregar información con un formato especifico. 
Puede utilizar  tanto REST como SOAP como principios de estructuración.

![[Pasted image 20240228123937.png]]
> [!Note]- SOAP (Protocolo Simple de Acceso a Objeto)
> Es un protocolo de comunicación definido por estándares, como el W3C, que utiliza XML para la transmisión de 
> mensajes entre aplicaciones.
> A diferencia de REST, que utiliza principalmente HTTP, SOAP puede trabajar sobre otros protocolos de red.


>[!success]- REST (Transferencia de Estado Representacional)
>Estilo arquitectónico basado en **estándares** y **recomendaciones** que se utilizan para diseñar sistemas de comunicación en la web. **Principios REST**. Más usada al ser más accesible que SOAP
>1. Arquitectura Cliente -Servidor
>2. Interfaz uniforme como hacer la consultas.

^f171c8





---
## Peticiones Http (Verbos Http)

- **GET**: Recupera datos del servidor especificado en la URI sin modificarlos. Es utilizado para **solicitar** información.    
- **POST**: Envía datos al servidor para **crear** un nuevo recurso. Los datos se envían en **formato JSON** y el servidor responde con valores especificados en JSON.
- **DELETE**: **Elimina** el recurso especificado en la URI del servidor. 
- **PUT**: Envía datos al servidor para **actualizar un recurso completo**. Se envían todos los campos y el recurso se modifica en su totalidad.
- **PATCH: Envía datos al servidor para actualizar parte de un recurso. No hay necesidad de enviar todos los datos.**
---
## Recurso. Info JSON
El protocolo REST da recomendación para estructura la respuesta del JSON que devolverá nuestra API. 
Cada recurso debe tener una URL **unica.**


> [!info]- Estructura REST para Json
> ```json
> {
>   "data": {
>     "type": "project",
>     "id": "1",
>     "attributes": {
>       "id": "1",
>       "titulo": "...."
>     },
>     "relationships": {
>       "users": {
>         "data": {
>           "type": "users",
>           "id": "3"
>         }
>       },
>       "teachers": {  
>         // . . . 
>       }
>     },
>     "links": {
>       "self": "http://localhost:8000/projects/1"
>     },
>     "meta": {}
>   },
>   "errors": [
>     {
>       "status": "404",
>       "code": "not_found",
>       "title": "Recurso no encontrado",
>       "detail": "El recurso solicitado no se pudo encontrar en el servidor."
>     },
>     {
>       "status": "400",
>       "code": "invalid_request",
>       "title": "Solicitud inválida",
>       "detail": "La solicitud enviada al servidor es inválida."
>     }
>   ],
>   "jsonapi": {
>     "version": "1.0"
>   }
> }
> ```

>[!example]- En nuestra API - *AlumnoResource*
> En nuestra API, lo configuraremos en el método *toArray()* de la clase *AlumnoResource*.
> ``` php 
> public function toArray(Request $request): array  
> {  
>     return[  
>         "id"=>(string)$this->id,  
>         "type"=>"Alummnos",  
>         "attributes"=>[  
>                 "nombre"=>$this->nombre,  
>                 "direccion"=>$this->direccion,  
>                 "email"=>$this->email,  
>         ],  
>         "link"=>[  
>             'self' =>url('api/alumnos/'.$this->id)  
>         ]  
>     ];  
> }
> ```

## Códigos estado, validaciones y excepciones.

Los errores y validaciones en API REST se utilizan para garantizar la integridad y seguridad de los datos, gestionando adecuadamente excepciones y errores de entrada, mientras que los estados HTTP indican el resultado de una solicitud, como **éxito (200)**, **redirección (3xx)**, error del **cliente (4xx),** o **error del servidor (5xx),** facilitando la comunicación entre cliente y servidor.

## [[01 Getting started|Empieza tu API]] 🚀

## Resumen : PDF Manuel
![[API_REST_FULL.pdf]]