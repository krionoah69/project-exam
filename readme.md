## About Project

Este proyecto fue realizado para postulación de la empresa Agilgob
>author L.I. Rafael Rojas Jacuinde


## step  1 - clone repo

Clonar el repositorio [krionoah project](https://github.com/krionoah69/project-exam.git)


## step  2 - Instalar las dependencias

Instalamos las dependencias con el comando:

`composer install`


## step  3 - Crear el archivo .env

Generamos el archivo con el siguiente comando: 

`cp .env.example .env`

Al copiarlo generamos una key con:

`php artisan key:generate`

configuramos nuestra base de datos dentro del archivo (en nuestro caso contamos con un archivo yml para el docker de nuestro mysql(opcional)).


## step 4  - migraciones

Después de generar nuestra base de datos, seguimos con las migraciones y corremos también las seeds

`php artisan migrate:refresh --seed`

Con esto tendríamos todo para comenzar a trabajar ;)


## step 5 - Correr el proyecto

con esto ya podremos correr nuestro proyecto:

`php artisan serve`


## Front

