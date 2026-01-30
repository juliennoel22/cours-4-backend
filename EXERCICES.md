## Resultat Attendu
Il faut créer rapidement une petite application, avec les commande proposer par symfony. 

Vous avez la liste des maker disponible via la commande suivante:
```bash
# Avec docker
docker compose run --rm php php bin/console make

# Sans docker
php bin/console make
```
Le but est de créer une applicationa avec au moins deux entités liées entre elles, une vue pour les consulter et de quoi alimenter la base de donnée.

*Exemple de petite application:*   
*Avoir une liste de personnes avec leurs informations de bases, une liste de batiments, et lié les personnes au batiments*

Listes des points attendu:
- [x] Créer au moins deux entité avec les commandes
- [x] Créer le fichier de migration avec la commande symfony
- [x] Créer au moins un controller avec sa vue twig
- [ ] Créer une commande qui ajoute des données en BDD
- [ ] script bash qui execute tout les test
- [ ] La commande d'ajout de données utilise FakerPHP

Listes des points bonus
- [ ] Ajouter des test unitaire
- [ ] un dossier Githook, avec un precommit et prepush qui execute tout les tests

Listes des point bonus si vous avez le projet sur github
- [ ] Ajouter une Github Action qui execute phpstan/phpcs/phpunit
