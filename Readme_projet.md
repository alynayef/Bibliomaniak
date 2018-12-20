# PROJET DE BIBLIOTHEQUE EN LIGNE

## EXPLICATION DU SITE

### CONNEXION
La page de `connexion` est la page d'acceuil du site. 
Pour pouvoir se connecter il faut avoir au préalable un compte. 
Pour se faire il faut s'inscrire. C'est lors de la connexion qu'on initialise la session de l'utilisateur.

### INSCRIPTION
La page `inscription` est un formulaire à remplir avec les champs nom, pseudo, mots de passe et adresse email
Le mot de passe est controlé par un régex :
 * un mots de passe qui commence par un alpha-numérique
 * un mots de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un underscore 

### INDEX UTILISATEUR
C'est la page de redirection des utilisateurs.

#### Proposer livre
Cette page permet à l'utilisateur de proposer un livre de son choix. 
C'est l'administrateur de d'accepter ou de le refuser.

#### Deconnexion
La page de déconnexion permet de supprimer la session et de revenir à la page d'acceuil.

#### Rechercher (pas encore fini)
Elle permet de chercher un livre parmis ceux qui sont enregistrés.

#### Voir livre
Elle permet de lister tous les livres de voir ce qui sont disponible ou pas.

#### Emprunter
Elle permet d'emprunter un livre parmi ceux qui sont disponible.
Une fois un livre emprunté il devient indisponible.

#### Rendre
Elle permet de rendre un livre parmi ceux qu'on a emprunter.
Une fois rendu le livre devient de nouveau disponible.

### INDEX ADMIN
C'est la page de redirection des adminitrateurs.

#### Livres
C'est la page de gerer des livres:
 * Elle permet de faire des modifications.
 * Elle permet de faire des suppressions.
 * Elle permet aussi d'ajouter des livres via un formulaire.
#### Deconnexion
La page de déconnexion permet de supprimer la session et de revenir à la page d'acceuil.

#### Utilisateurs
C'est la page de gerer des utilisateurs:
 * Elle permet de faire des modifications.
 * Elle permet de faire des suppressions.
 
#### Requetes
Elle permet de lister tous les livres proposées et de satisfaire(accepter) la demande l'utilisateurs.

#### Emprunter
Elle permet de voir l'historique des livres empruntés.

#### Rendre
Elle permet de voir l'historique des livres rendus.

## CHOIX TECHNIQUE

### PHP
J'ai choisi le langage PHP car j'ai eu à le faire ma premiere année et ma deuxieme année de formation.

### MVC
J'ai choisi de faire l'architecture MVC car il offre: 
 * une conception claire et efficace grâce à la séparation des données de la vue et du contrôleur.
 * Un gain de temps de maintenance.
 
### JAVASCRIPT
J'ai utilisé JavaScript pour la gestion d'événement, car lorsque j'ai eu un probléme avec la gestion des événements c'est le premier langage qu'on m'a conseillé mais aussi le premier que je voyais dans mes recherches.

## Accés et Test du site web
Vous pouvez accéder au site grace a cet url: http://80.211.56.41:8010/connexion
Pour vous connectez en tant que administrateur:
 * Pseudo: admin_root.
 * Mots de passe: passeroot.
 Pour vous connectez en tant que simple utilisateur il faudra vous inscrire.