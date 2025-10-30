<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/shared.css" />
    <link rel="stylesheet" href="css/article.css" />
  </head>
  <body>
    <div class="resp-navigation">
      <div class="first-row-nav">
        <img src="imgs/icons/nike_black_logo.svg" alt="logo" id="logo-img" />
        <div class="close-nav">
          <img src="imgs/icons/close_btn.svg" width="35rem" />
        </div>
      </div>
      <div class="second-row-nav">
        <ul>
          <li>
            <a href="new.php">
              <img src="imgs/icons/top-left-arrow.svg" width="20px" alt="" />
              New</a
            >
          </li>
          <li>
            <a href="products.php?type=shoes">
              <img
                src="imgs/icons/top-left-arrow.svg"
                width="20rem"
                alt=""
              />Shoes</a
            >
          </li>
          <li>
            <a href="products.php?type=clothes">
              <img
                src="imgs/icons/top-left-arrow.svg"
                width="20rem"
                alt=""
              />Clothes</a
            >
          </li>
          <li>
            <a href="">
              <img
                src="imgs/icons/top-left-arrow.svg"
                width="20rem"
                alt=""
              />Kids</a
            >
          </li>
        </ul>
      </div>
      <div class="third-row-nav">
        <div class="nav-btn">
          <button type="button" id="search-button">
            <img src="imgs/icons/search.svg" alt="search" />
          </button>
        </div>
        <div class="nav-btn">
          <a href="" id="favourites">
            <img
              src="imgs/icons/favourite.svg"
              alt="favourites"
              id="favourites-icon"
            />
          </a>
        </div>
        <div class="nav-btn">
          <a href="" id="cart">
            <img
              src="imgs/icons/cart.svg"
              alt="favourites"
              id="favourites-icon"
            />
          </a>
        </div>
      </div>
    </div>
    <header>
      <a class="logo" href="index.php">
        <img src="imgs/icons/nike_black_logo.svg" alt="logo" id="logo-img" />
      </a>
      <nav>
        <ul>
          <li><a href="new.php">New</a></li>
          <li><a href="products.php?type=shoes">Shoes</a></li>
          <li><a href="products.php?type=clothes">Clothes</a></li>
          <li><a href="">Kids</a></li>
        </ul>
      </nav>
      <div class="right-side-header">
        <div class="search">
          <button type="button" id="search-button">
            <img src="imgs/icons/search.svg" alt="search" />
          </button>
          <input id="search-input" type="text" placeholder="Search" />
        </div>
        <a href="" id="favourites">
          <img
            src="imgs/icons/favourite.svg"
            alt="favourites"
            id="favourites-icon"
          />
        </a>
        <a href="" id="cart">
          <img
            src="imgs/icons/cart.svg"
            alt="favourites"
            id="favourites-icon"
          />
        </a>
      </div>
      <div class="hambi">
        <img src="imgs/icons/hambi.svg" width="30rem" alt="" />
      </div>
    </header>
    <main>
      <aside>
        <div class="filteri">
          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Gender
            </button>
            <ul class="dropdown-menu">
              <div class="form-check">
                <input
                  class="form-check-input filter-gender"
                  type="checkbox"
                  value="Man"
                  id="genderMan"
                />
                <label class="form-check-label" for="genderMan"> Man </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-gender"
                  type="checkbox"
                  value="Woman"
                  id="genderWoman"
                />
                <label class="form-check-label" for="genderWoman">
                  Woman
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-gender"
                  type="checkbox"
                  value="Unisex"
                  id="genderUnisex"
                />
                <label class="form-check-label" for="genderUnisex">
                  Unisex
                </label>
              </div>
            </ul>
          </div>

          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Shop By Price
            </button>
            <ul class="dropdown-menu">
              <div class="form-check">
                <input
                  class="form-check-input filter-price"
                  type="checkbox"
                  value="0-50"
                  id="price1"
                />
                <label class="form-check-label" for="price1"> Under 50€ </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-price"
                  type="checkbox"
                  value="50-100"
                  id="price2"
                />
                <label class="form-check-label" for="price2">
                  Between 50€ and 100€
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-price"
                  type="checkbox"
                  value="100-150"
                  id="price3"
                />
                <label class="form-check-label" for="price3">
                  Between 100€ and 150€
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-price"
                  type="checkbox"
                  value="150+"
                  id="price4"
                />
                <label class="form-check-label" for="price4">
                  More than 150€
                </label>
              </div>
            </ul>
          </div>

          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Sale and Offers
            </button>
            <ul class="dropdown-menu">
              <div class="form-check">
                <input
                  class="form-check-input filter-sale"
                  type="checkbox"
                  value="sale"
                  id="saleCheck"
                />
                <label class="form-check-label" for="saleCheck"> Sale </label>
              </div>
            </ul>
          </div>

          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Sizes
            </button>
            <div class="dropdown-menu btns">
              <button class="size-btn">35.5</button>
              <button class="size-btn">36</button>
              <button class="size-btn">36.5</button>
              <button class="size-btn">37</button>
              <button class="size-btn">37.5</button>
              <button class="size-btn">38</button>
              <button class="size-btn">38.5</button>
              <button class="size-btn">39</button>
              <button class="size-btn">39.5</button>
              <button class="size-btn">40</button>
              <button class="size-btn">40.5</button>
              <button class="size-btn">41</button>
              <button class="size-btn">41.5</button>
              <button class="size-btn">42</button>
              <button class="size-btn">42.5</button>
              <button class="size-btn">43</button>
              <button class="size-btn">43.5</button>
              <button class="size-btn">44</button>
              <button class="size-btn">44.5</button>
              <button class="size-btn">45</button>
              <button class="size-btn">45.5</button>
              <button class="size-btn">46</button>
              <button class="size-btn">46.5</button>
              <button class="size-btn">47</button>
              <button class="size-btn">47.5</button>
              <button class="size-btn">48</button>
              <button class="size-btn">48.5</button>
              <button class="size-btn">49</button>
              <button class="size-btn">49.5</button>
              <button class="size-btn">50</button>
              <button class="size-btn">50.5</button>
              <button class="size-btn">51</button>
            </div>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Colour
            </button>

            <div class="dropdown-menu colours-grid">
              <div class="colour" data-color="black">
                <div class="color-circle" style="background-color: black"></div>
                Black
              </div>
              <div class="colour" data-color="blue">
                <div
                  class="color-circle"
                  style="background-color: rgb(9, 144, 255)"
                ></div>
                Blue
              </div>
              <div class="colour" data-color="brown">
                <div
                  class="color-circle"
                  style="background-color: rgb(146, 79, 79)"
                ></div>
                Brown
              </div>
              <div class="colour" data-color="green">
                <div
                  class="color-circle"
                  style="background-color: rgb(104, 184, 104)"
                ></div>
                Green
              </div>
              <div class="colour" data-color="gray">
                <div
                  class="color-circle"
                  style="background-color: rgb(138, 138, 138)"
                ></div>
                Gray
              </div>
              <div class="colour" data-color="orange">
                <div
                  class="color-circle"
                  style="background-color: rgb(255, 123, 0)"
                ></div>
                Orange
              </div>

              <div class="colour" data-color="pink">
                <div
                  class="color-circle"
                  style="background-color: rgb(214, 146, 228)"
                ></div>
                Pink
              </div>
              <div class="colour" data-color="purple">
                <div
                  class="color-circle"
                  style="background-color: rgb(122, 5, 218)"
                ></div>
                Purple
              </div>
              <div class="colour" data-color="red">
                <div
                  class="color-circle"
                  style="background-color: rgb(228, 55, 55)"
                ></div>
                Red
              </div>

              <div class="colour" data-color="white">
                <div
                  class="color-circle"
                  style="background-color: rgb(255, 255, 255)"
                ></div>
                White
              </div>
              <div class="colour" data-color="yellow">
                <div
                  class="color-circle"
                  style="background-color: rgb(255, 252, 55)"
                ></div>
                Yellow
              </div>
            </div>
          </div>

          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Shoe Height
            </button>
            <ul class="dropdown-menu">
              <div class="form-check">
                <input
                  class="form-check-input filter-shoeHeight"
                  type="checkbox"
                  value="Low Top"
                  id="heightLow"
                />
                <label class="form-check-label" for="heightLow">
                  Low Top
                </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-shoeHeight"
                  type="checkbox"
                  value="Mid Top"
                  id="heightMid"
                />
                <label class="form-check-label" for="heightMid">
                  Mid Top
                </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-shoeHeight"
                  type="checkbox"
                  value="High Top"
                  id="heightHigh"
                />
                <label class="form-check-label" for="heightHigh">
                  High Top
                </label>
              </div>
            </ul>
          </div>

          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Collection
            </button>
            <ul class="dropdown-menu">
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Nike Motiva"
                  id="col1"
                />
                <label class="form-check-label" for="col1"> Nike Motiva </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Nike GT Series"
                  id="col2"
                />
                <label class="form-check-label" for="col2">
                  Nike GT Series
                </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Air Max"
                  id="col3"
                />
                <label class="form-check-label" for="col3"> Air Max </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Nike Total 90"
                  id="col4"
                />
                <label class="form-check-label" for="col4">
                  Nike Total 90
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Elite"
                  id="col5"
                />
                <label class="form-check-label" for="col5"> Elite </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Mercurial"
                  id="col6"
                />
                <label class="form-check-label" for="col6"> Mercurial </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Monarch"
                  id="col7"
                />
                <label class="form-check-label" for="col7"> Monarch </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Nike Dunk"
                  id="col8"
                />
                <label class="form-check-label" for="col8"> Nike Dunk </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Tiempo"
                  id="col9"
                />
                <label class="form-check-label" for="col9"> Tiempo </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Nike Zoom Rival"
                  id="col10"
                />
                <label class="form-check-label" for="col10">
                  Nike Zoom Rival
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Phantom"
                  id="col11"
                />
                <label class="form-check-label" for="col11"> Phantom </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Nike Rejuven8"
                  id="col12"
                />
                <label class="form-check-label" for="col12">
                  Nike Rejuven8
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-collection"
                  type="checkbox"
                  value="Nike Court Vision"
                  id="col13"
                />
                <label class="form-check-label" for="col13">
                  Nike Court Vision
                </label>
              </div>
            </ul>
          </div>

          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Sports
            </button>
            <ul class="dropdown-menu">
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Lifestyle"
                  id="sport1"
                />
                <label class="form-check-label" for="sport1"> Lifestyle </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Performance"
                  id="sport2"
                />
                <label class="form-check-label" for="sport2">
                  Performance
                </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Running"
                  id="sport3"
                />
                <label class="form-check-label" for="sport3"> Running </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Training & Gym"
                  id="sport4"
                />
                <label class="form-check-label" for="sport4">
                  Training & Gym
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Basketball"
                  id="sport5"
                />
                <label class="form-check-label" for="sport5">
                  Basketball
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Football"
                  id="sport6"
                />
                <label class="form-check-label" for="sport6"> Football </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Golf"
                  id="sport7"
                />
                <label class="form-check-label" for="sport7"> Golf </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Skateboarding"
                  id="sport8"
                />
                <label class="form-check-label" for="sport8">
                  Skateboarding
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Tennis"
                  id="sport9"
                />
                <label class="form-check-label" for="sport9"> Tennis </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Athletics"
                  id="sport10"
                />
                <label class="form-check-label" for="sport10">
                  Athletics
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Walking"
                  id="sport11"
                />
                <label class="form-check-label" for="sport11"> Walking </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input filter-sports"
                  type="checkbox"
                  value="Outdoor"
                  id="sport12"
                />
                <label class="form-check-label" for="sport12"> Outdoor </label>
              </div>
            </ul>
          </div>

          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Brand
            </button>
            <ul class="dropdown-menu">
              <div class="form-check">
                <input
                  class="form-check-input filter-brand"
                  type="checkbox"
                  value="Nike Sportswear"
                  id="brand1"
                />
                <label class="form-check-label" for="brand1">
                  Nike Sportswear
                </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-brand"
                  type="checkbox"
                  value="Jordan"
                  id="brand2"
                />
                <label class="form-check-label" for="brand2"> Jordan </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-brand"
                  type="checkbox"
                  value="NikeLab"
                  id="brand3"
                />
                <label class="form-check-label" for="brand3"> NikeLab </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input filter-brand"
                  type="checkbox"
                  value="ACG"
                  id="brand4"
                />
                <label class="form-check-label" for="brand4"> ACG </label>
              </div>
            </ul>
          </div>
        </div>
      </aside>
      <article>
        <?php
// products.php
require_once 'config.php'; 

// 1. DYNAMICNA TABELA
// Postavlja defaultni tip, a zatim ga preuzima iz URL-a.
$product_type = isset($_GET['type']) && in_array($_GET['type'], ['shoes', 'clothes']) 
    ? $_GET['type'] 
    : 'shoes'; // Default je 'shoes' ako nema parametra ili je pogrešan

// Koristimo varijablu za SQL upit
$table_name = $product_type;

// 2. FILTRIRANJE
// (Možete zadržati postojeću logiku za filtriranje, ali sada morate 
// voditi računa da se upit koristi s dinamičkim nazivom tabele $table_name)
// U ovom primjeru, izbacili smo filter logiku radi čitljivosti, ali je možete
// vratiti ako vam je potrebna.

// 3. DOHVATANJE PROIZVODA IZ DINAMIČKE TABELE
try {
    // Upit koristi dinamički naziv tabele: $table_name
    $sql = "SELECT * FROM {$table_name} ORDER BY created_at DESC";
    $products = $baza->query($sql)->fetchAll();
    $page_title = ucfirst($product_type); // Npr. "Shoes" ili "Clothes"

} catch (PDOException $e) {
    // U slučaju da tabela ne postoji
    $products = [];
    $page_title = "Greška";
    // Opcionalno, prikažite grešku samo za razvoj: echo "Greška: " . $e->getMessage();
}

?>
          <?php if (empty($products)): ?>
            <p>Trenutno nema proizvoda u kategoriji: <?= htmlspecialchars($page_title) ?>.</p>
          <?php endif; ?>

          <?php foreach($products as $p): ?>
            <div class="shoe-item">
              <img src="<?= htmlspecialchars($p['img']) ?>" alt="<?= htmlspecialchars($p['name']) ?>" />
              <div class="shoe-info">
                <h3 class="shoe-name"><?= htmlspecialchars($p['name']) ?></h3>
                <p class="shoe-gender"><?= htmlspecialchars($p['gender']) ?>'s <?= htmlspecialchars($product_type) ?></p>
                <div class="shoe-price">
                  <p class="price-now"><?= $p['price'] ?> EUR</p>
                  <p class="price-original">
                    <?= ($p['sale'] && $p['originalPrice']) ? $p['originalPrice'] . " EUR" : "" ?>
                  </p>
                  <p class="sale">
                    <?= ($p['sale'] && $p['originalPrice']) 
                          ? round((($p['originalPrice'] - $p['price']) / $p['originalPrice']) * 100) . "% off" 
                          : "" ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
      </article>
    </main>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
