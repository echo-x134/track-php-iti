var result;
let cartCount = 0;

let summary = document.createElement("div");
summary.classList.add("summary");

let productsLabel = document.createElement("span");
productsLabel.innerText = "Products: ";

let productsNumber = document.createElement("span");
productsNumber.id = "products-count";
productsNumber.innerText = "0";

let cartLabel = document.createElement("span");
cartLabel.innerText = " | Cart: ";

let cartNumber = document.createElement("span");
cartNumber.id = "cart-count";
cartNumber.innerText = cartCount;

summary.append(productsLabel, productsNumber, cartLabel, cartNumber);
document.body.appendChild(summary);

async function fetchProducts() {
  try {
    const response = await fetch("https://dummyjson.com/products");

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    result = await response.json();
    console.log(typeof result);
    console.log(result);
    productsNumber.innerText = result.products.length;

    result.products.forEach((product) => {
      createProduct(product);
    });
  } catch (error) {
    console.log("error with code", error);
  }
}

fetchProducts();

var container = document.createElement("div");
container.classList.add("container");

function createProduct(product) {
  // console.log(product);

  let card = document.createElement("div");
  card.classList.add("card");

  let cardImage = document.createElement("img");
  cardImage.classList.add("imag");
  cardImage.src = product.thumbnail;

  let cardButton = document.createElement("button");
  cardButton.innerText = "Add To Cart";
  cardButton.addEventListener("click", () => {
    cartCount++;
    cartNumber.innerText = cartCount;
  });

  let title = document.createElement("p");
  title.innerText = product.title;

  let price = document.createElement("p");
  price.innerText = product.price;

  let description = document.createElement("p");
  description.innerText = product.description;

  let rating = document.createElement("p");
  rating.innerText = "Rating: " + product.rating;

  card.append(cardImage, title, description, price, rating, cardButton);
  container.appendChild(card);
  document.body.appendChild(container);
}