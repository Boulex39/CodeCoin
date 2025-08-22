<?php
$title = "Nouvelle annonce - CodeCoin";
ob_start();
?>

<header class="main-header">
  <a href="/CodeCoin/" class="logo">Code<span>Coin</span></a>
</header>

<main>
  <div class="form-card">
    <h2>Déposer une annonce</h2>
    <form method="POST">
      <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre" required>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>
      </div>

      <div class="form-group">
        <label for="prix">Prix (€)</label>
        <input type="number" id="prix" name="prix" required>
      </div>

      <div class="form-group">
        <label for="categorie_id">Catégorie</label>
        <select id="categorie_id" name="categorie_id" required>
          <option value="">-- Choisir --</option>
          <option value="1">Immobilier</option>
          <option value="2">Véhicules</option>
          <option value="3">Informatique</option>
          <option value="4">Emploi</option>
        </select>
      </div>

      <button type="submit" class="btn-orange full">Publier</button>
    </form>
  </div>
</main>

<footer class="main-footer">
  <p>&copy; <?= date('Y') ?> CodeCoin - Tous droits réservés</p>
</footer>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../base-html.php';
