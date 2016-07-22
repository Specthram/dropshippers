Pour Tester
===========

Pré-requis:
-----------
  * Composer installé en global sur votre environnement; [Docs ici](https://getcomposer.org/doc/00-intro.md#globally)

  * Un terminal ouvert dans la racine du repertoire "wecommerce_api";

  * Une database MySQL qui tourne (avant de créer votre base, allez dans app/config/parameters.yml pour avoir tout les rens pour la base);

  * Une config apache qui va bien et qui tourne;

Les commandes terminal:
----------------------- 
Installation/MAJ des dépendences:
```
php composer(ou le nom que vous lui avez donné en GLOBAL) update
```

Update du schéma de la base de données:
```
php bin/console doctrine:schema:update --force
```

Insertion de champs de test dans les tables:
```
php bin/console doctrine:fixtures:load
````

Création d'un User rapide:
```
php bin/console fos:user:create
````
Effecement du cache:
```
php bin/console cache:clear --env=dev
````
  
Les test:
--------- 
Liste toute les routes de l'appli:
```
php bin/console debug:router
```

Pour tester la route `/users`:
```
http://localhost/wecommerce_api/web/app_dev.php/api/v1/users`
```
  
ps: le champs password ne sortira pas je l'ai exclu (pour des test)

Symfony Standard Edition
========================

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration
    
  * [**FOSRestBundle**][14] (in dev/test env) - FOSRestBundle provides several tools to assist in building REST applications
   

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/3.0/book/installation.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.0/book/doctrine.html
[8]:  https://symfony.com/doc/3.0/book/templating.html
[9]:  https://symfony.com/doc/3.0/book/security.html
[10]: https://symfony.com/doc/3.0/cookbook/email.html
[11]: https://symfony.com/doc/3.0/cookbook/logging/monolog.html
[13]: https://symfony.com/doc/3.0/bundles/SensioGeneratorBundle/index.html
[14]: http://symfony.com/doc/master/bundles/FOSRestBundle/index.html
