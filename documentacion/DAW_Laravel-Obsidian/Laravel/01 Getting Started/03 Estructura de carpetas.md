 - [ ]  Poner en columnas la info. 
![[Estructura de carpetas. 20240206110050.png]]
## Info carpetas
* **/*app*** -> donde ira nuestra aplicación
	* */http/**Controllers*** -> Ubicación de los controladores (*Alumnos, Profesores*)
	* */**Models*** -> Modelos. Clase que interactua con la BD. 
		* *ORM Eloquent* -> Mapeo de objeto con una tabla.
	* *http/**Middleware***-> Ejecución entre la petición y la respuesta
* ***/bootstrap*** -> <span style="color:crimson">Nada que ver con la libreria Css </span> Primeros pasos. Lo que hace la app cuando arranca.     
* ***/config*** -> Configuración de la aplicación 
	* En lugar de darle valor, se envuelve en funcion ***env().*** Las variable se configuran en archivo ***.env***.
* ***/database***
	* */factories*
	* */migrations*
	* */seeders*
* ****/public*** -> Única carpeta que el cliente tendrá acceso. (iconos, imágenes…) 
* **/resources** -> Pre-plubic, frameworks de CSS, JS... Se transpilan archivos de los frameworks a CSS.
	* **/views** -> <span style="color:crimson">¡Importante!</span> Las vistas en producción. Nuestras paginas HTML.
		* ***/layouts*** -> plantillas para el Html. Estructuras. Html propio de Laravel
* ***/routes*** -> 
	* /web -> <span style="color:crimson">¡Importante!</span> 
* ***/storage*** -> logs - logs.txt - Errores que vayan ocurriendo. 
* ***/vendor*** -> contiene las dependencias que requiere la app. (no suir a git)
* ***.env*** -> Las variables de enviroment.

