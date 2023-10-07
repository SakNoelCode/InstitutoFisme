<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Aplicación para la gestión de procesos de la FISME
![Img](https://github.com/SakNoelCode/Imagenes_Proyectos/blob/master/institute.png)


## Ejecutar en local
1. Clone o descargue el proyecto en una carpeta en local 

1. Abra el proyecto en su editor de código favorito

1. Ejecute una terminal en la carpeta raíz de su proyecto

1. Ejecute los siguientes comandos en la terminal para la instalación de paquetes **(Debe ejecutarlos en orden)**
```bash
composer install
```
```bash
npm install
```

5. En el directorio raíz encontrará el arhivo **.env.example**, dupliquelo, al archivo duplicado cambiar de nombre como **.env**, este archivo se debe modificar según las configuraciones de nuestro proyecto **(base de datos, etc)**
```bash
DB_DATABASE=nombreBasedeDatos
```

6. Ejecutar el comando en la terminal para crear la **key**
```bash
php artisan key:generate 
```

7. Correr la migraciones del proyecto
```bash
php artisan migrate
```

9. Compilar archivos
```bash
npm run dev
```

10. Ejecute el proyecto
```bash
php artisan serve
```