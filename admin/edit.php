<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_login();
$fields = require __DIR__ . '/../includes/fields.php';
$page = $_GET['page'] ?? 'home';

if (!isset($fields[$page])) {
    header('Location: /admin/index.php');
    exit;
}

$labels = [
    'global' => 'Paramètres globaux',
    'home' => 'Accueil',
    'formation-signature' => 'Formation Signature',
    'formations-courtes' => 'Formations courtes',
    'temoignages' => 'Témoignages',
    'contact' => 'Contact',
    'legal' => 'Mentions légales & CGV'
];

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!verify_csrf($token)) {
        $error = 'Session expirée. Merci de recharger la page.';
    } else {
        global $cmsContent;
        foreach ($fields[$page] as $key => $label) {
            $cmsContent[$key] = $_POST[$key] ?? '';
        }
        if (save_content($cmsContent)) {
            $success = true;
        } else {
            $error = 'Impossible d\'enregistrer les modifications. Vérifiez les droits du dossier data/.';
        }
    }
}

$csrfToken = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier <?php echo htmlspecialchars($labels[$page] ?? $page); ?> | CMS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/admin.css">
</head>
<body>
  <div class="admin-wrapper">
    <div class="admin-nav">
      <h1><?php echo htmlspecialchars($labels[$page] ?? ucfirst($page)); ?></h1>
      <a href="/admin/index.php">Retour</a>
    </div>
    <div class="admin-card">
      <?php if ($success): ?>
        <div class="alert alert-success">Contenu mis à jour avec succès.</div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>
      <form method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken); ?>">
        <?php foreach ($fields[$page] as $key => $label): ?>
          <?php
            $value = get_content($key);
            $isLong = str_contains($value, "\n") || strlen($value) > 160 || str_contains($key, 'text') || str_contains($key, 'content');
          ?>
          <div class="field">
            <label for="<?php echo htmlspecialchars($key); ?>"><?php echo htmlspecialchars($label); ?></label>
            <?php if ($isLong): ?>
              <textarea id="<?php echo htmlspecialchars($key); ?>" name="<?php echo htmlspecialchars($key); ?>" rows="5"><?php echo htmlspecialchars($value); ?></textarea>
            <?php else: ?>
              <input type="text" id="<?php echo htmlspecialchars($key); ?>" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($value); ?>">
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
        <button type="submit" class="btn-admin">Enregistrer</button>
      </form>
    </div>
  </div>
</body>
</html>
