## Prérequis

- PHP 7.4 ou supérieur
- Composer
- Node.js et NPM
- Base de données MySQL

## Installation

1. Cloner le dépôt:

```
https://github.com/Toufik1247/StockTrack_final.git
```

2. Installer les dépendances avec Composer:

```
cd StockTrack
composer install
```


3. Installer les dépendances avec NPM:

```
npm install
```


4. Mettre à jour le fichier `.env` avec vos informations de connexion à la base de données et créer la base de données.

```
php bin/console doctrine:database:create
```

5. Exécutez les migrations pour créer les tables dans la base de données:

```
php bin/console doctrine:migrations:migrate
```


6. Lancer le serveur Symfony:

```
symfony serve
```


7. Exécuter le script NPM "watch" pour surveiller les modifications de vos fichiers et recompiler automatiquement le code si nécessaire :

```
npm run watch
```
