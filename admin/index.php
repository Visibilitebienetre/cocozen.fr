<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_login();
$fields = require __DIR__ . '/../includes/fields.php';
$pageLabels = [
    'global' => 'Paramètres globaux',
    'home' => 'Accueil',
    'formation-signature' => 'Formation Signature',
    'formations-courtes' => 'Formations courtes',
    'temoignages' => 'Témoignages',
    'contact' => 'Contact',
    'legal' => 'Mentions légales & CGV'
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord CMS | Bien-Être & Business</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/admin.css">
</head>
<body>
  <div class="admin-wrapper">
    <div class="admin-nav">
      <h1>Tableau de bord</h1>
      <a href="/admin/logout.php">Se déconnecter</a>
    </div>
    <div class="admin-card">
      <p>Sélectionnez la page ou le bloc de contenu à mettre à jour.</p>
      <table class="table-pages">
        <thead>
          <tr>
            <th>Page</th>
            <th>Champs</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($fields as $slug => $pageFields): ?>
            <tr>
              <td><?php echo htmlspecialchars($pageLabels[$slug] ?? ucfirst($slug)); ?></td>
              <td><?php echo count($pageFields); ?></td>
              <td><a class="btn-admin" href="/admin/edit.php?page=<?php echo urlencode($slug); ?>">Modifier</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
