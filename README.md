# Bibliothèque

Bonjour à vous, voici le Markdown du projet, celui ci regroupe les informations importantes au bon fonctionnement du projet.

###Projet :
----

Conception d'un système d'information permettant de gérer les activités d'une bibliothèque :

* Gestion des adhérents
* Gestion des abonnements
* Gestion des prêts/consultations
* Facturation
* ...

Les points suivants doivent être réalisés :

* Analyse et conception d'un système d'information répondant aux besoins
* Implémentation à l'aide d'un SGBD
* Définition de plusieurs types d'utilisateurs avec des droits d'accès différents
* Interface graphique


#####Points complémentaire

* Consultation sur place ou prêt aux adhérents : livres, périodiques, cd, dvd..
* Délait de prêt : 2 semaines
* Le nombre d'emprunts simultanés est limité à 3
* Des relances sont prévues en cas de retard
* Si les relances n'aboutissent pas, une action contentieuse sera engagée (suspension d'abonnement, ...)

----

### Commandes importantes

Mettre à jour les vendors :
```sh
$ php composer.phar install
```
Update du composer
```sh
$ php composer.phar update
```
Update du composer FOSUserBundle
```sh
$ php composer.phar update friendsofsymfony/user-bundle
```
Clear du cache 
```sh
$ php app/console cache:clear --env=dev
$ php app/console cache:clear --env=prod
```
Changements de droits
```sh
$ chmod -R 777 app/cache
$ chmod -R 777 app/logs
```

Commande FOSUserBundler
```sh
#Création de compte basique
$ php app/console fos:user:create testuser test@example.com p@ssword 
#Création Admin
$ php app/console fos:user:create adminuser --super-admin
#Création de compte inactif
$ php app/console fos:user:create testuser --inactive
#Activer compte
$ php app/console fos:user:activate testuser 
#Désactiver compte
$ php app/console fos:user:deactivate testuser 
#Upgrade compte
$ php app/console fos:user:promote testuser ROLE_ADMIN 
#Downgrade compte
$ php app/console fos:user:demote testuser ROLE_ADMIN 
#Changer password d'un user
$ php app/console fos:user:change-password testuser newp@ssword 
```

### Version
1.0


**We Can do IT !**
