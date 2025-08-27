<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./CodeCoin/style/style.css"> -->
    <link rel="stylesheet" href="/CodeCoin/style/style.css?v=<?= time() ?>">
    <script src="/CodeCoin/style/script.js?v=<?= time() ?>"></script>
    <title><?= $title ?? 'CodeCoin' ?></title>
</head>

<body class="<?= isset($bodyClass) ? $bodyClass : '' ?>">
    <!-- si la variable $content existe, on affiche ?? sinon on affiche ce qu'il y a dans '' -->
    <?= $content ?? 'Pas de contenu' ?>

    <!-- Zone des messages globaux (apparaît sous le header mais au-dessus du reste) -->
    <?php if (!empty($_SESSION['success'])): ?>
        <div class="message success">
            <?= $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="message error">
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <script src="/CodeCoin/style/script.js?v=<?= time() ?>"></script>
</body>

</html>