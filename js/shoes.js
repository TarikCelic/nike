const shoeGrid = document.querySelector("article");
let products = []; // svi proizvodi

// 1️⃣ Učitavanje JSON-a
fetch("shoes.json")
  .then((response) => response.json())
  .then((data) => {
    products = data.patike;
    displayProducts(products); // inicijalno sve proizvode
  })
  .catch((err) => console.error("Greška pri učitavanju JSON-a:", err));

// 2️⃣ Funkcija za prikaz proizvoda
function displayProducts(items) {
  shoeGrid.innerHTML = ""; // očisti prethodne
  items.forEach((p) => {
    shoeGrid.insertAdjacentHTML(
      "beforeend",
      `<div class="shoe-item">
        <img src="${p.img}" alt="" />
        <div class="shoe-info">
          <h3 class="shoe-name">${p.name}</h3>
          <p class="shoe-gender">${p.gender}'s shoe</p>
          <div class="shoe-price">
            <p class="price-now">${p.price}€</p>
            <p class="price-original">${p.sale ? p.originalPrice + "€" : ""}</p>
            <p class="sale">${
              p.sale
                ? Math.round(
                    ((p.originalPrice - p.price) / p.originalPrice) * 100
                  ) + "% off"
                : ""
            }</p>
          </div>
        </div>
      </div>`
    );
  });
}

// 3️⃣ Prati sve checkboxove
const filters = document.querySelectorAll("input[type=checkbox]");
filters.forEach((cb) => cb.addEventListener("change", applyFilters));

// 4️⃣ Funkcija za filtriranje
function applyFilters() {
  // Gender
  const genderChecked = Array.from(
    document.querySelectorAll(".filter-gender:checked")
  ).map((i) => i.value);

  // Price
  const priceChecked = Array.from(
    document.querySelectorAll(".filter-price:checked")
  ).map((i) => i.value);

  // Sale
  const saleChecked = document.querySelector(".filter-sale:checked")
    ? true
    : false;

  // Color
  const colorChecked = Array.from(
    document.querySelectorAll(".filter-color:checked")
  ).map((i) => i.value);

  // Shoe Height
  const heightChecked = Array.from(
    document.querySelectorAll(".filter-shoeHeight:checked")
  ).map((i) => i.value);

  // Collection
  const collectionChecked = Array.from(
    document.querySelectorAll(".filter-collection:checked")
  ).map((i) => i.value);

  // Sports
  const sportsChecked = Array.from(
    document.querySelectorAll(".filter-sports:checked")
  ).map((i) => i.value);

  // Brand
  const brandChecked = Array.from(
    document.querySelectorAll(".filter-brand:checked")
  ).map((i) => i.value);

  // Filtriranje
  const filtered = products.filter((p) => {
    // Gender filter
    if (genderChecked.length > 0 && !genderChecked.includes(p.gender))
      return false;

    // Price filter
    if (priceChecked.length > 0) {
      let pass = false;
      for (let range of priceChecked) {
        if (range === "0-50" && p.price <= 50) pass = true;
        if (range === "50-100" && p.price > 50 && p.price <= 100) pass = true;
        if (range === "100-150" && p.price > 100 && p.price <= 150) pass = true;
        if (range === "150+" && p.price > 150) pass = true;
      }
      if (!pass) return false;
    }

    // Sale filter
    if (saleChecked && !p.sale) return false;

    // Color
    if (colorChecked.length > 0 && !colorChecked.includes(p.color))
      return false;

    // Shoe Height
    if (heightChecked.length > 0 && !heightChecked.includes(p.shoeHeight))
      return false;

    // Collection
    if (
      collectionChecked.length > 0 &&
      !collectionChecked.includes(p.collection)
    )
      return false;

    // Sports
    if (sportsChecked.length > 0 && !sportsChecked.includes(p.sports))
      return false;

    // Brand
    if (brandChecked.length > 0 && !brandChecked.includes(p.brand))
      return false;

    return true; // prođe sve filtere
  });

  // Prikaz filtriranih proizvoda
  displayProducts(filtered);
}
