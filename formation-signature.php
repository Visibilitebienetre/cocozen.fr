<?php
$pageTitle = 'Formation Signature Bien-Être & Business';
$pageDescription = 'Programme hybride de 4 mois pour unir technique, posture et stratégie.';
require __DIR__ . '/includes/header.php';
?>
  <main>
    <section class="page-hero">
      <div class="container">
        <h1><?php echo htmlspecialchars(get_content('signature_hero_title')); ?></h1>
        <p><?php echo htmlspecialchars(get_content('signature_hero_text')); ?></p>
        <div class="cta-row">
          <a href="/contact.php" class="btn"><?php echo htmlspecialchars(get_content('signature_hero_primary_cta')); ?></a>
          <a href="#programme" class="btn btn-outline"><?php echo htmlspecialchars(get_content('signature_hero_secondary_cta')); ?></a>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('signature_pillars_title')); ?></h2>
        <p class="section-subtitle"><?php echo htmlspecialchars(get_content('signature_pillars_subtitle')); ?></p>
        <div class="pillars">
          <?php foreach (get_pairs('signature_pillars') as $pillar): ?>
            <div class="pillar">
              <h3><?php echo htmlspecialchars($pillar['title']); ?></h3>
              <p><?php echo htmlspecialchars($pillar['text']); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section highlight" id="programme">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('signature_program_title')); ?></h2>
        <p class="section-subtitle"><?php echo htmlspecialchars(get_content('signature_program_subtitle')); ?></p>
        <div class="program-outline">
          <?php foreach (get_lines('signature_program_blocks') as $block): ?>
            <?php [$title, $bullets] = array_map('trim', array_pad(explode('|', $block, 2), 2, '')); ?>
            <div class="program-block">
              <h3><?php echo htmlspecialchars($title); ?></h3>
              <ul>
                <?php foreach (array_filter(array_map('trim', explode(';', $bullets))) as $bullet): ?>
                  <li><?php echo htmlspecialchars($bullet); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('signature_support_title')); ?></h2>
        <div class="cards-grid">
          <?php foreach (get_pairs('signature_support_cards') as $card): ?>
            <article class="card">
              <h3><?php echo htmlspecialchars($card['title']); ?></h3>
              <p><?php echo htmlspecialchars($card['text']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section highlight">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('signature_results_title')); ?></h2>
        <div class="features-list">
          <?php foreach (get_pairs('signature_results_points') as $result): ?>
            <div class="feature-item">
              <h3><?php echo htmlspecialchars($result['title']); ?></h3>
              <p><?php echo htmlspecialchars($result['text']); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('signature_testimonials_title')); ?></h2>
        <div class="testimonial-grid">
          <?php foreach (get_pairs('signature_testimonials') as $testimonial): ?>
            <div class="testimonial">
              <p><?php echo htmlspecialchars($testimonial['title']); ?></p>
              <span><?php echo htmlspecialchars($testimonial['text']); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section highlight">
      <div class="container">
        <div class="pricing-box">
          <p><?php echo htmlspecialchars(get_content('signature_pricing_text')); ?></p>
          <div class="cta-row">
            <a href="mailto:<?php echo htmlspecialchars(get_content('contact_email')); ?>?subject=Programme%20Bien-Etre%20%26%20Business" class="btn"><?php echo htmlspecialchars(get_content('signature_pricing_cta_primary')); ?></a>
            <a href="/contact.php" class="btn btn-light"><?php echo htmlspecialchars(get_content('signature_pricing_cta_secondary')); ?></a>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
