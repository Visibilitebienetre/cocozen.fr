<?php
$pageTitle = 'Contact | Bien-Être & Business';
$pageDescription = 'Prenez rendez-vous avec Coralie Montreuil pour un appel découverte.';
require __DIR__ . '/includes/header.php';
?>
  <main>
    <section class="page-hero">
      <div class="container">
        <h1><?php echo htmlspecialchars(get_content('contact_page_title')); ?></h1>
        <p><?php echo htmlspecialchars(get_content('contact_page_intro')); ?></p>
      </div>
    </section>

    <section class="section">
      <div class="container contact-page">
        <div class="contact-info">
          <h2><?php echo htmlspecialchars(get_content('contact_info_title')); ?></h2>
          <p><?php echo htmlspecialchars(get_content('contact_info_text')); ?></p>
          <ul>
            <?php foreach (get_lines('contact_info_list') as $line): ?>
              <?php [$label, $value, $link] = array_pad(explode('|', $line, 3), 3, ''); ?>
              <li><strong><?php echo htmlspecialchars($label); ?> :</strong> <a href="<?php echo htmlspecialchars($link ?: '#'); ?>"<?php echo str_starts_with($link, 'http') ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo htmlspecialchars($value); ?></a></li>
            <?php endforeach; ?>
          </ul>
          <div class="map" aria-hidden="true">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2893.431261415353!2d5.880!3d43.100!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9092c335ede1b%3A0xe4575c9b3c8c14b0!2sLa%20Seyne-sur-Mer!5e0!3m2!1sfr!2sfr!4v1700000000000" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <form action="https://formsubmit.co/<?php echo htmlspecialchars(get_content('contact_email')); ?>" method="POST">
          <h2><?php echo htmlspecialchars(get_content('contact_form_title')); ?></h2>
          <p><?php echo htmlspecialchars(get_content('contact_form_text')); ?></p>
          <input type="hidden" name="_subject" value="<?php echo htmlspecialchars(get_content('contact_form_subject')); ?>">
          <input type="hidden" name="_captcha" value="false">
          <label for="name">Nom complet</label>
          <input type="text" id="name" name="Nom" required>
          <label for="email">Adresse email</label>
          <input type="email" id="email" name="Email" required>
          <label for="message">Votre message</label>
          <textarea id="message" name="Message" placeholder="Parlez-nous de votre parcours, de vos envies et de vos objectifs"></textarea>
          <button type="submit" class="btn"><?php echo htmlspecialchars(get_content('contact_form_button')); ?></button>
        </form>
      </div>
    </section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
