Installation
===========
Pré requis (obligatoire)
-----------

* Installer la dernière version de vagrant depuis le site officiel (1.8.1 minin 1.8.5 utilisée lors du développement)
* installer virtualbox
* installer sshfs (existe pour linux, osx, windows)
* installer vbguest avec vagrant plugin install vagrant-vbguest
* Installer  vagrant-sshfs avec `vagrant plugin install vagrant-sshfs`
* ajouter dans hosts `192.168.51.51  dropshippers.dev`

Procédure
-----------

* se placer dans le nouveau repertoire cloné
* lancer la commande `vagrant up` pour installer la machine et la provisionner
* Si le provisionning fail, ce qui arrive souvent lors de la première fois avec les common package, faire un `vagrant halt` suivi d'un `vagrant up --provision`
* une fois l'installation terminée, vous devriez pouvoir tester par exemple la route `dropshippers.dev/v1/login` et avoir une réponse !


Informations utiles :
===============

Commandes Symfony
-------------

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
php bin/console cache:clear --env=dev && php bin/console cache:clear --env=prod
````
  
Les test:
--------- 
Liste toute les routes de l'appli:
```
php bin/console debug:router
```

Pour tester la route `/users`:
```
http://dropshippers.dev/api/v1/users`
```

Ansible
--------

* Vous avez la possibilité d'ajouter par exemple des alias. pour cela aller dans `ansible/roles/dropshippers/templates/bash_aliases.template`
* Pour l'instant le provionning est statique. Il est possible d'exporter certaines données dans des variables.

MySQL
----------

* Un utisateur dropshippers P@ssword à été crée pour toute connexion a la base de données.
* Un PHPMyAdmin est installé et est accessible via `http://192.168.51.51/phpmyadmin`