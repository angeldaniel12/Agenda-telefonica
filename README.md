
# Agenda telefonica
Sencilla agenda para crear, editar y borrar contanctos usando laravel con vue.



## Requisitos
Requisitos minimos:

- PHP >= 8.0
- Composer
- MySQL o base de datos compatible
- Servidor web Apache (XAMPP)




## Run Locally

Clonar el repositorio del proyecto 

```bash
  git clone https://github.com/angeldaniel12/Agenda-telefonica.git
```

Ir al directorio del proyecto

```bash
    cd Agenda-telefonica
```




## intalacion

```javascript
composer install
npm install

```
Configura la base de datos en tu archivo .env con tus credenciales correspondientes:
 
```javascript
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306   
 DB_DATABASE=mibasededatos
 DB_USERNAME=root
 DB_PASSWORD= *********

```
Ejecuta las migraciones con el siguente comando

```javascript
php artisan migrate
```

Inicia el servidor Laravel:
```javascript
php artisan serve
```

Accede desde tu navegador a:
http://127.0.0.1:8000

Compila los asstes y css 

```javascript
npm run dev
```

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## Capturas

![Example Image](https://drive.google.com/uc?export=view&id=1giRcozYBpIH_sC2uvFiNmL8m6on0oDtS)
![Example Image](https://drive.google.com/uc?export=view&id=1kSCxWrfY0bkroNJenTnI58SfJtX870dw)
![Example Image](https://drive.google.com/uc?export=view&id=1BPgQEsJSdSWYf5YykNfX_EUeq9eQfloV)
![Example Image](https://drive.google.com/uc?export=view&id=1hCzbWi9YkteuPBq6KJhCQMwzypumPVoL)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
