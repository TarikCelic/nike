const shoeGrid = document.querySelector("article");
let products = [];

fetch("shoes.json")
  .then((response) => response.json())
  .then((data) => {
    products = data.patike;
    displayProducts(products);
  })
  .catch((err) => console.error("Greska pri ucitavanju JSON-a:", err));

function displayProducts(items) {
  shoeGrid.innerHTML = "";
  items.forEach((p) => {
    shoeGrid.insertAdjacentHTML(
      "beforeend",
      `<div class="shoe-item">
        <img src="${p.img}" alt="" />
        <div class="shoe-info">
          <h3 class="shoe-name">${p.name}</h3>
          <p class="shoe-gender">${p.gender}'s shoe</p>
          <div class="shoe-price">
            <p class="price-now">${p.price} EUR</p>
            <p class="price-original">${
              p.sale && p.originalPrice ? p.originalPrice + " EUR" : ""
            }</p>
            <p class="sale">${
              p.sale && p.originalPrice
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

const filters = document.querySelectorAll("input[type=checkbox]");
filters.forEach((cb) => cb.addEventListener("change", applyFilters));

const sizeButtons = document.querySelectorAll(".size-btn");
sizeButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.toggle("active");
    applyFilters();
  });
});

const colorButtons = document.querySelectorAll(".colour");
colorButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.toggle("active");

    // Fix: Deaktiviraj sale filter ako je automatski aktivan
    const saleCheckbox = document.querySelector(".filter-sale");
    if (saleCheckbox && saleCheckbox.checked) {
      saleCheckbox.checked = false;
    }

    applyFilters();
  });
});

function applyFilters() {
  const genderChecked = Array.from(
    document.querySelectorAll(".filter-gender:checked")
  ).map((i) => i.value);

  const priceChecked = Array.from(
    document.querySelectorAll(".filter-price:checked")
  ).map((i) => i.value);

  const saleChecked = document.querySelector(".filter-sale:checked")
    ? true
    : false;

  const colorChecked = Array.from(
    document.querySelectorAll(".colour.active")
  ).map((c) => c.dataset.color);

  const heightChecked = Array.from(
    document.querySelectorAll(".filter-shoeHeight:checked")
  ).map((i) => i.value);

  const collectionChecked = Array.from(
    document.querySelectorAll(".filter-collection:checked")
  ).map((i) => i.value);

  const sportsChecked = Array.from(
    document.querySelectorAll(".filter-sports:checked")
  ).map((i) => i.value);

  const brandChecked = Array.from(
    document.querySelectorAll(".filter-brand:checked")
  ).map((i) => i.value);

  const activeSizes = Array.from(
    document.querySelectorAll(".size-btn.active")
  ).map((b) => parseFloat(b.textContent));

  const filtered = products.filter((p) => {
    if (genderChecked.length > 0 && !genderChecked.includes(p.gender))
      return false;

    if (activeSizes.length > 0 && !p.size.some((s) => activeSizes.includes(s)))
      return false;

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

    if (saleChecked && !p.sale) return false;

    if (colorChecked.length > 0) {
      const productColors = p.colour.map((c) => c.toLowerCase());
      const selectedColors = colorChecked.map((c) => c.toLowerCase());
      const match = productColors.some((c) => selectedColors.includes(c));
      if (!match) return false;
    }

    if (heightChecked.length > 0 && !heightChecked.includes(p.shoeHeight))
      return false;

    if (
      collectionChecked.length > 0 &&
      !collectionChecked.includes(p.collection)
    )
      return false;

    if (sportsChecked.length > 0 && !sportsChecked.includes(p.sports))
      return false;

    if (brandChecked.length > 0 && !brandChecked.includes(p.brand))
      return false;

    return true;
  });

  displayProducts(filtered);
}
