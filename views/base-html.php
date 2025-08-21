<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./CodeCoin/style/style.css"> -->
     <link rel="stylesheet" href="/CodeCoin/style/style.css?v=<?= time() ?>">

    <title><?= $title ?? 'CodeCoin' ?></title>
</head>
<body>
</header>
    <?= $content ?? 'Pas de contenu' ?>
</body>
</html>