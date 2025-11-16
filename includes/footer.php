  <footer class="footer">
    <div class="container footer-grid">
      <div>
        <div class="logo"><?php echo htmlspecialchars(get_content('site_logo', 'Bien-Être & Business')); ?></div>
        <p><?php echo htmlspecialchars(get_content('footer_tagline', 'Accompagnement et formations professionnelles.')); ?></p>
      </div>
      <div>
        <h4>Contact</h4>
        <p><?php echo htmlspecialchars(get_content('contact_phone')); ?><br><a href="mailto:<?php echo htmlspecialchars(get_content('contact_email')); ?>"><?php echo htmlspecialchars(get_content('contact_email')); ?></a><br><?php echo htmlspecialchars(get_content('contact_location')); ?></p>
      </div>
      <div>
        <h4>Explorer</h4>
        <ul class="footer-links">
          <li><a href="/formation-signature.php">Formation Signature</a></li>
          <li><a href="/formations-courtes.php">Formations courtes</a></li>
          <li><a href="/temoignages.php">Témoignages</a></li>
          <li><a href="/contact.php">Contact</a></li>
        </ul>
      </div>
      <div>
        <h4>Suivre Coralie</h4>
        <ul class="footer-links">
          <li><a href="<?php echo htmlspecialchars(get_content('contact_instagram', '#')); ?>" target="_blank" rel="noopener">Instagram</a></li>
          <li><a href="https://wa.me/33618864634" target="_blank" rel="noopener">WhatsApp</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> Bien-Être &amp; Business by Coralie Montreuil. Tous droits réservés. <a href="/mentions-legales-cgv.php">Mentions légales &amp; CGV</a></p>
    </div>
  </footer>
</body>
</html>
