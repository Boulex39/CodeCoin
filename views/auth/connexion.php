<?php
$title = "Connexion - CodeCoin";
ob_start();
?>

<header class="main-header">
    <a href="/CodeCoin/" class="logo">Code<span>Coin</span></a>
    <div class="header-right">
        <a href="/CodeCoin/inscription" class="btn-orange">Créer un compte</a>
    </div>
</header>

<main>
    <div class="form-card">
        <h2>Connexion</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class="message error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <p class="message success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="exemple@mail.com" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********" required>
            </div>

            <button type="submit" class="btn-orange full">Se connecter</button>
        </form>

        <p class="link">
            Pas encore inscrit ? <a href="/CodeCoin/inscription">Créer un compte</a>
        </p>
    </div>
</main>

<footer class="main-footer">
    <p>&copy; <?= date('Y') ?> CodeCoin - Tous droits réservés</p>
</footer>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../base-html.php';

