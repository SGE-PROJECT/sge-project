<p align="center">
  <a href="https://cdn.discordapp.com/attachments/701571845526126602/1210766300868247604/logo_sge.png?ex=65ebc0fd&is=65d94bfd&hm=cbd8b419ad64b395cdb729fb3e14f290b58889aafc6b1febb897125d556495d9&" target="_blank" style="margin-top: -20px;">
    <img src="https://cdn.discordapp.com/attachments/701571845526126602/1210779355551375480/1708742682327.png?ex=65ebcd25&is=65d95825&hm=bcab5ab0675a63158f068569fa52a206310ad351cc7ffca88d31ad308b1e6bad&" width="400" style="margin-top: -10px;" alt="SGE Logo">
  </a>
<p align="center">
  <a href="#acerca-del-proyecto">Inicio</a> |
  <a href="#manual-de-instalación-del-proyecto-laravel">Instalación</a> |
  <a href="#estructura-de-las-carpetas-en-el-proyecto">Estructura de carpetas y plantillas</a> |
  <a href="#principios-para-escribir-código-limpio-que-seguirá-el-proyecto">Código Limpio</a> |
  <a href="#flujo-de-trabajo-para-git">GIT Workflow</a>
</p>
</p>

<p align="center">
<a><img src="https://img.shields.io/badge/MySQL-8.0.36-blue?logo=mysql" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/Laravel-10.x-red?logo=laravel" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/Composer-2.7.1-orange?logo=composer" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/Tailwind-3.4.1-blue?logo=tailwindcss" alt="License"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/Javascript-2024-yellow?logo=javascript" alt="License"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/Apache-2.4.58-red?logo=apache" alt="License"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/Vite-4.0-purple?logo=vite" alt="License"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/PHP-8.0-purple?logo=php" alt="License"></a>
</p>

# Acerca del proyecto

Este proyecto se centra en el desarrollo del Sistema de Gestión de Estadías para la Universidad Tecnológica de Cancún, diseñado para abordar y optimizar la gestión de prácticas profesionales de los estudiantes. Con el avance tecnológico, se ha identificado la necesidad de una solución más eficiente que mejore la coordinación, supervisión y evaluación de las estadías, frente a un sistema preexistente que se ha vuelto obsoleto.

El objetivo principal es crear una aplicación web intuitiva y centralizada que permita una administración eficaz de las prácticas, simplificando y automatizando procesos para la mejor gestión de las estadías. Este sistema abarcará desde el registro de estudiantes hasta la generación de informes de progreso, asegurando una experiencia de usuario mejorada y una operación más eficiente para la institución.

# Manual de Instalación del Proyecto Laravel

Este manual proporciona una guía paso a paso para instalar y configurar el proyecto Laravel, incluida la actualización de la base de datos.

## Requisitos Previos

Asegúrate de tener instalado:

-   PHP (versión recomendada 8.3.2 o superior)
-   Composer
-   Servidor de base de datos (MySQL)
-   Servidor web (Apache/Nginx)

## Clonar el Repositorio

1. Abre tu terminal.
2. Navega al directorio donde deseas clonar el proyecto.
3. Ejecuta el siguiente comando:

```bash
$ git clone https://github.com/SublimeDevv/sge-project.git

$ cd sge-project
$ composer install
```

4.- Configurar las variables de entorno

```bash
# Si estas en Windows, solo crea el archivo .env en la raíz del proyecto y copia el contenido de .env.example en el .env

# Para Linux o WSL
$ cp .env.example .env
```

5.- Genera la clave de la aplicación para asegurar sesiones y datos encriptados. Esto lo que hará es agregar la clave en el .env, exactamente en el APP_KEY.

```bash
$ php artisan key:generate
```

6.- Para crear la estructura de la base de datos (esto debes hacerlo cada vez que veas una nueva migración), ejecuta:

```bash
$ php artisan migrate

# Si necesitas llenarla de datos, usa la semilla:
$ php artisan migrate --seed
```

7.- Para que los estilos de tailwind funcionen, tienes que ejecutar en otra terminal el comando:

```bash
$ npm run dev
```

7.1.- Si no te deja ejecutar el comando anterior o no cargan los estilos de tailwind, verifica lo siguiente:

```bash
# Ejecuta en la raíz del proyecto
$ npm install
```

Otra razón podría ser porque en el layout que hayas creado no contiene la directiva de Vite para cargar Tailwind, verifica que sea correcto siguiendo el ejemplo:

```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        @vite('resources/js/app.js') @vite('resources/css/app.css') <-- Esta
        línea
        <title>SGE</title>
        <title>@yield('title', 'SGE')</title>
    </head>
</html>
```

8.- Ejecutar el proyecto:

```bash
$ php artisan serve
```

# Estructura de las carpetas en el proyecto

Las vistas son responsables de presentar la información al usuario. Usualmente contienen el HTML que será enviado al navegador, pero también pueden generar otros formatos de datos como JSON para APIs.

## Uso de layouts

Plantillas maestras que definen una estructura de página común a ser utilizada por múltiples vistas. Actúan como un esqueleto sobre el cual se construyen las páginas específicas.

**¿Se pueden tener múltiples layouts?**

Sí. Cada layout puede tener su propia estructura y diseño base, incluyendo diferentes cabeceras, pies de página, estilos CSS y scripts JavaScript.

Ejemplos:

Layout General - resources/views/layouts/app.blade.php

```html
<!DOCTYPE html>
<html>
    <head>
        <title>Aplicación Laravel - General</title>
    </head>
    <body>
        <header>Encabezado General</header>

        @yield('content')

        <footer>Pie de Página General</footer>
    </body>
</html>
```

Layout Administración - resources/views/layouts/admin.blade.php

```html
<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html>
    <head>
        <title>Panel de Administración - @yield('title')</title>
        <!-- Estilos específicos del panel de administración -->
    </head>
    <body>
        <header>Navbar de Administración</header>

        <div class="container">@yield('content')</div>

        <footer>Pie de página de Administración</footer>
    </body>
</html>
```

También, si crearán vistas que extienden de algún layout, usar carpetas para agruparlas.

[Si quieres saber más acerca de los layouts, clic aquí](https://laravel.com/docs/10.x/blade#layouts-using-components)

## Uso de controladores, modelos, requests, etc.

Absolutamente todo debe estar estructurado en subcarpetas, dependiendo de la sección en la que estés trabajando, ejemplo:

```bash
# Para un controlador que tratará de estudiantes, usa:
$ php artisan make:controller Students/StudentController.
```

# Principios para escribir código limpio que seguirá el proyecto

1.- No repetir código. Seguir el principio DRY (Don't Repeat Yourself).

2.- No tener funciones tan extensas de más de 30 líneas, se recomiendan solo 20 por función.

3.- Para nombrar variables, estas deben ser claras y descriptivas, evitando nombres genéricos como data o info. Utiliza nombres que revelen intención, sean fáciles de buscar y diferenciar, evitando abreviaturas confusas y nombres demasiado largos, ejemplos:


**Incorrecto**

```php
// Nombres genéricos y no descriptivos
$data = "2024-01-01";
$d = 10;

// Nombres ambiguos o con abreviaturas no claras
$dt = new DateTime();
$n = "Juan"; // ¿Qué es 'n'?
```

**Correcto**
```php
// Descriptivo y limpio
$startDate = "2024-01-01";
$daysUntilDelivery = 10;

$currentDate = new DateTime();
$customerName = "Harry Kane";
```

**Principio de responsabilidad única:** Una clase debe enfocarse en una sola funcionalidad. No podemos combinar diferentes funcionalidades si no tienen relación, ejemplo:

```php
class Estudiante {
    public $nombre;
    public $matricula;

    public function __construct($nombre, $matricula) {
        $this->nombre = $nombre;
        $this->matricula = $matricula;
    }

    // Métodos relacionados únicamente con las propiedades del empleado, no deben hacer cosas que no tengan relación.
    public function getNombre() {
        return $this->nombre;
    }

    public function getMatricula() {
        return $this->matricula;
    }
}

class GestorEstudiante {
    public function guardarEstudiante(Estudiante $estudiante) {
    }

    public function eliminarEstudiante(Estudiante $estudiante) {
    }
}

```
# Aclaración del idioma

Todo debe ser escrito en Inglés, por recomendación de Laravel.

# Flujo de trabajo para GIT

Usaremos una forma de trabajar con GIT organizada y 
fácil si leen con mucha atención lo siguiente:

<img src="https://buddy.works/blog/images/gitflow.png" width="400">

Existen dos ramas iniciales, **main** y **develop**, ustedes cuando clonen el proyecto, sus ramas deberán
ser creadas a partir de **develop**. Esto se debe a que es la rama que recibirá todos los "merge" de sus ramas. Se vería algo como esto:

```bash
# Cuando clonen el repositorio estarán en main, se mueven a develop
$ git checkout develop

# Si por alguna razón no te aparece la rama develop, usa:
$ git fetch

#Una vez en develop, es en este punto donde crearán sus ramas en las que trabajarán
$ git checkout -b nombre_de_mi_rama # Lo que sería tu feature/característica

# Trabajarán su parte y una vez finalizado, harán el mismo procedimiento de siempre.
$ git add .
$ git commit -m "mensaje del commit"

# Aquí es donde radica la diferencia con la forma que hemos venido trabajando, ya que harán el push de la rama
$ git push origin nombre_de_mi_rama
```
Al hacer el push de esa forma, no se subirá directamente, sino que se creará un pull request y el propietario del repositorio es el que se encargará de hacer el merge con la rama develop.

Ahora, si ya aceptaron tus cambios y 
ya se fusionó con develop, recuerda actualizar 
la rama de forma local, de la siguiente forma:

```bash
# Primero hay que moverse a develop
$ git checkout develop

$ git pull origin develop
```

Y entonces ya tendrás los últimos cambios. Puedes volver a crearte otra rama para trabajar otra característica o actualizar la que ya tenías con los últimos cambios de develop.

**Nota:** Los mensajes de los commits deben ser descriptivos, explicando el "por qué" y no el "cómo."

## Preguntas sobre el flujo de trabajo en GIT

**¿Qué es un pull request?**

Solicitar que otro desarrollador (por ejemplo, el creador del repositorio) incorpore (o haga un pull) una rama de tu repositorio al suyo.

**¿Qué sucede con main?**

Cumple su propósito, es la rama que va a producción. Ustedes nunca tocarán esa rama, no harán merge, push ni pull. Develop es la rama que será para toda la etapa de desarollo.

**¿Entonces mi líder de equipo será el que subirá los cambios?**

No. Al final no decidí usar esa forma porque es mas complicado y requiere coordinación entre todos los miembros.

**¿Qué sucede si se presentan conflictos?**

Directamente no podré aceptar el pull request.

**¿Entonces solo el dueño del repositorio podrá aceptar los cambios?**

Sí, 
pero 
igual tendré a unas personas encargadas para que me ayuden a revisar los pull request.

**¿Puedo seguir trabajando en otra rama o en 
la misma
?**

Si es en la misma, procura actualizar 
la rama con develop, si es otra **mucho cuidado** si intentas borrar la anterior, porque si no te he aceptado los cambios y ya borraste la rama, se perderá todo lo que hayas trabajado.

**¿Puedo seguir trabajando en lo que aceptan mi pull request?**

Sí, no hay ningún problema.

**¿Dónde llega la notificación de que ya aceptaron mis cambios?** 

En la bandeja de Github, recomienda descargar la aplicación de celular para enterarse por la notificación.

