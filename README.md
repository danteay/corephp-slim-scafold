# Slim Scafold

This is a Slim preconfigured project to create a MVC project based on the [slim/Slim-Skeleton](https://github.com/slimphp/Slim-Skeleton)
repository from [Slim Framework](https://www.slimframework.com/).

## Requirements

* [Composer](https://getcomposer.org/)
* [Docker](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/)
* [AWS-cli](https://aws.amazon.com/cli/?sc_channel=PS&sc_campaign=acquisition_MX&sc_publisher=google&sc_medium=command_line_b&sc_content=aws_cli_e&sc_detail=aws%20cli&sc_category=command_line&sc_segment=161200955400&sc_matchtype=e&sc_country=MX&s_kwcid=AL!4422!3!161200955400!e!!g!!aws%20cli&ef_id=W6vEjwAABFBVLFJw:20180926174031:s)
* PHP >= 7.1
* PHP pgsql extension
* PHP pdo_pgsql extension

## Dependendies

* [Slim Framework](https://www.slimframework.com/)
* [Twig](https://twig.symfony.com/)
* [Slim Twig-View](https://www.slimframework.com/docs/v3/features/templates.html#the-slimtwig-view-component)
* [Monolog](https://packagist.org/packages/monolog/monolog)
* [Predis (redis client)](https://packagist.org/packages/predis/predis)
* [Eloquent ORM](https://laravel.com/docs/5.7/eloquent)
* [JSON Schema](https://packagist.org/packages/mittwald/psr7-validation)
* [JWT](https://packagist.org/packages/firebase/php-jwt)
* [Swiftmailer](https://swiftmailer.symfony.com/)

## Container specifications

* Image: [webdevops/php-nginx:7.2](https://hub.docker.com/r/webdevops/php-nginx/)

## Namespaces

| Namespace   | Route folder        |
|-------------|---------------------|
| Controllers | src/app/controllers |
| Models      | src/app/models      |
| Middlewares | src/app/middlewares |
| Libraries   | src/app/libraries   |
| Helpers     | src/app/helpers     |
| Base        | src/app/base        |

## Install the Application

Run this command from the directory in which you want to install your application.

```bash
php composer create-project corephp/slim-scafold [app-name]
```

Replace `[app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writeable.

## Install project

```bash
composer install
```

## Run the aplication

### Composer execution

#### Build project

```bash
composer build
```

#### Start project

```bash
composer start
```

#### Build and run project

```bash
composer run
```

#### Run development

```bash
composer dev
```

#### Docker compose

```bash
docker-compose up
```

## Deploy app with AWS Pipelines and AWS ECS

Configure yur build steps into **buildspect.yml** file with your AWS ECR information and setup the service configurations into **imagedefinitios.json** file according to the [AWS Documentation](https://docs.aws.amazon.com/AmazonECS/latest/developerguide/ecs-cd-pipeline.html)
