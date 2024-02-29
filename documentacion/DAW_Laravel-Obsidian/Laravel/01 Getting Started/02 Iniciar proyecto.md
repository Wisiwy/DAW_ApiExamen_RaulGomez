---
title: primeros pasos laravel
tags:
  - laravel
  - tutorial
  - frameworks
  - php
  - docker
date: 2024-02-20
---
### Iniciar un proyecto 
0. [[01 Instalación#3. Crear proyecto con Laravel | Crear proyecto]]
1. [[Docker#Dockerizar la DB|Dockerizar la DB]]
2. [[Artisan#Levantar servidor|Levantar el servidor]]
>[!info] 
> [[03 Estructura de carpetas]]

3. Instalar paquetes de **front** (se crea carpeta *node-modules* con info de *package.json*):  
```bash
	npm install
```
4. Instalar paquetes del **back** (carpeta vendor y librerias en composer.jon) -> [[Composer#Actualizar composer| Actualizar composer]]
5. Levantar servidor front: Ejecutar script dev [[Breeze (Autentificación)|Vite]] levante servidor. 
6. [[Artisan#Migrar tallas de la base de datos.| Migrar tablas  de la base de datos]]
7. 
	1. php artisan migrate
	
