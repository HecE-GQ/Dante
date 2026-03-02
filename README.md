# Dante-Proyecto
- Aplicacion web desarrollada en PHP nativo, bajo el patrón MVC, orientada a la separacion clara de responsabilidades y organizacion modular del codigo
- El proyecto está estructurado para faclitar mantenimiento, escalabilidad, y despliegue en entornos con Xampp o Lampp.

## Organizacion de estilos (CSS)
### Los estilos estan separados por componentes para mejorar:
- Mantenibilidad
- Escalabilidad 
- Claridad del código 
Cada componente visual tiene su propio archivo CSS para evitar estilos monoliticos y facilitar modificaciones futuras

## Servidor 
 - PHP 8.2.x
 - Apache (Xampp)
 - Mysql/MariaDB 
### Extensiones PHP necesarias:
- PDO
- pdo_mysql
- mbstring 
- openssl 
- curl 
- json
- fileinfo
- zip
## Base de Datos
Previamente creada en el servidor, las credenciales se configuran en el archivo: .env 
## Composer install
El proyecto utiliza Composer como gestor de dependencias para administrar las librerias para su funcionamiento.
### No se incluye la carpeta vendor/ en el repositorio porque:
- Contiene dependencias externas que pueden ser reconstruidas 
- Aumenta innecesariamente el peso del repositorio
- Puede generar conflictos entre entornos 
### En su lugar se incluyen los archivos composer.json y composer.lock 
- Para definir las dependencias y Garantizar que se instalen exactamente las mismas versiones utilizadas durante el desarrollo 
- Al ejecutar composer install. Lee el .lock, Descarga e instala las versiones exactas de cada dependencia 
- Genera automaticamente el archivo vendor/autoload.php 
- Aseguramos consistencia entre entornos de desarrollo y produccion 




