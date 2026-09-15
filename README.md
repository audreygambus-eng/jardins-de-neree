# Les Jardins de Nérée

**[Voir le site en ligne](https://audrey.alwaysdata.net)**

Site web fictif de billetterie pour un aquarium, réalisé dans le cadre d'une formation de développeur IA.

## Présentation

**Les Jardins de Nérée** est un site web fictif représentant un aquarium et son système de billetterie.

Le visiteur peut consulter les différents tarifs, choisir une formule avec ou sans activité de réalité virtuelle, sélectionner un créneau et effectuer une réservation.

La réservation génère une **référence unique** ainsi qu'un récapitulatif imprimable depuis le navigateur. Le règlement est prévu sur place, au guichet, le jour de la visite.

Le projet comprend un espace interne sécurisé avec deux niveaux de droits : **employé** et **administrateur**.

**Projet fictif à vocation pédagogique**  
Aucun achat ni paiement réel n'est effectué sur ce site. Les informations relatives à l'établissement sont fictives.

---

## Fonctionnalités

### Billetterie

- Consultation des différents tarifs
- Sélection de la quantité pour chaque tarif
- Gestion de tarifs soumis à une quantité minimale
- Choix entre :
  - visite de l'aquarium 
  - activité VR seule 
  - activité VR avec visite de l'aquarium
- Sélection d'un créneau disponible
- Affichage des places disponibles pour la visite
- Affichage des casques VR disponibles
- Saisie du nom et de l'adresse e-mail du visiteur
- Validation des données côté serveur
- Génération d'une référence unique de réservation
- Génération d'un récapitulatif de réservation
- Impression ou enregistrement de la réservation via la fonction d'impression du navigateur
- Règlement prévu sur place au guichet

### Gestion des disponibilités

La billetterie permet de visualiser :

- les places disponibles pour la visite de l'aquarium 
- les casques disponibles pour les activités de réalité virtuelle

Chaque tarif définit les ressources auxquelles il est associé. Une réservation peut donc nécessiter :

- une place de visite 
- un casque VR 
- ou les deux

Lors de la validation de la réservation, l'application vérifie que les capacités restantes du créneau permettent de satisfaire la demande.

---

## Authentification et gestion des rôles

L'application dispose d'un espace interne protégé par authentification.

Deux rôles sont disponibles :

### `ROLE_EMPLOYE`

L'employé peut :

- accéder au tableau de bord 
- rechercher une réservation à partir du nom ou de l'adresse e-mail du visiteur 
- consulter les informations principales d'une réservation

### `ROLE_ADMIN`

L'administrateur dispose des fonctionnalités de l'employé et peut également :

- consulter l'ensemble des créneaux 
- visualiser les capacités de visite et de VR 
- visualiser les places et casques déjà réservés 
- ouvrir ou fermer un créneau 
- rouvrir un créneau 
- consulter les réservations associées à un créneau
- purger les réservations datées d'au moins trente jours

Les fonctionnalités réservées à l'administrateur sont protégées par un contrôle de rôle côté serveur.

## Comptes de démonstration

| Rôle | E-mail | Mot de passe |
|---|---|---|
| Administrateur | admin@jardinsdeneree.fr | admin200@!MVk! |
| Employé | guichet@jardinsdeneree.fr | Emp202@!Yelo |

Ces comptes sont fournis à des fins de démonstration dans le cadre du projet pédagogique. Sur une application réelle, les comptes seraient créés par un administrateur et les identifiants ne figureraient pas dans le dépôt.

---

## Logique de réservation

Lorsqu'une réservation est soumise, l'application effectue plusieurs contrôles côté serveur :

1. Vérification du nom
2. Validation de l'adresse e-mail
3. Vérification qu'au moins un billet a été sélectionné
4. Contrôle des quantités minimales définies pour certains tarifs
5. Vérification de l'existence du créneau choisi
6. Calcul du nombre de places de visite nécessaires
7. Calcul du nombre de casques VR nécessaires
8. Comparaison avec les capacités restantes du créneau
9. Création de la réservation uniquement lorsque toutes les vérifications sont satisfaites
10. Génération d'une référence unique
11. Redirection vers la page de confirmation

En cas d'erreur, les messages sont conservés en session et les données précédemment saisies sont réaffichées afin d'éviter à l'utilisateur de remplir à nouveau l'ensemble du formulaire.

---

## Base de données

Le projet utilise **MySQL** et repose sur cinq tables principales.

### `tarif`

Contient les tarifs proposés ainsi que leurs caractéristiques :

- libellé 
- prix 
- description 
- mention éventuelle 
- image 
- impact sur la capacité de visite 
- impact sur la capacité VR 
- quantité minimale

### `creneau`

Contient les créneaux proposés avec :

- date et heure 
- capacité maximale pour la visite 
- capacité maximale pour la VR 
- état du créneau

### `reservation`

Contient les informations principales d'une réservation :

- référence unique 
- nom du visiteur 
- adresse e-mail 
- date de réservation 
- créneau choisi

### `reservation_tarif`

Table d'association entre les réservations et les tarifs.

Elle permet d'enregistrer les tarifs sélectionnés ainsi que leurs quantités.

### `utilisateur`

Contient les comptes permettant l'accès à l'espace interne :

- adresse e-mail 
- mot de passe haché 
- rôle

Les relations entre les tables reposent sur des **clés étrangères**.

La table `reservation_tarif` utilise une suppression en cascade lors de la suppression d'une réservation.

---

## Organisation du projet

```text
jardins-de-neree/
│
├── admin/
│   ├── creneaux.php
│   ├── index.php
│   ├── recherche.php
│   └── reservations.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   └── js/
│       └── menu.js
│
├── includes/
│   ├── footer.php
│   └── header.php
│
├── sql/
│   ├── schema.sql
│   └── seed.sql
│
├── src/
│   ├── Auth.php
│   ├── Autoloader.php
│   ├── Creneau.php
│   ├── Database.php
│   ├── Dates.php
│   ├── Reservation.php
│   ├── Tarif.php
│   └── Utilisateur.php
│
├── .env.example
├── .gitignore
│
├── accessibilite.php
├── animaux.php
├── billetterie.php
├── confirmation.php
├── connexion.php
├── config.php
├── cgv.php
├── deconnexion.php
├── index.php
├── infos-pratiques.php
└── reserver-traitement.php
```

## Principaux composants

- src/Database.php : gestion de la connexion à la base de données
- src/Auth.php : authentification et contrôle des rôles
- src/Utilisateur.php : gestion des utilisateurs
- src/Reservation.php : gestion des réservations
- src/Creneau.php : gestion des créneaux et disponibilités
- src/Tarif.php : gestion des tarifs
- src/Dates.php : formatage des dates

L'application est développée en PHP vanilla, avec une organisation orientée objet des principales fonctionnalités métier et un minimum de Javascript.

## Sécurité

Plusieurs contrôles sont effectués côté serveur avant l'enregistrement d'une réservation.

Le projet met notamment en œuvre :

- validation des données issues des formulaires 
- contrôle des rôles pour les fonctionnalités réservées à l'administration 
- gestion des sessions 
- authentification des utilisateurs 
- hachage des mots de passe 
- échappement des données affichées dans le HTML 
- utilisation de clés étrangères dans la base de données 
- séparation des données de réservation et des données de référence
- protection CSRF des formulaires ;
- comparaison des jetons en temps constant.

Les mots de passe des utilisateurs sont stockés sous forme de hachage et non en clair.

## Accessibilité

Une attention particulière a été portée à l'accessibilité du site, avec :

- une structure HTML sémantique 
- un lien d'évitement 
- des alternatives textuelles pour les images si nécessaire 
- des labels associés aux champs de formulaire 
- des messages d'erreur identifiés avec role="alert" 
- une page dédiée à l'accessibilité

Des liens vers des ressources externes relatives à l'accessibilité sont proposés à titre informatif.

## Technologies utilisées

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript

Le projet a été développé en PHP vanilla, sans framework PHP et sans Composer.
Le JavaScript est utilisé pour le menu burger de la version mobile.

## Environnement de développement

Le projet a été développé localement avec Visual Studio Code et son serveur intégré.

La base de données est gérée avec MySQL.

## Installation

### Prérequis

- PHP
- MySQL ou MariaDB
- Un navigateur web
- Un environnement permettant d'exécuter PHP

### Base de données

1. Créer une base de données MySQL/MariaDB
2. Exécuter sql/schema.sql pour créer les tables
3. Exécuter sql/seed.sql pour insérer les données initiales
4. Configurer les paramètres de connexion à la base de données

### Configuration

Un fichier .env.example est fourni afin d'indiquer les variables nécessaires sans exposer les informations sensibles.

Le fichier .env n'est pas versionné.
En production, le fichier `.env` doit être placé en dehors de la racine web, afin qu'il ne soit pas accessible par une requête HTTP. La classe `Database` cherche le fichier à la racine du projet, puis remonte l'arborescence.

## Déploiement

Le projet est déployé sur AlwaysData et accessible à l'adresse [audrey.alwaysdata.net](https://audrey.alwaysdata.net).

## Informations légales

Le site contient des pages dédiées aux critères légaux et à l'accessibilité :

- Mentions légales
- Conditions générales de vente
- Politique de confidentialité
- Accessibilité

## Auteur

Audrey Gambus

Projet réalisé dans le cadre de la formation Graduate développeur IA.