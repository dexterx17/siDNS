# Administrador DNS

El siguiente proyecto esta dividido en tres partes:

## Script one.sh
Se utilizo este script para leer los archivos del log de bind que tiene la siguiente estructura:
    20-Nov-2015 09:01:57.945 queries: client 10.102.20.97#36557: query: i.instagram.com IN A + (10.102.12.2)
El scrip lee linea por linea y inserta en la base de datos de 100 en 100 registros.

## Script loader.sh
Este script se lo registra en el crontab del servidor DNS para que se ejecute cada 5 minutos.
    */5 * * * * /loader.sh
Este script identifica el ultimo log del dns y lo lee para cargarlo en la base de datos linea por linea.

## WebApp en laravel(en desarrollo)
Esta aplicacion se la aloja en el servidor dns y se encarga de visualizar los registros insertados en la base de datos; 
la aplicacion tambien permite registrar los dominios a bloquear en un CRUD;
Finalmente la aplicacion permite generar un archivo de zonas en base a los dominios registrados y se agrega en el DNS para restringir el acceso.

## Script reload.sh(pendiente)
Este script aun no se implemento, pero es el encargado de copiar el archivo de zonas generado por la WebApp al directorio de bind y reiniciar el 
servicio de DNS para que los cambios tomen efecto.
