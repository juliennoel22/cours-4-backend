------
marp: true
theme: uncover
------
<!-- backgroundColor: #2c2c2c -->
<!--- color: #FEFEFE -->
# Automatisation du développement  
-----
<!-- backgroundColor: #FEFEFE -->
<!--- color: #2c2c2c -->
# Points de la semaine
- Commande Makers
- CI (au travers des Github Actions)

----
<!-- backgroundColor: #2c2c2c -->
<!--- color: #FEFEFE -->
# Les Makers
----
<!-- backgroundColor: #FEFEFE -->
<!--- color: #2c2c2c -->
# Les Makers
- Noms différents selon les frameworks  
- Outils qui permettent de générer du code
____
# Que générer ?
- Controller
- Entity
- Form
- Command
- ETC.

____
# Pourquoi les utiliser ?
- Gain de temps
- Modifier la BDD simplement ("migration")
- Uniformisation du code
- Réduction des erreurs

____
# Les Makers
- Symfony : `php bin/console make:controller`
- Laravel : `php artisan make:controller`  
- Résultat différent selon les frameworks  

____
### Résultat
![resultat](SCR-20260122-nyoz.png)

____
### Code généré
![code](SCR-20260122-nyxn.png)

____
# Bonnes pratiques
- Relire le code généré
- Personnaliser selon les besoins
- Ne pas « tout générer »
- Versionner les changements

____
<!-- backgroundColor: #2c2c2c -->
<!--- color: #FEFEFE -->
# CI/CD

____
<!-- backgroundColor: #FEFEFE -->
<!--- color: #2c2c2c -->
# CI/CD ?
- Continuous Integration => actions automatiques quand on push
- Continuous Delivery => déploiements automatiques une fois validé

____
# CI/CD - Le but de la CI
- Automatisation des tests (code stable, erreurs remontées rapidement)
- Sur un serveur dédié (pas de dépendance aux développeurs)
- Se lance à chaque action sur le projet (push, merge)

____
# CI/CD - Exemple de services
- Github Actions
- Gitlab CI
- Travis Ci 
- Circle CI
- Jenkins
- Etc.

____
# CI/CD - Principes généraux
- => toujours le même principe : pipeline automatisé à partir d'un fichier de configuration
- Des déclencheurs
- Des étapes
- Des actions
- Des variables et secrets

____
### Ex. fichier de conf github
```yaml
name: tests
on:
  push:
    branches: [ main ]
jobs:
  php-tests:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - name: Setup PHP
        continue-on-error: false
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
      - run: composer install --no-progress
      - run: php bin/phpunit
```

____
### Pipeline github
![resultat-github](SCR-20260122-odrb.png)

____
### Résultat github
![resultat-github](SCR-20260122-orxv.png)

____
### Ex. fichier de conf gitlab
```yaml
image: php:8.3
stages:
  - build
  - test
  - deploy
test-job:   
  stage: test   
  allow_failure: false
  script:
    - curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    - composer install --no-interaction --no-progress --prefer-dist --no-scripts
    - composer run test || exit 1;
....
```
____
### Pipeline gitlab
![resultat-gitlab](SCR-20260122-nmkr.png)

____
### Résultat gitlab
![resultat-gitlab](SCR-20260122-nrgo.png)
____
<!-- backgroundColor: #2c2c2c -->
<!--- color: #FEFEFE -->
# A votre tour !


