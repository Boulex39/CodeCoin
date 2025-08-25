<?php
$title = "Modifier une annonce - CodeCoin";
ob_start();
?>

<header class="main-header">
    <a href="/CodeCoin/" class="logo">Code<span>Coin</span></a>
</header>

<main>
    <h2>Modifier mon annonce</h2>

    <form action="" method="POST">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre" value="<?= $annonce->getTitre() ?>" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required><?= $annonce->getDescription() ?></textarea>

        <label for="prix">Prix (€)</label>
        <input type="number" id="prix" name="prix" step="0.01" value="<?= $annonce->getPrix() ?>" required>

        <label for="categorie_id">Catégorie</label>
        <select id="categorie_id" name="categorie_id" required>
            <option value="1" <?= $annonce->getCategorie_id() == 1 ? 'selected' : '' ?>>Immobilier</option>
            <option value="2" <?= $annonce->getCategorie_id() == 2 ? 'selected' : '' ?>>Véhicules</option>
            <option value="3" <?= $annonce->getCategorie_id() == 3 ? 'selected' : '' ?>>Informatique</option>
            <option value="4" <?= $annonce->getCategorie_id() == 4 ? 'selected' : '' ?>>Emploi</option>
        </select>

        <button type="submit" class="btn-orange">Enregistrer</button>
    </form>
</main>

<footer class="main-footer">
  <p>&copy; <?= date('Y') ?> CodeCoin - Tous droits réservés</p>
</footer>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../base-html.php';