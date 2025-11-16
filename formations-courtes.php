<?php
$pageTitle = 'Formations courtes massage | Bien-Être & Business';
$pageDescription = 'Modules intensifs pour enrichir vos techniques de massage et fidéliser vos clientes.';
require __DIR__ . '/includes/header.php';
?>
  <main>
    <section class="page-hero">
      <div class="container">
        <h1><?php echo htmlspecialchars(get_content('short_intro_title')); ?></h1>
        <p><?php echo htmlspecialchars(get_content('short_intro_text')); ?></p>
        <div class="cta-row">
          <a href="https://www.coraliemontreuil.fr/catalogue-formation" class="btn" target="_blank" rel="noopener"><?php echo htmlspecialchars(get_content('short_cta_text')); ?></a>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('short_modules_heading')); ?></h2>
        <div class="modules-grid">
          <?php foreach (get_pairs('short_modules_list') as $module): ?>
            <article class="module-card">
              <h3><?php echo htmlspecialchars($module['title']); ?></h3>
              <p><?php echo htmlspecialchars($module['text']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section highlight">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('short_infos_heading')); ?></h2>
        <div class="features-list">
          <?php foreach (get_pairs('short_infos_points') as $info): ?>
            <div class="feature-item">
              <h3><?php echo htmlspecialchars($info['title']); ?></h3>
              <p><?php echo htmlspecialchars($info['text']); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="cta-row">
          <a href="/contact.php" class="btn">Planifier ma montée en compétences</a>
        </div>
      </div>
    </section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
