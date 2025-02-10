<?php
require_once 'header.php';
require_once 'slider.php';
?>

<div class="">

  <h2 class="mt-4">MENÜ</h2>

  <div class="menu">
    <a href="food.php" class="nav-link">
      <div id="yiyecekler">
        <p>YİYECEKLER</p>
      </div>
    </a>
    <a href="drink.php" class="nav-link">
      <div id="icecekler">
        <p>İÇECEKLER</p>
      </div>
    </a>
    <a href="sunbed.php" class="nav-link">
      <div id="sezlonglar">
        <p>ŞEZLONGLAR</p>
      </div>
    </a>
  </div>

  <section>
    <div class="sosyal_medya" id="hedefBolum">
      <div class="social-media-icons" style="text-align: center; margin-top: 20px;">
        <div>
          <p>Bizi Takip Edin</p>
        </div>
        <div style="text-align: center; margin-top: 20px;">
          <a href="<?php echo $settings['facebook']; ?>" target="_blank">
            <i class="fab fa-facebook-f" style="font-size: 36px; margin-right: 10px;"></i>
          </a>
          <a href="<?php echo $settings['instagram']; ?>" target="_blank">
            <i class="fab fa-instagram" style="font-size: 36px; margin-right: 10px;"></i>
          </a>
          <a href="<?php echo $settings['X']; ?>" target="_blank">
            <i class="fab fa-twitter" style="font-size: 36px; margin-right: 10px;"></i>
          </a>
          <a href="<?php echo $settings['tiktok']; ?>" target="_blank">
            <i class="fab fa-tiktok" style="font-size: 36px;"></i>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php require_once 'footer.php'; ?>