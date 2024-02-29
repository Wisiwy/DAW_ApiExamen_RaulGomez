### Pasos a seguir
1. Instalación node: 
``` bash
curl -fsSL https://deb.nodesource.com/setup_21.x | sudo -E bash - && sudo apt-get install -y nodejs
```
2. Tailwind. Instalación
``` bash
npm install -D tailwindcss postcss autoprefixer
```
3. Crear fichero *tailwind.config.js* para la creación de nuevas clases. 
```bash
npx tailwindcss init -p
```

### Añadir Daisy
> Librería de componentes para Tailwind CSS
> [https://daisyui.com/](https://daisyui.com/)

1. Instalar Daisy
``` bash
npm i -D daisyui@latest
```
2. Llamarlo desde archivo *taildwind.config.js*
	`plugins: [require("daisyui")],`
3. Crear nueva clase (mirar en que archivo)
``` css
/*Crear nueva clase*/
.myheader{
   @apply
   hidden sm:flex  h-15v bg-header text-white flex flex-row justify-around items-center
}
```
 Llamarla revisar en codigo