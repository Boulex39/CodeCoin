<?php
$title = "Mon profil - CodeCoin";
$bodyClass = 'profil-page'; // classe spécifique pour le CSS
ob_start();
?>

<header class="main-header">
    <a href="/CodeCoin/" class="logo">Code<span>Coin</span></a>
</header>

<main>
    <div class="profil-card">
        <h2>Mon profil</h2>
        <p><strong>Pseudo :</strong> <?= $_SESSION['user']['pseudo'] ?></p>
        <p><strong>Email :</strong> <?= $_SESSION['user']['email'] ?></p>
        <p><strong>Membre depuis :</strong> <?= (new DateTime($_SESSION['user']['created_at']))->format('d/m/Y') ?></p>
        <a href="/CodeCoin/" class="btn-back">← Retour à l'accueil</a>
    </div>

    <div class="mes-annonces">
        <h2>Mes annonces</h2>
        <?php if (empty($annonces)): ?>
            <p>Vous n’avez publié aucune annonce pour le moment.</p>
        <?php else: ?>
            <div class="annonces-list">
                <?php foreach ($annonces as $annonce): ?>
                    <div class="annonce">
                        <h3><?= $annonce->getTitre() ?></h3>
                        <p><?= $annonce->getDescription() ?></p>
                        <p><strong><?= $annonce->getPrix() ?> €</strong></p>
                        <p>Catégorie : <?= $annonce->getCategorie_nom() ?></p>
                        <small>Ajoutée le <?= $annonce->getCreated_at()->format('d/m/Y') ?></small>
                        <p>
                            <a href="/CodeCoin/annonce/<?= $annonce->getId() ?>">Voir</a> |
                            <a href="/CodeCoin/annonce/<?= $annonce->getId() ?>/edit">Modifier</a> |
                            <a href="/CodeCoin/annonce/<?= $annonce->getId() ?>/delete" onclick="return confirm('Supprimer cette annonce ?')">Supprimer</a>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<footer class="main-footer">
    <p>&copy; <?= date('Y') ?> CodeCoin - Tous droits réservés</p>
</footer>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../base-html.php';
