<?php
$pageTitle = 'Mentions légales & CGV | Bien-Être & Business';
$pageDescription = 'Cadre légal des services Bien-Être & Business by Coralie Montreuil.';
require __DIR__ . '/includes/header.php';
?>
  <main>
    <section class="section legal">
      <div class="container legal-content">
        <?php echo get_content('legal_content'); ?>
      </div>
    </section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
