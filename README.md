# Slim Scafold

This is a Slim preconfigured project to create a MVC project based on the [slim/Slim-Skeleton](https://github.com/slimphp/Slim-Skeleton) 
repository from [Slim Framework](https://www.slimframework.com/).

## Dependendies

* php >= 5.5.0
* slim/slim ^3.1
* slim/php-view ^2.0
* corephp/log ^0.2.1
* doctrine/dbal ^2.7

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

## Run the aplication

### Direct run
