## Bienvenue dans cette Api

Qu'avons-nous utilisée ?

* SYMFONY 5 (https://symfony.com/doc/current/setup.html)
* GUZZYHTTP (https://github.com/guzzle/guzzle.git)
* API PLATEFORM (https://github.com/api-platform/api-platform)
* MYSQL ( | Serveur basée sur xampp | https://www.apachefriends.org/fr/index.html )


## Déploiement 

Dans un premier temps, nous avons besoins d'installer les dépendances et de lancer le serveur.
Simplement pour vérifier que tout fonction !

IMPORTANT PENSER À INSTALLER SYMFONY A L'ADRESSE :

(Et oui la version de S5 à rendu obsolète la commande php bin/console server:run )

https://symfony.com/download

Il faut également installer composer si vous ne l'avais pas sur votre machine !

https://getcomposer.org/download/

```
# pour installer les dépendances
composer install

# pour lancée le serveur 
symfony server:start
``` 

Une fois installer, il suffit d'aller à cette adresse :
```
http://127.0.0.1:8000/api/events?siren=numero du siren
``` 

Puis d'ajouter /api pour aller sur la partie API :

```
http://127.0.0.1:8000/api/
``` 

Par la suite, nous avons besoins d'importer les données de http://files.data.gouv.fr/sirene/
Nous utilisions guzzy pour télécharger le .zip et l'installer tout en utilisant une fonction d'import de data qui convertit le.csv en donné SQL


* ImportData.php

``` 
# importer les données à là de désirer 
php bin/console app:import-run [YYYYDDM]

# importer les données au moins
php bin/console app:import-monthly
```
Si tous se bien passé normalement vous pouvez vérifier si les numéros de siren sont valide nous allons vérifier que dans notre base de donnée

```
http://127.0.0.1:8000/api/events?siren=numero du siren

exemple : http://127.0.0.1:8000/api/events?siren=85870764

``` 

Mais que ceux passe t'il si le numéro de siren n'existe pas ? 
 
exemple :
```
http://127.0.0.1:8000/api/events?siren=865
``` 
le retour de notre api sera nul ! Dans notre .json nous aurons un retour vide :

```
hydra:member": []
```

au lieu de 
```
"hydra:member": [
{
"@id": "/api/events/13",
"@type": "Event",
"id": 13,
"siren": 85870764,
"enseigne": "LAMBERT MARC ET ALAIN"
}
```
Pour notre siren valide !
