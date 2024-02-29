- [ ] Corregir y organizar
Vamos a dockerizar una base de datos con *mySql* y PhpMyadmin.
- [ ] Mirar docker 


## Dockerizar la DB
### 🗄️ Archivos
1. Copiar imagen de *mysql*
2. docker-compose.yaml
![[docker-compose 1.yaml]]
3. Variables de enviroment: *.env*
###### Archivo  .env

```
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=23306

DB_DATABASE=instituto

DB_USERNAME=root

DB_PASSWORD=

DB_PASSWORD_ROOT=root

DB_PORT_PHPMYADMIN=8080
```

> [!danger] Cambiar info
> Revisar nombre y valores de variable de entorno. Cambiar nombre 

---
### 🐳 Lista comandos
##### Levantar - bajar contedor
``` bash
docker compose up -d
```

``` bash
docker compose down
```
##### Parar y borrar contenedor
``` bash
docker stop $(docker ps -a -q)
```
``` bash
docker rm $(docker ps -a -q)
```