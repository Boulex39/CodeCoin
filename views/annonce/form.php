<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nouvelle annonce - CodeCoin</title>
  <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
  <header>
    <h2>CodeCoin</h2>
  </header>

  <h1>Déposer une annonce</h1>

  <form method="post" action="#">
    <label>Titre de l’annonce</label><br>
    <input type="text" name="title"><br><br>

    <label>Texte de l’annonce</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Prix</label><br>
    <input type="number" name="price"><br><br>

    <label>Catégorie</label><br>
    <select name="category">
      <option>Informatique</option>
      <option>Maison</option>
      <option>Véhicules</option>
      <option>Loisirs</option>
      <option>Services</option>
    </select><br><br>

    <label>Photos</label><br>
    <input type="file" name="photos"><br><br>

    <button type="submit">Déposer</button>
  </form>
</body>
</html>
