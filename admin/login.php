<?php
require_once __DIR__ . '/../includes/bootstrap.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === CMS_ADMIN_USER && password_verify($password, CMS_ADMIN_PASS_HASH)) {
        $_SESSION[CMS_SESSION_KEY] = CMS_ADMIN_USER;
        header('Location: /admin/index.php');
        exit;
    }
    $error = 'Identifiants incorrects. Veuillez réessayer.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion CMS | Bien-Être & Business</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/admin.css">
</head>
<body>
  <div class="admin-wrapper login-card">
    <div class="admin-card">
      <h1>Connexion</h1>
      <p>Accédez à l'interface pour mettre à jour vos contenus.</p>
      <?php if ($error): ?>
        <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>
      <form method="POST">
        <div class="field">
          <label for="username">Identifiant</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="field">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-admin">Se connecter</button>
      </form>
      <p style="margin-top:1.5rem;"><a href="/">Retour au site</a></p>
    </div>
  </div>
</body>
</html>
