# ArcadiaZOO API

Une API RESTful pour gérer les informations d'un zoo, y compris les animaux, les habitats, les horaires, et les services. Cette API permet aux utilisateurs d'interagir avec différentes entités pour faciliter la gestion et l'affichage des informations liées au zoo.
## Fonctionnalités

- **Gestion des Animaux** : Ajout, lecture, modification et suppression des informations sur les animaux (administrateur).
- **Gestion des Habitats** : Ajout, lecture, modification et suppression des habitats (administrateur).
- **commentaire sur habitat**: Ajout (vétérinaire), lecture, modification et suppression des commentaires sur les habitats  (administrateur et vétérinaire).
- **Gestion des Horaires** : Consultation et mise à jour des horaires du zoo (administrateur).
- **Gestion des Services** : Ajout, lecture, modification et suppression des services proposés par le zoo (employés et administrateur).
- **Gestion des Utilisateurs et des Permissions** : Gestion des rôles et permissions pour accéder aux différentes parties de l'API.
- **Gestion des Avis** : Ajout et validation des avis laissés par les visiteurs (employés).
- **Gestion de la Page d'Accueil** : Ajout,lecture, modification et suppressions des elements de la page d'accueil (administrateur).
- **Gestion des Rapports** : Ajout, lecture (administrateur), modification et suppression des Rapports (employés et vétérinaires).

## Prérequis

Avant d'exécuter cette API, assurez-vous d'avoir installé les éléments suivants :

- **PHP** version 8.3
- **Composer** pour la gestion des dépendances PHP, y compris PHP Mailer
- **MAMP** (Apache) pour l'environnement de développement local
- **Heroku** pour l'environnement de production
- **MySQL** (ou **JawsDB** si en production sur Heroku) pour stocker les données principales
- **MongoDB** pour gérer les horaires et les données NoSQL
- **Cloudinary** pour la gestion des images (CRUD des images)
- **HTML** pour la structure des pages
- **CSS** et **Bootstrap** pour le style des pages
- **JavaScript** pour les fonctionnalités côté client, y compris les requêtes `fetch` pour l’API
- **PHPUnit** pour les tests unitaires


