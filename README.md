## Bienvenue dans cette Api

 qu'avons nous utilisée ?
 * SYMFONY 5 (https://symfony.com/doc/current/setup.html)
 * GUZZYHTTP  (https://github.com/guzzle/guzzle.git)
 * API PLATEFORM (https://github.com/api-platform/api-platform)
 * MYSQL ( | Serveur basée sur xampp | https://www.apachefriends.org/fr/index.html )
 

## Déploiement 

dans un premier temps nous avons besoins d'installer les dependance et de lancer le serveur.
Simplement pour verifier que tout fonction !

IMPORTANT PENSER A INSTALLER SYMFONY A L'ADRESSE :

(et oui la version de S5 à rendu obselete la commande  php bin/console server:run )

https://symfony.com/download

 il faut également  installer composer si vous ne l'avais pas sur votre machine !

https://getcomposer.org/download/

```
# pour installer les dépendances
composer install

# pour lancée le serveur 
symfony server:start
```         

une fois installer il suffit d'aller à cette adresse :
```
http://127.0.0.1:8000/api/events?siren=numero du siren
``` 

puis d'ajouter /api pour aller sur la partie API :

```
http://127.0.0.1:8000/api/
``` 

par la  suite nous avons besoins d'importer les donnée de http://files.data.gouv.fr/sirene/
nous utilisions  guzzy pour télécharger le .zip et l'installer tout en utilisans une fonction d'import de data qui converti le.csv en donné SQL


* ImportData.php

``` 
# importer les données à la de désirée 
php bin/console app:import-run [YYYYDDM]

# importer les donnée au moins
php bin/console app:import-monthly
```
Si tous c'est bien passé normalement vous pouvez verifier si les numéros de siren sont valide nous allons verifier que dans notre base de donnée

```
http://127.0.0.1:8000/api/events?siren=numero du siren

exemple : http://127.0.0.1:8000/api/events?siren=85870764

``` 

mais que ce passe t'il si le numéro de siren n'existe pas ? 
 prennon cette exempel :
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
pour notre siren valide !
