
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

<img width="497" alt="Image" src="https://github.com/user-attachments/assets/46721983-1b71-44d2-8bd6-d13dbc6b4641" />
<img width="459" alt="Image" src="https://github.com/user-attachments/assets/7a0922e6-4fd4-487c-a968-3e84ca48f986" />
<img width="741" alt="Image" src="https://github.com/user-attachments/assets/33cea9dc-0a55-4c2f-9b58-d711d3b6c448" />
<img width="738" alt="Image" src="https://github.com/user-attachments/assets/1fad6c16-59c3-4130-9f9c-1430a857c1f7" />

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
