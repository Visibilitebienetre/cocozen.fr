<?php
$pageTitle = 'Bien-Être & Business | Accompagnement des praticiennes du mieux-être';
$pageDescription = 'Devenez une praticienne alignée grâce au parcours hybride Bien-Être & Business imaginé par Coralie Montreuil.';
require __DIR__ . '/includes/header.php';
?>
  <main>
    <section class="hero">
      <div class="container hero-grid">
        <div>
          <span class="badge"><?php echo htmlspecialchars(get_content('home_badge')); ?></span>
          <h1><?php echo htmlspecialchars(get_content('home_hero_title')); ?></h1>
          <p><?php echo htmlspecialchars(get_content('home_hero_text')); ?></p>
          <div class="btn-group">
            <a href="/formation-signature.php" class="btn"><?php echo htmlspecialchars(get_content('home_primary_cta')); ?></a>
            <a href="/contact.php" class="btn btn-outline"><?php echo htmlspecialchars(get_content('home_secondary_cta')); ?></a>
          </div>
        </div>
        <div>
          <img src="https://images.unsplash.com/photo-1556228578-7e0b2c7b38d5?auto=format&amp;fit=crop&amp;w=900&amp;q=80" alt="Praticienne bien-être accueillant une cliente dans un espace lumineux">
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('home_intro_heading')); ?></h2>
        <p class="section-subtitle"><?php echo htmlspecialchars(get_content('home_intro_subtitle')); ?></p>
        <div class="cards-grid">
          <article class="card">
            <h3><?php echo htmlspecialchars(get_content('home_intro_card1_title')); ?></h3>
            <p><?php echo htmlspecialchars(get_content('home_intro_card1_text')); ?></p>
          </article>
          <article class="card">
            <h3><?php echo htmlspecialchars(get_content('home_intro_card2_title')); ?></h3>
            <p><?php echo htmlspecialchars(get_content('home_intro_card2_text')); ?></p>
          </article>
          <article class="card">
            <h3><?php echo htmlspecialchars(get_content('home_intro_card3_title')); ?></h3>
            <p><?php echo htmlspecialchars(get_content('home_intro_card3_text')); ?></p>
          </article>
        </div>
      </div>
    </section>

    <section class="section highlight" id="formation-signature">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('home_signature_heading')); ?></h2>
        <p class="section-subtitle"><?php echo htmlspecialchars(get_content('home_signature_subtitle')); ?></p>
        <div class="cards-grid">
          <?php foreach (get_pairs('home_signature_points') as $point): ?>
            <article class="card">
              <h3><?php echo htmlspecialchars($point['title']); ?></h3>
              <p><?php echo htmlspecialchars($point['text']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
        <div class="cta-row">
          <a href="/formation-signature.php" class="btn"><?php echo htmlspecialchars(get_content('home_signature_primary_cta')); ?></a>
          <a href="/contact.php" class="btn btn-light"><?php echo htmlspecialchars(get_content('home_signature_secondary_cta')); ?></a>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('home_short_heading')); ?></h2>
        <p class="section-subtitle"><?php echo htmlspecialchars(get_content('home_short_subtitle')); ?></p>
        <div class="modules-grid">
          <?php foreach (get_pairs('home_short_modules') as $module): ?>
            <article class="module-card">
              <h3><?php echo htmlspecialchars($module['title']); ?></h3>
              <p><?php echo htmlspecialchars($module['text']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
        <div class="cta-row">
          <a href="https://www.coraliemontreuil.fr/catalogue-formation" class="btn" target="_blank" rel="noopener"><?php echo htmlspecialchars(get_content('home_short_catalog_cta')); ?></a>
          <a href="/formations-courtes.php" class="btn btn-outline"><?php echo htmlspecialchars(get_content('home_short_page_cta')); ?></a>
        </div>
      </div>
    </section>

    <section class="section highlight">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('home_why_heading')); ?></h2>
        <p class="section-subtitle"><?php echo htmlspecialchars(get_content('home_why_subtitle')); ?></p>
        <div class="features-list">
          <?php foreach (get_pairs('home_why_points') as $feature): ?>
            <div class="feature-item">
              <h3><?php echo htmlspecialchars($feature['title']); ?></h3>
              <p><?php echo htmlspecialchars($feature['text']); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <h2><?php echo htmlspecialchars(get_content('home_testimonials_heading')); ?></h2>
        <p class="section-subtitle"><?php echo htmlspecialchars(get_content('home_testimonials_subtitle')); ?></p>
        <div class="testimonial-grid">
          <?php foreach (get_pairs('home_testimonials') as $testimonial): ?>
            <div class="testimonial">
              <p><?php echo htmlspecialchars($testimonial['title']); ?></p>
              <span><?php echo htmlspecialchars($testimonial['text']); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="cta-row">
          <a href="/temoignages.php" class="btn">Lire d'autres transformations</a>
        </div>
      </div>
    </section>

    <section class="section highlight" id="contact">
      <div class="container">
        <div class="contact-card">
          <div>
            <h3><?php echo htmlspecialchars(get_content('home_contact_title')); ?></h3>
            <p><?php echo htmlspecialchars(get_content('home_contact_text')); ?></p>
            <div class="btn-group">
              <a href="/contact.php" class="btn"><?php echo htmlspecialchars(get_content('home_contact_primary_cta')); ?></a>
              <a href="https://wa.me/33618864634" class="btn btn-outline" target="_blank" rel="noopener"><?php echo htmlspecialchars(get_content('home_contact_secondary_cta')); ?></a>
            </div>
          </div>
          <div class="contact-details">
            <ul>
              <li><strong>Téléphone :</strong> <a href="tel:+33618864634"><?php echo htmlspecialchars(get_content('contact_phone')); ?></a></li>
              <li><strong>Email :</strong> <a href="mailto:<?php echo htmlspecialchars(get_content('contact_email')); ?>"><?php echo htmlspecialchars(get_content('contact_email')); ?></a></li>
              <li><strong>Instagram :</strong> <a href="<?php echo htmlspecialchars(get_content('contact_instagram')); ?>" target="_blank" rel="noopener">@coralie.montreuil</a></li>
              <li><strong>Lieu :</strong> <?php echo htmlspecialchars(get_content('contact_location')); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
