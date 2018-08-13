# Slim Scafold

This is a Slim preconfigured project to create a MVC project based on the [slim/Slim-Skeleton](https://github.com/slimphp/Slim-Skeleton) 
repository from [Slim Framework](https://www.slimframework.com/).

## Dependendies

* php >= 5.5.0
* slim/slim ^3.1
* slim/twig-view ^2.4
* corephp/log ^0.2.1
* illuminate/database ^5.6
* PHP pgsql extension
* PHP pdo_pgsql extension

## Namespaces

| Namespace   | Route folder        |
|-------------|---------------------|
| Controllers | src/app/controllers |
| Models      | src/app/models      |
| Middlewares | src/app/middlewares |
| Libraries   | src/app/libraries   |
| Base        | src/app/base        |

## Install the Application

Run this command from the directory in which you want to install your application.

```bash
php composer create-project corephp/slim-scafold [app-name]
```

Replace ```[app-name]``` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's ```public/``` directory.
* Ensure ```logs/``` is web writeable.

## Install project

```bash
composer install
```

## Run the aplication

### Direct execution

```bash
php -S 0.0.0.0:8080 -t public index.php
```

### Composer execution

```bash
composer start
```

### Docker compose

```bash
docker-compose up
```
