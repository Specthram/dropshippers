Installation
===========
Pré requis (obligatoire)
-----------

* Installer la dernière version de vagrant depuis le site officiel (1.8.1 minin 1.8.5 utilisée lors du développement)
* Installer virtualbox
* Installer sshfs (linux seulement, osx l'integre de base)
* Installer vbguest avec vagrant plugin install vagrant-vbguest
* Installer  vagrant-sshfs avec `vagrant plugin install vagrant-sshfs`
* Ajouter dans hosts `192.168.51.51  dropshippers.dev`

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

Routes opérationnelles
====================
GET dropshippers.dev/v1/login
----------
* Paramètres : rien
* retour : routes disponibles

POST dropshippers.dev/v1/login/signin
----------
* Paramètres : login, password
* Retour : 200, token

POST dropshippers.dev/v1/ps/16/products
----------
* Header : token (utilisateur ou module)
* Paramètres : json (voir example ci dessous)
* Retour : message

```
"0":{
      "id_product":"1",
      "active":"1",
      "name":"T-shirt d\u00e9lav\u00e9 \u00e0 manches courtes",
      "categories":"Accueil,Femmes,Tops,T-shirts",
      "price":"16.510000",
      "id_tax_rules_group":"1",
      "wholesale_price":"4.950000",
      "reference":"demo_1",
      "supplier_reference":"",
      "id_supplier":"1",
      "id_manufacturer":"1",
      "upc":"",
      "ecotax":"0.000000",
      "weight":"0.000000",
      "quantity":"0",
      "description_short":"<p>T-shirt d\u00e9lav\u00e9 \u00e0 manches courtes et col rond. Mati\u00e8re douce et extensible pour un confort in\u00e9gal\u00e9. Pour un look estival, portez-le avec un chapeau de paille\u00a0!<\/p>",
      "description":"<p>Fashion propose des v\u00eatements de qualit\u00e9 depuis 2010. La marque propose une gamme f\u00e9minine compos\u00e9e d'\u00e9l\u00e9gants v\u00eatements \u00e0 coordonner et de robes originales et offre d\u00e9sormais une collection compl\u00e8te de pr\u00eat-\u00e0-porter, regroupant toutes les pi\u00e8ces qu'une femme doit avoir dans sa garde-robe. Fashion se distingue avec des looks \u00e0 la fois cool, simples et rafra\u00eechissants, alliant \u00e9l\u00e9gance et chic, pour un style reconnaissable entre mille. Chacune des magnifiques pi\u00e8ces de la collection est fabriqu\u00e9e avec le plus grand soin en Italie. Fashion enrichit son offre avec une gamme d'accessoires incluant chaussures, chapeaux, ceintures et bien plus encore\u00a0!<\/p>",
      "meta_title":"",
      "meta_keywords":"",
      "meta_description":"",
      "link_rewrite":"t-shirt-delave-manches-courtes",
      "available_now":"En stock",
      "available_later":"",
      "available_for_order":"1",
      "date_add":"2015-12-15 09:36:44",
      "show_price":"1",
      "online_only":"0",
      "condition":"new",
      "id_shop_default":"1"
   },...
```
