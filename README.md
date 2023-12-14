# Aplicación para el instituto de investigación de la FISME
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

6. Ejecutar el comando para ejecutar la aplicación
```bash
php artisan app:install
```

7. Compilar archivos
```bash
npm run dev
```

8. Ejecute el proyecto
```bash
php artisan serve
```