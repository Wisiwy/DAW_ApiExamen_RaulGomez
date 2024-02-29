función map recoje la fila del array para cogerla y visualizarla react la necesita. Map recibe como argumento otra funcion (*callback *),
```php 
{proyectos.map( (fila, index) => {  
    //todo  
    return (  
        <tr key={index}>  
            <td>{fila.titulo}</td>  
            <td>{fila.url}</td>  
            <td>{fila.horas}</td>  
        </tr>    )  
})  
}```

Funciones flecha solo si returnean algo. Si hacen algo más. Con llave

fn()=>();

## Reactividad  (react)

Desde la pag web con caja de text modificar una variable. Controlar el estado de la variable. Hook . Cuando se modifique la variable se renderizara la variable instantaneamente.  
Renderiza el último valor de la variable.

## Creacion del componente Tabla generalizada para mostrar 

componente Listado 
```js


```

### Fillable 
Modleo para espedificar  Preguntar chat gpt

>En Laravel, el atributo `fillable` se utiliza en los modelos para especificar qué columnas de la base de datos pueden ser asignadas en masa (a través de la propiedad `create` o `update` en Eloquent). Esto es una medida de seguridad para evitar la asignación masiva no deseada y proteger contra la asignación de campos sensibles.


```php
 protected $fillable = [
        'name',
        'email',
        'password',
    ];
```

### Recoger los campos. de un modelo

En ProyectoController.
```php
public function index()  
{  
    //  
    //recogemos los proyectos        //nombre tabla  
    $nombre = "Proyectos";  
    $proyecto = new Proyecto();  
      
    //Nombre de los campos de la tabla  
    $campos = $proyecto->getFillable();  
      
    //las filas, los proyectos en sí.   
$proyectos = Proyecto::all();  
  
    //renderizamos Con inertia.  
    //hacer un compact    return Inertia::render("proyectos/Listado",compact("nombre","campos","proyectos"));  
}
```

### Tabla general para 
JSX necesita un key 
```js
{filas.map((fila, index) => (  
    <tr key={index}>  
        {/*Recorremos los campos para poner generico la tabla */}  
        {campo.map((campo, index2) =>(  
            <td  key= {index2}>  
                {fila[campo]}  
            </td>  
))}  
</tr>  
))}
```

Los noombres de los campos generico. En campos tengo los campos llenos del fillable. 
Recorro los campos. 
no fila.campo, es fila\[campo] no tengo el nombre teno el nombre. sintaxis de js no es un array es un objeto . 
> Acceder a variable donde tengo variable no el nombre 

### Hacer ordenable los campos

Crearemos hook para saber si ascendente o descencentes. Para cambiar en true o false
Hook boolean con use state
``` js
const[orden, setAscendente] = useState(  
    {orden:campo[0],  
                ascendente:true}  
);
```
Sera hook para que cuando cambie el orden se renderize el componente. Use state

Un array con un campo primero el campo por el que quiero ordenar \[campo] y si es ascendete o descendete\[boolean ascendete]


2. Llamada desde boton en td, evento en javascript. 
	1. Un click ordenar. 
	2. 2 click ascendente descendente

4. Método ordenar (mirar esta sin completar. )
```php 
//Cambiar elvalor entre ascendente o decendente
const ordenar = (nuevoCampo) => {
        console.log(`campo nuevo ${nuevoCampo}`);
        console.log('Orden anterior ' + orden.campo);
        setOrden((ordenActual) => {
            if (ordenActual.campo == nuevoCampo)
                return {
                    campo: nuevoCampo,
                    ascendente: !orden.ascendente
                }
            else
                return {
                    campo: nuevoCampo,
                    ascendente: true

                }
        })

    }
    ```

## Añadir proyecto
1. Añdiir boton. 
2. Añadir iconos https://heroicons.com/
3. Creo handler
``` php 
const handleCreate = () => {  
    //hacer get desde inertia  
    Inertia.get(route("proyecto.create"));  
}
```
Mirar proyecto Manuel. 