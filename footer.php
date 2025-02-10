<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Sayfası</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="nedmin/js/ozel.js"></script>

  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px;
      opacity: 0;
      transform: translateY(100%);
      transition: opacity 0.3s ease, transform 0.3s ease;
      visibility: hidden;
      z-index: 1000;
    }
  </style>

  <script>
    window.addEventListener('scroll', function() {
      var footer = document.querySelector('footer');
      var windowHeight = window.innerHeight;
      var documentHeight = document.body.scrollHeight;
      var scrollPosition = window.pageYOffset + windowHeight;

      if (scrollPosition >= documentHeight) {
        footer.style.visibility = 'visible';
        footer.style.opacity = '1';
        footer.style.transform = 'translateY(0)';
      } else {
        footer.style.opacity = '0';
        footer.style.transform = 'translateY(100%)';

      }
    });
  </script>
</head>

<body>

  <header>
  </header>

  <main>
    <div style="height: 90px; background-color: white;"></div>
  </main>

  <footer class="bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Baraka Software @ 2024</p>
    </div>
  </footer>

</body>

</html>