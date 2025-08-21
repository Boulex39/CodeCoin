<?php
$title = "Annonce - " . $annonce->getTitre();
ob_start();
?>

<header class="main-header">
    <a href="/CodeCoin/" class="logo">Code<span>Coin</span></a>
</header>

<main>
    <div class="annonce-detail">
        <h1><?= $annonce->getTitre() ?></h1>
        <p><?= $annonce->getDescription() ?></p>
        <p><strong>Prix :</strong> <?= $annonce->getPrix() ?> €</p>
        <p><strong>Catégorie :</strong> <?= $annonce->getCategorie_nom() ?></p>
        <p><strong>Posté par :</strong> <?= $annonce->getPseudo() ?></p>
        <p><small>Ajoutée le <?= $annonce->getCreated_at()->format('d/m/Y H:i') ?></small></p>

        <a href="/CodeCoin/" class="btn-orange">⬅ Retour aux annonces</a>
    </div>
</main>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../base-html.php';