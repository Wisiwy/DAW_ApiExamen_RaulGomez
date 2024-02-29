# Componentes

## Laravel: *blade.php
### Carpeta donde se guardan
`resources/views`
Archivos *nombre.blade.php*
```html
<title>@yield</title>
```
Elementos que empiezen por x -> busca los blade.layouts

---

## React: .jsx
>Resources carga la página con los componentes dados. 
Las paginas de react extensión *pag.jsx* -> Tiene html y CSS. 

> [!help]- Carpeta donde se guardan
> *resources/js/app.jsx*
#### 01 Cargar componente 
> *routes/web.php*
```php
Route::get("main", fn() => Inertia::render("main")  
);
```
#### 02 Crear _main_ en /pages
```php
export default function Main() {  
// solicitar url Main  
return (  
    <>  
    <h1 className="text-4xl text-red-500">  
        Esto es un componente de react.  
    </h1>  
        <h2>            Otro titulo  
        </h2>  
    </>)  
}
```


> [!attention]+ Componente vacío `</>`
> Solo se puede devolver un elemento si esta envuleto en componente vacio
#### 03 Crear _MainController_ y llamar al componente
```bash
php artisan make:controller MainController -i
```
 `-i` -> crea el método *invoke*
 
 ```php
Route::get("main", MainController::class  
);
}
```
En el main controller invocar al componente *main.jsx*
``` php
public function __invoke(Request $request)  
{  
    return Inertia::render("Main");  
}
```

#### 04 Recibir *props* en el componente

1. En el controlador creo variables.
```php
	class MainController extends Controller  
{  
    /**  
     * Handle the incoming request.     */    public function __invoke(Request $request)  
    {  
        $num= rand(1,10);  
        $nombre= "Manolito";  
        return Inertia::render("main", compact("num", "nombre"));  
        //  
    }  
} ``` 
2. El component lo recive en variable ***props***
```php
export default function Main(props) {  
    const nombre = props.nombre;  
    const num = props.num;  
// solicitar url Main  
return (  
    <>  
        <h1 className="text-4xl text-red-500">  
            Esto es un componente de react.<br/>  
            {num * 4}<br/>  
            Valor de nombre <span className="text-green-800"> {nombre}</span> <br/>  
            Valor de num <span className="text-blue-500"> {num}</span> <br/>  
        </h1> 
  
    </>)  
}
```

> [!note] Desustructuracion
> Se puede extraer directamente las propiedades que necesitas del objeto `props` sin necesidad de asignarlas a constantes.
> ```javascript
export default function Main({ nombre, num }) {
return(<> <h1> Mi nombre {nombre}</h1>)
>```
> 

---
---



## Tipos de componentes
1. Componentes: botones, forms.
2. Layouts: Header, Nav, Main, Footer
3. Pages: Pagina a devolver con Layout: *resources/js/pages/main.jsx*


