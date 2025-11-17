<?php
require_once __DIR__ . '/bootstrap.php';
$pageTitle = $pageTitle ?? 'Bien-Être & Business by Coralie Montreuil';
$pageDescription = $pageDescription ?? 'Accompagnement Bien-Être & Business pour praticiennes du mieux-être.';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
  <header>
    <div class="container navbar">
      <a href="/index.php" class="logo" aria-label="Accueil Bien-Être et Business"><?php echo htmlspecialchars(get_content('site_logo', 'Bien-Être & Business')); ?></a>
      <nav aria-label="Navigation principale">
        <ul>
          <li><a href="/index.php">Accueil</a></li>
          <li><a href="/formation-signature.php">Formation Signature</a></li>
          <li><a href="/formations-courtes.php">Formations courtes</a></li>
          <li><a href="/temoignages.php">Témoignages</a></li>
          <li><a href="/contact.php" class="btn">Appel découverte</a></li>
          <li><a href="/admin/" class="nav-admin">Connexion</a></li>
        </ul>
      </nav>
    </div>
  </header>
