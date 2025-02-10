<?php require_once 'settings.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $settings['title']; ?></title>

  <link href="css/modern-business.css?v=2" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Jacques+Francois+Shadow&family=Nerko+One&family=Ribeye+Marrow&family=SUSE:wght@100..800&display=swap" rel="stylesheet">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">




  <style>
    html,
    body {
      font-family: "SUSE", sans-serif !important;
    }


    body {
      padding-top: 90px;
    }

    .carousel-inner {
      display: flex;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
      touch-action: pan-x pan-y;
      scroll-behavior: smooth;
    }

    .carousel-inner::-webkit-scrollbar {
      display: none;
    }

    .carousel-item {
      flex: 0 0 auto;
      width: 80%;
      margin-right: 10px;
      scroll-snap-align: start;
    }

    .mt-4 {
      text-align: center;
    }

    .menu p {
      color: black;
      text-decoration: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 20px;
      background: rgba(46, 76, 109, 0.7);
      padding: 10px;
      width: 40%;
      border-radius: 10px;
    }

    .menu a {
      text-decoration: none;
      position: relative;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .menu div {
      position: relative;
      transition: transform 0.5s ease, opacity 0.5s ease;
    }

    .menu a:hover div {
      transform: translateY(-10px);
      opacity: 1;
      transition: transform 0.5s ease, opacity 0.5s ease 0.5s;
    }

    #yiyecekler {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      width: 100%;
      height: 100px;
      margin: 10px;
      background:
        linear-gradient(rgba(187, 48, 48, 0.4), rgba(255, 255, 255, 0.2)),
        url("photos/food.jpg");
      text-decoration: none;
      font-size: 30px;
      border-radius: 10px;
      background-position: center;
      background-size: cover;
    }

    #icecekler {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      width: 100%;
      height: 100px;
      margin: 10px;
      background: linear-gradient(rgba(112, 224, 249, 0.4), rgba(255, 255, 255, 0.1)),
        url("photos/drink.jpg");
      text-decoration: none;
      font-size: 30px;
      border-radius: 10px;
      background-position: center;
      background-size: cover;
    }

    #sezlonglar {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      width: 100%;
      height: 100px;
      margin: 10px;
      background: linear-gradient(rgba(50, 165, 185, 0.4), rgba(255, 255, 255, 0.1)),
        url("photos/sunbed.jpg");
      text-decoration: none;
      font-size: 30px;
      border-radius: 10px;
      background-position: center;
      background-size: cover;
    }

    .sosyal_medya {
      text-align: center;
      margin: 30px;
    }

    .social-media-icons div {
      font-size: 17px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .social-media-icons a {
      color: #000;
      text-decoration: none;
      margin: 0 10px;
    }

    .social-media-icons a:hover {
      color: #007bff;
      text-decoration: none;
    }

    .carousel-caption h3 {
      color: black;
      text-decoration: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 20px;
      background: rgba(46, 76, 109, 0.7);
      padding: 10px;
      width: 30%;
      border-radius: 10px;
    }

    .logo-text {
      font-size: 30px !important;
    }

    .logo-image img {
      border-radius: 10px;
    }

    #renk {
      background-color: #134B70;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      transition: top 0.3s
    }


    #yiyecekler-details {
      margin-top: 80px;
    }

    #icecekler-details {
      margin-top: 80px;
    }

    #sunbed-details {
      margin-top: 80px;
    }

    .kartlar {
      text-align: left;
    }

    .back-btn {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: #134B70;
      font-size: 20px;
      font-weight: bold;
    }

    .icon-back {
      margin-right: 8px;
    }

    .icon-back svg {
      width: 16px;
      height: 16px;
      fill: currentColor;
    }

    .geri_don a:hover {
      text-decoration: none;
    }

    #baslik {
      margin: 0;
    }

    .logo-image img {
      width: 80px;
      height: 80px;
      border-radius: 10px;
    }



    .lrc-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 8px;
      max-width: 100%;
    }

    .lrc-content {
      display: flex;
      align-items: center;
      width: 100%;
    }

    .lrc-img {
      flex-shrink: 0;
      margin-right: 15px;
    }

    .lrc-img img {
      max-width: 150px;
      height: auto;
      border-radius: 8px;
      object-fit: cover;
    }

    .lrc-desc {
      flex-grow: 1;
    }

    .lrc-title {
      font-size: 10px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .lrc-title h2 {
      font-size: 23px;
    }

    .lrc-text {
      margin-bottom: 5px;
      font-size: 15px;
      color: #555;
    }

    .lrc-button {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
    }

    .lhc.like {
      font-size: 16px;
      font-weight: bold;
    }

    .clear {
      clear: both;
    }

    .input-group-addon {
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      border-left: 0;
    }
  </style>
  <script>
    window.addEventListener('scroll', function() {
      var header = document.getElementById('renk');
      var scrollPosition = window.pageYOffset;
      var showHeaderThreshold = 140; // Üstten 100px kala header görünsün

      // Eğer sayfanın üstüne 100px kaldıysa header görünür olacak
      if (scrollPosition <= showHeaderThreshold) {
        header.style.top = '0'; // Header görünür olacak
      } else {
        header.style.top = '-110px'; // Header gizlenecek
      }
    });
  </script>

</head>

<body>

  <div class="container" id="baslik">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="renk">
      <div class="container">
        <a class="navbar-brand logo-image" href="index.php"><img width="100" height="100" src="nedmin/dmg/settings/<?php echo $settings['logo']; ?>" alt=""></a>
        <a class="navbar-brand logo-text" href="index.php"><?php echo $settings['logo_text']; ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Anasayfa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="food.php">Yiyecekler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="drink.php">İçecekler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sunbed.php">Şezlonglar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/#hedefBolum">Bizi Takip Edin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

</body>