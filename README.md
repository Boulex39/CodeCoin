# CodeCoin
ECF-leboncoin

## 🎨 Maquette Figma
Vous pouvez consulter la maquette [ici](https://www.figma.com/proto/d3y3eTLBc1yE1FzPba8Q46/CodeCoin-ECF?node-id=0-1&t=8oDfbzkV1I9t6SDe-1.)

## Diagram mvc 
https://dbdiagram.io/d/682e7addb9f7446da3993429


## 📂 Base de données

Pour utiliser ce projet, vous devez importer la base de données **MySQL**.

### 1. Export disponible
Le fichier `codecoin.sql` est déjà fourni dans ce dépôt (dossier `/database`).

### 2. Importer avec phpMyAdmin
1. Ouvrez **phpMyAdmin**.
2. Créez une base de données `codecoin`.
3. Cliquez sur `codecoin`, puis allez dans l’onglet **Importer**.
4. Sélectionnez le fichier `codecoin.sql`depuis le dossier /database du projet.
5. Cliquez sur **Exécuter** pour lancer l'importation.

### 3. Importer avec MySQL en ligne de commande
```bash
# Création de la base
mysql -u root -p -e "CREATE DATABASE codecoin;"

# Import du fichier SQL
mysql -u root -p codecoin < codecoin.sql

## ✨ Fonctionnalités principales

- 🔑 Authentification (Inscription / Connexion / Déconnexion)  
- 👤 Gestion du profil utilisateur  
- 📢 Dépôt, modification et suppression d’annonces  
- 🔍 Recherche et filtrage par catégorie  
- 📱 Interface responsive (adaptée PC et mobile)  


