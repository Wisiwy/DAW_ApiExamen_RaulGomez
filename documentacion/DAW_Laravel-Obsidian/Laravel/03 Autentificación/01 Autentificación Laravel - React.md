- [ ] Realizar autentificación solo con laravel 
- [x] Con React ✅ 2024-02-19


[[Breeze]] es el paquete que facilita esto
clase **auth()** : datos usuario logueado. ejemplo auth()->user()->name
# Laravel

## Procedimiento
1. *app/Http/Controllers/Auth/AuthentificatedSessionController* - Ruta 
2. PASO1 Devovler la vista del formulario:`return view (‘auth.login)` 
>Se puede cambiar o crear otro siempre don 2 cajas uno ‘email’ otro ‘password’

3. 2.PASO -> submit - pos a ruta llamada login. En app/Providers/ routeServideProvider public const donde te devuelve una vez logado HOME.
### Cuando aprete boton ir a pagina de login

1. Layout header botón cambiar de button.
```html
<a href="{{route("login")}}" class="btn glass">Acceder</a>
```
    
Modificamos la ruta para que el formulario de inicio de sesión se muestre en la página principal (`main`) en lugar de en una página aparte. Se debe modificar el archivo `login.blade.php` para lograr este cambio."
![](https://lh7-us.googleusercontent.com/v5ntmZOyfbvrCirnGLpw13qtZ-bdDd8_gfvp-Oc5nKUqhIFYIOa5VmvAJyyScpih26iNDhslc4HVXrHvP_b2gH47Jki5julmfN00R5qyIwq3k4KYarMPdU4cQZqEgX1n6uMjjPCIJD8Mdjg-ccQGhO8)
#### Etiquetas importantes
###### @guest

> [!@guest]-
> En layout estiqueta para que vean invitados: `@guest @endguest` 
> Mostrar botón para registrate
###### @auth
Si estoy autentificado: `@auth @endauth`
mostrar nombre de usuario: `{{auth()->user() ->name}}`
###### @csrf

> [!danger]- @csrf - Seguridad
> "Modificamos la ruta para que el formulario de inicio de sesión, generado desde la aplicación, se muestre en la página principal (`main`) en lugar de en una página aparte. Esto asegura que, al utilizar `@csrf`, se indique que la solicitud proviene exclusivamente de la propia aplicación, garantizando así su autenticidad y seguridad."





# React
#### 01 Referenciar botónes: login, register. 
```html
<a href="login" className="btn glass text-white">Acceder</a>  
<a href={route(login)} className="btn glass text-white">Registrarme</a>
```

> [!tip]- Etiqueta `<Link>`
> Se realiza solo peticion del componente  no de la pagina entera. 
> ```js
import {Link} from "@inertiajs/react"; 
> ``` 

#### 02 Modificamos *Login.jsx*
En return cambiar etiqueta *GuestLayout* por nuestro Layout. 
> [!example]- Codigo login.jsx
> ``` php 
> import { useEffect } from 'react';  
> import Checkbox from '@/Components/Checkbox';  
> import GuestLayout from '@/Layouts/GuestLayout';  
> import InputError from '@/Components/InputError';  
> import InputLabel from '@/Components/InputLabel';  
> import PrimaryButton from '@/Components/PrimaryButton';  
> import TextInput from '@/Components/TextInput';  
> import { Head, Link, useForm } from '@inertiajs/react';  
> import Layout from "@/Layouts/Layout.jsx";  
>   
> export default function Login({ status, canResetPassword }) {  
>     const { data, setData, post, processing, errors, reset } = useForm({  
>         email: '',  
>         password: '',  
>         remember: false,  
>     });  
>   
>     useEffect(() => {  
>         return () => {  
>             reset('password');  
>         };  
>     }, []);  
>   
>     const submit = (e) => {  
>         e.preventDefault();  
>   
>         post(route('login'));  
>     };  
>   
>     return (  
>         <Layout>  
>             <div className="flex items-center justify-center h-full p-5 rounded-2xl">  
>                 <div className="w-full max-w-md h-full">  
>   
>                     <Head title="Log in"/>  
>   
>                     {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}  
>   
>                     <form onSubmit={submit}>  
>                         <div>                            <InputLabel htmlFor="email" value="Email"/>  
>   
>                             <TextInput                                id="email"  
>                                 type="email"  
>                                 name="email"  
>                                 value={data.email}  
>                                 className="mt-1 block w-full"  
>                                 autoComplete="username"  
>                                 isFocused={true}  
>                                 onChange={(e) => setData('email', e.target.value)}  
>                             />  
>   
>                             <InputError message={errors.email} className="mt-2"/>  
>                         </div>  
>                         <div className="mt-4">  
>                             <InputLabel htmlFor="password" value="Password"/>  
>   
>                             <TextInput                                id="password"  
>                                 type="password"  
>                                 name="password"  
>                                 value={data.password}  
>                                 className="mt-1 block w-full"  
>                                 autoComplete="current-password"  
>                                 onChange={(e) => setData('password', e.target.value)}  
>                             />  
>   
>                             <InputError message={errors.password} className="mt-2"/>  
>                         </div>  
>                         <div className="block mt-4">  
>                             <label className="flex items-center">  
>                                 <Checkbox                                    name="remember"  
>                                     checked={data.remember}  
>                                     onChange={(e) => setData('remember', e.target.checked)}  
>                                 />  
>                                 <span className="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>  
>                             </label>                        </div>  
>                         <div className="flex items-center justify-end mt-4">  
>                             {canResetPassword && (  
>                                 <Link  
>                                     href={route('password.request')}  
>                                     className="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"  
>                                 >  
>                                     Forgot your password?  
>                                 </Link>  
>                             )}  
>   
>                             <PrimaryButton className="ms-4" disabled={processing}>  
>                                 Log in  
>                             </PrimaryButton>  
>                         </div>                    </form>                </div>            </div>        </Layout>);  
> }
> ```

> Las rutas de Login y Register las crea Breeze en la carpeta *resources/js/pages/Auth**