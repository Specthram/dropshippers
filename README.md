Installation
===========
Pré requis (obligatoire)
-----------

* Installer la dernière version de vagrant depuis le site officiel (1.8.1 minin 1.8.5 utilisée lors du développement)
* Installer virtualbox
* Installer sshfs (linux seulement, osx l'integre de base)
* Installer openssh-server (linux)
* Installer vbguest avec vagrant plugin install vagrant-vbguest
* Installer  vagrant-sshfs avec `vagrant plugin install vagrant-sshfs`
* Ajouter dans hosts `192.168.51.51  dropshippers.dev`

Procédure
-----------

* se placer dans le nouveau repertoire cloné
* lancer la commande `vagrant up` pour installer la machine et la provisionner
* Si le provisionning fail, ce qui arrive souvent lors de la première fois avec les common package, faire un `vagrant halt` suivi d'un `vagrant up --provision` (quand ça arrive, c'est au moment du de l'etape ansible "common-packages")
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
======================

GET dropshippers.dev/v1/login
-----------------------------
Renvoi les routes disponibles

* Paramètres : rien
* retour : routes disponibles

POST dropshippers.dev/v1/login/signin
-------------------------------------
Permet d'obtenir le token d'un utilisateur

* Paramètres : username, password
* Retour : 200, token

POST dropshippers.dev/v1/ps/16/products
---------------------------------------
Permet de poster un array de produit

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

GET dropshippers.dev/v1/ps/16/products
--------------------------------------

* Header : token
* Retour : external / local

```
{
    "external": [
        {
            "product_id": 3,
            "name": "Robe imprimée",
            "active": true,
            "price": 25.999852,
            "reference": "demo_3",
            "ecotax": 0,
            "weight": 0,
            "quantity": 0,
            "description_html": "<p>Fashion propose des vêtements de qualité depuis 2010. La marque propose une gamme féminine composée d'élégants vêtements à coordonner et de robes originales et offre désormais une collection complète de prêt-à-porter, regroupant toutes les pièces qu'une femme doit avoir dans sa garde-robe. Fashion se distingue avec des looks à la fois cool, simples et rafraîchissants, alliant élégance et chic, pour un style reconnaissable entre mille. Chacune des magnifiques pièces de la collection est fabriquée avec le plus grand soin en Italie. Fashion enrichit son offre avec une gamme d'accessoires incluant chaussures, chapeaux, ceintures et bien plus encore !</p>",
            "available_order": true,
            "dropshippers_ref": "HOTMKMER-9ZHS5VKJH311M20",
            "updated_at": "2016-07-26T02:50:45+0200"
        }
    ],
    "local": [
        {
            "product_id": 4,
            "name": "Robe imprimée",
            "active": true,
            "price": 25.999852,
            "reference": "demo_3",
            "ecotax": 0,
            "weight": 0,
            "quantity": 0,
            "description_html": "<p>Fashion propose des vêtements de qualité depuis 2010. La marque propose une gamme féminine composée d'élégants vêtements à coordonner et de robes originales et offre désormais une collection complète de prêt-à-porter, regroupant toutes les pièces qu'une femme doit avoir dans sa garde-robe. Fashion se distingue avec des looks à la fois cool, simples et rafraîchissants, alliant élégance et chic, pour un style reconnaissable entre mille. Chacune des magnifiques pièces de la collection est fabriquée avec le plus grand soin en Italie. Fashion enrichit son offre avec une gamme d'accessoires incluant chaussures, chapeaux, ceintures et bien plus encore !</p>",
            "available_order": true,
            "dropshippers_ref": "HOTMKMER-9ZHS5VKJH311M20",
            "updated_at": "2016-07-26T02:50:45+0200"
        }
    ]
}
```

POST dropshippers.dev/v1/login/register
---------------------------------------
Permet d'enregistrer un nouvel utilisateur

* Paramètres : username, email, password, token shop (facultatif), shop_name (facultatif)
* Retour : message ou 403

GET dropshippers.dev/v1/front/common/products
---------------------------------------------
* Header : token
* Retour : products : array de ressources

example
```
{
    "products": [
        "http://dropshippers.dev/v1/front/common/products/HOTUGJPX-YX215HRR7MLPJ6D",
        "http://dropshippers.dev/v1/front/common/products/HOTRDMJI-JJ1ZMBT3VJ0UG2V",
        "http://dropshippers.dev/v1/front/common/products/HOTMKMER-9ZHS5VKJH311M20",
        "http://dropshippers.dev/v1/front/common/products/HOT9ETC9-CC4TFZG0MUSVT9O",
        "http://dropshippers.dev/v1/front/common/products/HOTZ48IM-BKNYMO81HLBUYFO",
        "http://dropshippers.dev/v1/front/common/products/HOTEE4E1-Y6WSGLSLTA85UV4",
        "http://dropshippers.dev/v1/front/common/products/HOTHKCI1-YTWW9LBNQPPPWLH"
    ]
}
```

GET dropshippers.dev/v1/ps/16/products/id
-----------------------------------------
Permet de savoir si un objet est deja en base

* Header : token
* Paramètres : id
* retour : message (contient true ou false)

GET dropshippers.dev/v1/front/common/products/{refProduit}
----------------------------------------------------------
Permet d'avoir une seule ressource produit

* Header : token
* retour : product

example
```
{
    "product": {
        "product_id": 3,
        "name": "Robe imprimée",
        "active": true,
        "price": 25.999852,
        "reference": "demo_3",
        "ecotax": 0,
        "weight": 0,
        "quantity": 0,
        "description_html": "<p>Fashion propose des vêtements de qualité depuis 2010. La marque propose une gamme féminine composée d'élégants vêtements à coordonner et de robes originales et offre désormais une collection complète de prêt-à-porter, regroupant toutes les pièces qu'une femme doit avoir dans sa garde-robe. Fashion se distingue avec des looks à la fois cool, simples et rafraîchissants, alliant élégance et chic, pour un style reconnaissable entre mille. Chacune des magnifiques pièces de la collection est fabriquée avec le plus grand soin en Italie. Fashion enrichit son offre avec une gamme d'accessoires incluant chaussures, chapeaux, ceintures et bien plus encore !</p>",
        "available_order": true,
        "dropshippers_ref": "HOTMKMER-9ZHS5VKJH311M20",
        "updated_at": "2016-07-26T02:50:45+0200"
    }
}
```

GET dropshippers.dev/v1/front/user/propositions
-----------------------------------------------
Permet d'avoir les propositions d'un shop

* Header : token
* Retour : propositions (array)

example :

```
{
    "code": 1,
    "propositions": {
        "host": [
            [
                "http://dropshippers.dev/v1/user/propositions/REQ-HOT-RED-O063LPPNGLDXMO9"
            ]
        ]
    }
}
```

GET dropshippers.dev/v1/front/user/propositions/{dropshippersRef}
-----------------------------------------------------------------
Permet de recuperer une request

* Header : token
* retour : proposition

```
{
    "code": 1,
    "proposition": {
        "host": [
            {
                "created_at": "2016-07-30T23:47:08+0200",
                "updated_at": "2016-07-30T23:47:08+0200",
                "status": "new",
                "quantity": 5,
                "shopGuest": {
                    "name": "red mad coon",
                    "id": 31
                },
                "shopHost": {
                    "name": "HotDogs",
                    "id": 33
                }
            }
        ]
    }
}
```

POST dropshippers.dev/v1/front/user/partners/products/proposition
-----------------------------------------------------------------
Permet de faire une demande de partenariat sur un produit

* Header : token
* request parameters: product_reference, quantity, price, isSendDirectly, isWhiteMark, deliveryArea, message
* retour : code, message

example :

```
{
    "code": 30001,
    "message": "requête produit effectuée"
}
```

GET dropshippers.dev/v1/front/user/propositions/{dropshippersRef}/messages
--------------------------------------------------------------------------
Permet de récupérer les messages liés a une request product

* Header : token
* retour : code, messages

example :
```
{
  "code": 1,
  "messages": [
    {
      "date": "2016-09-04T00:00:00+0200",
      "message": "je suis le premier message d'\u00e9change",
      "price": 20,
      "status": "waiting"
    },
    {
      ...
    }
  ]
}
```


PATCH dropshippers.dev/v1/front/user/propositions/{dropshippersRef}
-------------------------------------------------------------------
Permet de changer l'etat d'une ressource

* Header : token
* Body : Json avec plusieurs tableaux contenant chaun op, path, value (valeurs acceptée pour value dans /status : "new", "waiting", "refused", "accepted")
* retour : code, message

exemple body JSON pour remplacer le status par la valeur waiting (syntaxe a respecter imperativement):
```
[
    { "op": "replace", "path" : "/status", "value" : "waiting"},
    {...}
]
```

exemple retour :
```
{
    "code": 1,
    "message": "effectué"
}
```

GET dropshippers.dev/ps/{version}/shop/products/shared
------------------------------------------------------
permet de savoir quels sont les produits de la boutique actuellements partagés

* Header : token
* retour : array json

```
{
    "shared_products": [
        {
            "product": {
                "dropshippersRef": "dddd",
                "id_local": 4,
                "quantity": 100
            },
            "shop": {
                "name": "red mad coon",
                "address": "18 avenue de la paix",
                "zipcode": "75000",
                "city": "paris"
            }
        }
    ]
}
```

GET dropshippers.dev/v1/front/user/shop/modules
--------------------
permet de savoir quels sont les modules du shop d'un utilisateur

* Header : token
* retour : array json

```
{
  "code": 1,
  "resultat": [
    {
      "name": "main",
      "type": "prestashop16",
      "token": "lzWIY7htWlfVU8xmbKMoaUYqApmZo8KKHHtFPK9M6oH0wenHZ96945AEuXET5pDM66sWRBIYZpZwEmeDwlNAqoeUlTOqirdpyFlq"
    },
    {
      "name": "test",
      "type": "dropshippers",
      "token": ""
    }
  ]
}
```

Codes Erreurs
=============

0 - Général
-----------

* 1 : Traitement réussi
* 2 : Paramètres manquants
* 3 : mauvaise syntaxe du body de la requete

10000 - Identification / Registration / Syntaxe
-----------------------------------------------

* 10001 : identifiants invalides
* 10002 : token invalide
* 10003 : email deja utilisé
* 10004 : utilisateur deja existant
* 10005 : boutique deja existante
* 10006 : enregistrement effectué
* 10007 : aucun module trouvé

20000 - Produits
----------------

* 20001 : le produit n'existe pas
* 20002 : la quantité demandé depasse celle disponible

30000 - requetes produits
-------------------------

* 30001 : Requete produit effectuée
* 30002 : format du json de la requete incorrecte
* 30003 : Mauvaise reference
* 30004 : Impossible de modifier une requete deja acceptée
