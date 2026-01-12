# TD7 - Application de Covoiturage

Application PHP de gestion de covoiturage développée dans le cadre du TD7. Cette application permet de gérer des voitures, des utilisateurs et des trajets de covoiturage.

## 📋 Description

Cette application web PHP utilise une architecture MVC (Modèle-Vue-Contrôleur) pour gérer :
- **Voitures** : gestion des véhicules (immatriculation, marque, couleur, nombre de sièges)
- **Utilisateurs** : gestion des utilisateurs (login, nom, prénom)
- **Trajets** : gestion des trajets de covoiturage (départ, arrivée, date, nombre de places, prix, conducteur)

## 🔧 Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- **WAMP** (ou XAMPP/LAMP) avec :
  - PHP 7.4 ou supérieur
  - MySQL/MariaDB
  - Apache avec mod_rewrite activé
- **phpMyAdmin** (généralement inclus avec WAMP)
- Un navigateur web moderne

## 📦 Installation

### 1. Cloner ou télécharger le projet

Placez le projet dans le dossier `www` de WAMP :
```
C:\wamp64\www\DEVWEB\TD7_Ryan_BACHATENE_FI2A
```

### 2. Démarrer WAMP

1. Lancez WAMP Server
2. Vérifiez que l'icône WAMP dans la barre des tâches est **verte** (tous les services sont démarrés)
3. Si l'icône est orange ou rouge, cliquez dessus et sélectionnez "Démarrer tous les services"

### 3. Configuration de la base de données avec phpMyAdmin

#### Étape 1 : Accéder à phpMyAdmin

1. Ouvrez votre navigateur web
2. Accédez à : `http://localhost/phpmyadmin`
3. Connectez-vous avec :
   - **Nom d'utilisateur** : `root`
   - **Mot de passe** : (laissez vide par défaut)

#### Étape 2 : Créer la base de données

1. Dans phpMyAdmin, cliquez sur l'onglet **"Bases de données"**
2. Dans le champ "Créer une base de données", entrez le nom : `td2`
3. Sélectionnez l'encodage : `utf8mb4_general_ci` (ou `utf8_general_ci`)
4. Cliquez sur **"Créer"**

#### Étape 3 : Créer les tables

Une fois la base de données `td2` créée, vous devez créer les tables nécessaires. Voici les structures SQL à exécuter :

**Table `voiture` :**
```sql
CREATE TABLE voiture (
    immatriculation VARCHAR(7) PRIMARY KEY,
    marque VARCHAR(50) NOT NULL,
    couleur VARCHAR(30) NOT NULL,
    nbSieges INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

**Table `utilisateur` :**
```sql
CREATE TABLE utilisateur (
    login VARCHAR(50) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

**Table `trajet` :**
```sql
CREATE TABLE trajet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    depart VARCHAR(100) NOT NULL,
    arrivee VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    nbPlaces INT NOT NULL,
    prix INT NOT NULL,
    conducteurLogin VARCHAR(50) NOT NULL,
    FOREIGN KEY (conducteurLogin) REFERENCES utilisateur(login)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

**Pour exécuter ces requêtes :**
1. Sélectionnez la base de données `td2` dans le menu de gauche
2. Cliquez sur l'onglet **"SQL"**
3. Copiez-collez chaque requête SQL ci-dessus
4. Cliquez sur **"Exécuter"**

### 4. Configuration de l'application

Les paramètres de connexion à la base de données sont déjà configurés dans `src/Config/Conf.php` :

```php
'hostname' => 'localhost',
'database' => 'td2',
'login' => 'root',
'password' => ''
```

Si votre configuration MySQL est différente, modifiez ces valeurs dans le fichier `src/Config/Conf.php`.

## 🚀 Utilisation

### Accéder à l'application

1. Assurez-vous que WAMP est démarré (icône verte)
2. Ouvrez votre navigateur web
3. Accédez à l'URL suivante :
   ```
   http://localhost/DEVWEB/TD7_Ryan_BACHATENE_FI2A/web/frontController.php
   ```

### Navigation dans l'application

L'application utilise un système de routage basé sur les paramètres URL :

- **Contrôleur par défaut** : `voiture` (ou celui défini dans vos préférences)
- **Action par défaut** : `readAll`

#### Exemples d'URLs :

- Liste des voitures :
  ```
  http://localhost/DEVWEB/TD7_Ryan_BACHATENE_FI2A/web/frontController.php?controller=voiture&action=readAll
  ```

- Créer une voiture :
  ```
  http://localhost/DEVWEB/TD7_Ryan_BACHATENE_FI2A/web/frontController.php?controller=voiture&action=create
  ```

- Liste des utilisateurs :
  ```
  http://localhost/DEVWEB/TD7_Ryan_BACHATENE_FI2A/web/frontController.php?controller=utilisateur&action=readAll
  ```

- Liste des trajets :
  ```
  http://localhost/DEVWEB/TD7_Ryan_BACHATENE_FI2A/web/frontController.php?controller=trajet&action=readAll
  ```

#### Contrôleurs disponibles :

- `voiture` : Gestion des voitures
- `utilisateur` : Gestion des utilisateurs
- `trajet` : Gestion des trajets

#### Actions disponibles (pour chaque contrôleur) :

- `readAll` : Affiche la liste de tous les éléments
- `read` : Affiche les détails d'un élément
- `create` : Affiche le formulaire de création
- `created` : Traite la création d'un élément
- `update` : Affiche le formulaire de modification
- `updated` : Traite la modification d'un élément
- `delete` : Supprime un élément
- `deleted` : Confirme la suppression

## 📁 Structure du projet

```
TD7_Ryan_BACHATENE_FI2A/
├── src/
│   ├── Config/
│   │   └── Conf.php                    # Configuration de la base de données
│   ├── Controller/
│   │   ├── ControllerTrajet.php        # Contrôleur pour les trajets
│   │   ├── ControllerUtilisateur.php   # Contrôleur pour les utilisateurs
│   │   ├── ControllerVoiture.php       # Contrôleur pour les voitures
│   │   └── GenericController.php        # Contrôleur générique
│   ├── Lib/
│   │   ├── MessageFlash.php            # Gestion des messages flash
│   │   ├── PreferenceControleur.php    # Gestion des préférences
│   │   └── Psr4AutoloaderClass.php     # Autoloader PSR-4
│   ├── Model/
│   │   ├── DataObject/
│   │   │   ├── AbstractDataObject.php   # Classe abstraite pour les objets de données
│   │   │   ├── Trajet.php               # Modèle Trajet
│   │   │   ├── Utilisateur.php          # Modèle Utilisateur
│   │   │   └── Voiture.php              # Modèle Voiture
│   │   ├── HTTP/
│   │   │   ├── Cookie.php               # Gestion des cookies
│   │   │   └── Session.php              # Gestion des sessions
│   │   └── Repository/
│   │       ├── AbstractRepository.php   # Repository abstrait
│   │       ├── DatabaseConnection.php   # Connexion à la base de données
│   │       ├── TrajetRepository.php     # Repository pour les trajets
│   │       ├── UtilisateurRepository.php # Repository pour les utilisateurs
│   │       └── VoitureRepository.php    # Repository pour les voitures
│   └── View/
│       ├── trajet/                      # Vues pour les trajets
│       ├── utilisateur/                 # Vues pour les utilisateurs
│       ├── voiture/                     # Vues pour les voitures
│       └── view.php                     # Vue principale
└── web/
    ├── assets/
    │   └── css/
    │       └── style.css                # Feuille de style
    └── frontController.php              # Point d'entrée de l'application
```

## 🔍 Architecture

L'application suit le pattern **MVC** (Modèle-Vue-Contrôleur) :

- **Modèle** : Classes dans `src/Model/` qui gèrent les données et l'accès à la base de données
- **Vue** : Fichiers PHP dans `src/View/` qui génèrent l'interface utilisateur
- **Contrôleur** : Classes dans `src/Controller/` qui gèrent la logique métier et coordonnent les modèles et les vues

Le routage est géré par `frontController.php` qui :
1. Charge l'autoloader PSR-4
2. Récupère les paramètres `controller` et `action` depuis l'URL
3. Instancie le contrôleur approprié et appelle l'action demandée

## ⚠️ Dépannage

### L'application ne se charge pas

1. Vérifiez que WAMP est démarré (icône verte)
2. Vérifiez l'URL dans votre navigateur
3. Vérifiez les logs Apache dans WAMP

### Erreur de connexion à la base de données

1. Vérifiez que MySQL est démarré dans WAMP
2. Vérifiez que la base de données `td2` existe dans phpMyAdmin
3. Vérifiez les paramètres dans `src/Config/Conf.php`
4. Vérifiez que les tables ont été créées correctement

### Erreur 404 ou page blanche

1. Vérifiez que le fichier `.htaccess` est présent dans le dossier racine
2. Vérifiez que `mod_rewrite` est activé dans Apache
3. Vérifiez les permissions des fichiers

## 👤 Auteur

**Ryan BACHATENE** - TD7 FI2A

## 📝 Notes

- Cette application nécessite un serveur local (WAMP/XAMPP/LAMP) pour fonctionner
- La base de données doit être créée manuellement via phpMyAdmin avant la première utilisation
- Les mots de passe MySQL par défaut peuvent varier selon votre installation WAMP

