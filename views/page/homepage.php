<?php

// Définition du titre de la page
$title = "Accueil - CodeCoin";

// Démarrage de la temporisation de sortie (bufferisation) qui permet de capturer le contenu html généré et le stocker dans une variable
ob_start();

?>
<header class="main-header">
    <a href="/CodeCoin/" class="logo">Code<span>Coin</span></a>
    <div class="header-right">

        <?php if (!empty($_SESSION['user'])): ?>
            <!-- Si l’utilisateur est connecté -->
            <a href="/CodeCoin/annonce/nouvelle" class="btn-orange">Déposer une annonce</a>
        <?php else: ?>
            <!-- Si l’utilisateur n’est PAS connecté -->
            <a href="/CodeCoin/connexion" class="btn-orange">Déposer une annonce</a>
        <?php endif; ?>

        <div class="search-bar">
            <input type="text" placeholder="Rechercher sur CodeCoin">
            <button>🔍</button>
        </div>

        <?php if (!empty($_SESSION['user'])): ?>
            <a href="/CodeCoin/profil" class="login-link">
                👤 Bonjour, <?= htmlspecialchars($_SESSION['user']['pseudo']) ?>
            </a>
            <a href="/CodeCoin/deconnexion" class="btn-orange">Déconnexion</a>
        <?php else: ?>
            <a href="/CodeCoin/connexion" class="login-link">Se connecter</a>
        <?php endif; ?>
    </div>
</header>


<nav class="categories">
    <a href="/?categorie=Immobilier">Immobilier</a>
    <a href="/?categorie=Véhicules">Véhicules</a>
    <a href="/?categorie=Informatique">Informatique</a>
    <a href="/?categorie=Emploi">Emploi</a>
</nav>


<main>
    <div class="annonces">
        <?php foreach ($annonces as $annonce) : ?>
            <div class="annonce">
                <h2><?= $annonce->getTitre() ?></h2>
                <p><?= $annonce->getDescription() ?></p>
                <p><?= $annonce->getPrix() ?> €</p>
                <p>Catégorie : <?= $annonce->getCategorie_nom() ?></p>
                <p>Posté par : <?= $annonce->getPseudo() ?></p>
                <p><a href="/CodeCoin/annonce/<?= $annonce->getId() ?>">Voir l'annonce</a></p>
                <small>Ajoutée le <?= $annonce->getCreated_at()->format('d/m/Y') ?></small>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</main>

<footer class="main-footer">
    <p>&copy; <?= date('Y') ?> CodeCoin - Tous droits réservés</p>
</footer>

<?php
$content = ob_get_clean();

require_once __DIR__ . '/../base-html.php';
