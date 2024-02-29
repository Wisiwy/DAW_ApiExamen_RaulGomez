- [x] Imagen con link a la foto. Linkar a laweb. 

[![[postman.png]]](<https://www.postman.com/)>)

Usar postman para realizar[[00 ¿Qué es un API?#Peticiones Http|peticiones]]  a la API usando es la especificación REST contra un servidor.
## INSTALACION
``` bash
sudo snap install postman
```
Explicación de uso de Postman
#### Peticiones GET en POSTMAN
`http://localhost:8000/api/alumnos` -> obtener todos los alumnos 
`http://localhost:8000/api/alumnoss/1` -> obtener alumno id = 1


![[Pasted image 20240228131016.png]]
![[Pasted image 20240228131049.png]]
#### Solicitud POST en POSTMAN. Crear registro
En el body de postman rellenamos los datos a solicitar. POST crear registro. 
![[Pasted image 20240228131155.png]]![[Pasted image 20240228131220.png]]
![[Pasted image 20240228131510.png]]
#### Solicitud PUT / PATCH en POSTMAN. Actualizar registro

![[Pasted image 20240228131459.png]]



#### Solicitud DELETE en POSTMAN. Delete registro
![[Pasted image 20240228131427.png]]