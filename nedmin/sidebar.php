<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dmg/admins/<?php echo $_SESSION['admins']['admins_file'] ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['admins']['admins_namesurname'] ?></p>
        <a href="#">Yönetici</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Anasayfa</li>
      <li><a href="index.php"><i class="fa fa-file"></i> <span>Kullanıcı Klavuzu</span></a></li>
      <li><a href="admins.php"><i class="fa fa-user"></i> <span>Adminler</span></a></li>
      <li><a href="foods.php"><i class="fa fa-bread-slice"></i> <span>Yiyecekler</span></a></li>
      <li><a href="drinks.php"><i class="fa fa-glass-whiskey"></i> <span>İçecekler</span></a></li>
      <li><a href="sunbeds.php"><i class="fa fa-umbrella-beach"></i> <span>Şezlonglar</span></a></li>
      <li><a href="sliders.php"><i class="fa fa-sliders-h"></i><span>Slider</span></a></li>
      <li><a href="settings.php"><i class="fa fa-cog"></i><span>Diğer Ayarlar</span></a></li>
    </ul>
  </section>
</aside>