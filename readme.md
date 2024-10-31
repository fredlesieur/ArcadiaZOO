# ArcadiaZOO API

Une API RESTful pour gérer les informations d'un zoo, y compris les animaux, les habitats, les horaires, et les services. Cette API permet aux utilisateurs d'interagir avec différentes entités pour faciliter la gestion et l'affichage des informations liées au zoo.

## Fonctionnalités

- **Gestion des Animaux** : Ajout, lecture, modification et suppression des informations sur les animaux (administrateur).
- **Gestion des Habitats** : Ajout, lecture, modification et suppression des habitats (administrateur).
- **commentaire sur habitat**: Ajout (vétérinaire), lecture, modification et suppression des commentaires sur les habitats  (administrateur et vétérinaire).
- **Gestion des Horaires** : Consultation et mise à jour des horaires du zoo (administrateur).
- **Gestion des Services** : Ajout, lecture, modification et suppression des services proposés par le zoo (employés et administrateur).
- **Gestion des Utilisateurs et des Permissions** : Gestion des rôles et permissions pour accéder aux différentes parties de l'API.
- **Gestion des Avis** : Ajout et validation des avis, sur la page d'accueil, laissés par les visiteurs (employés).
- **Gestion de la Page d'Accueil** : Ajout,lecture, modification et suppressions des elements de la page d'accueil (administrateur).
- **Gestion des Rapports** : Ajout, lecture (administrateur), modification et suppression des Rapports (employés et vétérinaires).

## Prérequis

Avant d'exécuter cette API, assurez-vous d'avoir installé les éléments suivants :

**FrontEnd**

- HTML pour la structure des pages
- CSS et Bootstrap pour le style des pages
- JavaScript pour les fonctionnalités côté client, y compris les requêtes `fetch` pour l’API

**Backend**

- PHP version 8.3
- Git pour cloner le projet et gérer le contrôle de version
- Composer pour la gestion des dépendances PHP, y compris PHP Mailer
- MAMP (Apache) pour l'environnement de développement local
- Heroku pour l'environnement de production
- MySQL (ou 'JawsDB' si en production sur Heroku) pour stocker les données principales
- MongoDB pour gérer les horaires et les données NoSQL
- Cloudinary pour la gestion des images (CRUD des images)
- PHPUnit pour les tests unitaires
- Dotenv pour les variables d'environnement

## Installation

1. Cloner le dépôt

Commencez par cloner le projet depuis GitHub dans votre environnement local : `git clone https://github.com/fredlesieur/ArcadiaZOO.git` puis `cd ArcadiaZOO`

2. Installer les dépendances

Installez toutes les dépendances PHP via Composer (y compris PHP Mailer et d'autres librairies) en exécutant `composer install`.

3. Configurer l'environnement

Créez un fichier .env à la racine du projet pour gérer les variables d’environnement nécessaires. Voici un exemple des variables à définir :

```bash
Créez un fichier `.env` à la racine du projet pour gérer les variables d’environnement nécessaires. Voici un exemple des variables à définir :

# Base de données MySQL (local)
DB_HOST=
DB_NAME=
DB_USER=
DB_PASS=

# Configuration pour Heroku (JawsDB MySQL)
DB_HOST=
DB_NAME=
DB_USER=
DB_PASS=

# Configuration pour PHP Mailer
SMTP_HOST=
SMTP_USER=
SMTP_PASS=
SMTP_PORT=
SMTP_SECURE=

# MongoDB (local) & (production)
MONGO_URI=

# Cloudinary pour les images
CLOUDINARY_CLOUD_NAME=
CLOUDINARY_API_KEY=
CLOUDINARY_API_SECRET=
```
4. Créer les bases de données MySQL et MongoDB
### Importer les collections MongoDB

Pour créer et peupler la collection `horaires` dans MongoDB, suivez les étapes suivantes :

1. Assurez-vous que MongoDB est en cours d’exécution.
2. Connectez-vous à votre base de données MongoDB en utilisant MongoDB Shell ou MongoDB Compass.
3. Exécutez les commandes suivantes pour créer la collection `horaires` et insérer les documents de base.

#### Création de la collection et insertion de documents dans MongoDB

```javascript
// créer une base de donnée
use nom_de_la_base


// Créer la collection (MongoDB le fait automatiquement lors de l'insertion, mais ceci est optionnel)
db.createCollection("nom")

// Insérer des documents dans la collection "horaires"
db.horaires.insertMany([
  { saison: "...", semaine: "...", week_end: "..." },
  { saison: "...", semaine: "...", week_end: "..." }
])
```
### Importer les bases de données SQL

- ouvrir le dossier database/template-sql-arcadia.sql
- suivre les instructions.

## Utilisation de l'API

Quelques exemples :

- GET /animaux : Récupérer tous les animaux
- POST /animaux : Ajouter un nouvel animal (administrateur)
- GET /habitats : Récupérer tous les habitats
- POST /horaires : Ajouter un nouvel horaire (administrateur)
- GET /services : Récupérer tous les services
- POST /rapports : Ajouter un rapport (employés et vétérinaires)


## Déploiement local et heroku

1. Lancer l'API localement

Pour lancer l'API en local, vous pouvez utiliser le serveur intégré de PHP avec

 `php -S localhost:8000 -t public`

ou configurez MAMP pour pointer vers le répertoire **public** de votre projet.

Ouvrez votre navigateur et accédez à l'API à l'adresse  :(http://localhost:8000).

2. Déployer l'API sur HEROKU

```bash
heroku login
heroku create "nom""
git push heroku main
Configurez les variables d’environnement dans le panneau Heroku pour les connecter aux services MySQL, MongoDB, et Cloudinary.
```

Application en ligne : [https://arcadia-zoo-fl-52fd2cbf29c6.herokuapp.com/]

## Auteurs:

LESIEUR Frédéric 2024 – Créateur de l’API
et la contribution de Yoahn 





