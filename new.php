<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=BBH+Sans+Bogle&family=BBH+Sans+Hegarty&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/shared.css" />
    <link rel="stylesheet" href="css/new.css" />
  </head>
  <body>
    <div class="responsive-nav">
      <img src="imgs/icons/white-logo.png" width="50rem" />
      <a href="index.php" class="leave-resp">
        <img src="imgs/icons/home.svg" width="20rem" />
        Home
      </a>
    </div>
    <div class="observer">
      <a href="index.php" class="leave-section">
        <img src="imgs/icons/home.svg" width="20rem" />
        Home
      </a>
    </div>
    <div class="item" style="grid-area: box-1">
      <video
        autoplay
        muted
        loop
        playsinline
        style="
          width: 100%;
          height: 100%;
          object-fit: cover;
          top: 0;
          left: 0;
          z-index: -1;
          border-radius: 0.5rem;
        "
      >
        <source src="imgs/new.mp4" type="video/mp4" />
      </video>
      <div class="gradient-overlay">
        <h1 class="hero-h1">Make it Count !</h1>
      </div>
    </div>
    <div class="item" style="grid-area: box-2">
      <div class="gradient-overlay hover-trigger">
        <h3 class="product-p">Man Shoes</h3>
        <h3 class="product-h3">Lebron XXIII</h3>
      </div>
      <img src="imgs/new - lebron xx3.avif" alt="" />
    </div>
    <div class="item" style="grid-area: box-3">
      <div class="gradient-overlay">
        <h3 class="product-p">Woman Shoes</h3>
        <h3 class="product-h3">Nike Vomero Premium</h3>
      </div>
      <img src="imgs/new - vomero w.avif" alt="" />
    </div>
    <div class="item" style="grid-area: box-4">
      <div class="gradient-overlay">
        <h3 class="product-p">Kids Shoes</h3>
        <h3 class="product-h3">A'One SE</h3>
      </div>
      <img src="imgs/new - kids.avif" alt="" />
    </div>
    <div class="item" style="grid-area: box-5">
      <div class="gradient-overlay">
        <h3 class="product-p">Man Clothes</h3>
        <h3 class="product-h3">Nike Tech</h3>
      </div>
      <img src="imgs/new - cloth - nike-tech.avif" alt="" />
    </div>
    <div class="item" style="grid-area: box-6">
      <div class="gradient-overlay">
        <h3 class="product-p">Woman Clothes</h3>
        <h3 class="product-h3">Zenvy</h3>
      </div>
      <img src="imgs/new - cloth - zenvy.avif" alt="" />
    </div>
    <div class="first-screen">
      <h1>Just Do It.</h1>
      <img src="imgs/icons/white-logo.png" width="200rem" />
    </div>
  </body>
</html>
