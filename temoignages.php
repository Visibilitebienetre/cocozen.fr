<?php
$pageTitle = 'Témoignages | Bien-Être & Business';
$pageDescription = 'Découvrez les transformations vécues par les praticiennes accompagnées par Coralie Montreuil.';
require __DIR__ . '/includes/header.php';
?>
  <main>
    <section class="page-hero">
      <div class="container">
        <h1><?php echo htmlspecialchars(get_content('testimonials_intro_title')); ?></h1>
        <p><?php echo htmlspecialchars(get_content('testimonials_intro_text')); ?></p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="testimonial-gallery">
          <?php foreach (get_pairs('testimonials_gallery') as $testimonial): ?>
            <article class="testimonial-card">
              <p><?php echo htmlspecialchars($testimonial['title']); ?></p>
              <span><?php echo htmlspecialchars($testimonial['text']); ?></span>
            </article>
          <?php endforeach; ?>
        </div>
        <div class="cta-row">
          <a href="/contact.php" class="btn"><?php echo htmlspecialchars(get_content('testimonials_cta_text')); ?></a>
        </div>
      </div>
    </section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
