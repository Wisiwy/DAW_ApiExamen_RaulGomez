---
aliases: 
tags:
  - frameworks
  - php
  - programacion
  - laravel
---

## 1. Composer
Laravel usa composer para hacer instalación completa. Viene por defecto en php8. Comprobar version en bash `composer` o `composer -V`.

Utilización de composer para installation.

``` bash
composer -v 
```
---
## 2. Instalador paquetes Laravel
1. Instalar instalador de Laravel con Composer.

```bash 
composer global require "laravel/installer"
```

2. Agregar binarios a $PATH
``` bash
export PATH="$PATH:$HOME/.config/composer/vendor/bin"
```
3. Cargar cambios. o uno u otro. 
``` bash
source ~/.profile
```
``` bash
source ~/.profile
```

---
## 3. Crear proyecto con Laravel
Comando:
``` bash
composer create-project --prefer-dist ruta/nombre proyecto
```
```bash
laravel new "nombre-proyecto"
```
#### Preguntas dentro de la instalación. 
1. *Would you like to install a starter kit?*
2. Breeze 
3. React witn inertia
4. MySql
5. *Which testing framework ?* - Pruebas unitarias (PHPUnit)
6. *Git Init*
7. *Base gestor de datos.*

>[!failure]- Instalar paquetes.
>Necesito instalar paquetes que necesito:
>  - php curl , clm/zip, mysql, mbstring
``` bash
sudo apt-get instal php-curl 
```

---
## 4. Integraciones (react, tailwing)

[[React con Laravel]] 

[[Tailwind y Node]]

#### Instalar daisy. 
1. 
```bash 
npm i -D daisyui@latest
```
2. Llamar a Daisy en *tailwind.config.js*