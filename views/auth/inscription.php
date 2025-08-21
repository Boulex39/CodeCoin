<?php
$title = "Inscription - CodeCoin";
ob_start();
?>

<header class="main-header">
    <a href="/CodeCoin/" class="logo">Code<span>Coin</span></a>
    <div class="header-right">
        <a href="/CodeCoin/connexion" class="btn-orange">Déjà inscrit ?</a>
    </div>
</header>

<main>
    <div class="form-card">
        <h2>Inscription</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class="message error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <p class="message success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="exemple@mail.com" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********" required>
            </div>

            <button type="submit" class="btn-orange full">S'inscrire</button>
        </form>

        <p class="link">
            Déjà un compte ? <a href="/CodeCoin/connexion">Se connecter</a>
        </p>
    </div>
</main>

<footer class="main-footer">
    <p>&copy; <?= date('Y') ?> CodeCoin - Tous droits réservés</p>
</footer>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../base-html.php';
