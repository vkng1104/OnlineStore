import { searchProducts } from "./search_products.js";

var searchInput = document.getElementById("searchInput");
var searchResults = document.getElementById("searchResults");

searchInput.addEventListener("input", function () {
  // Make an AJAX request
  var xhr = new XMLHttpRequest();

  // Get the search query from the input field
  var searchQuery = searchInput.value;

  if (searchQuery.length === 0) {
    searchResults.innerHTML = "";
    return;
  }

  xhr.open(
    "GET",
    "./get-products-in-xml.php?search=" + encodeURIComponent(searchQuery),
    true
  );

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var xmlDoc = xhr.responseXML;
      var products = xmlDoc.getElementsByTagName("product");
      displayResults(products);
    }
  };

  xhr.send();
});

function displayResults(products) {
  // Convert HTMLCollection to an array
  var productsArray = Array.from(products);

  if (productsArray.length === 0) {
    searchResults.innerHTML = "<p>No matching products</p>";
    return;
  }

  var resultsHtml = productsArray
    .map(
      (product) =>
        `<a class="result-item">${
          product.getElementsByTagName("productName")[0].textContent
        }</a>`
    )
    .join("");
  searchResults.innerHTML = resultsHtml;

  // Add click event to result items
  var resultItems = document.querySelectorAll(".result-item");
  resultItems.forEach((item) => {
    item.addEventListener("click", function () {
      // Set the selected product as the input value
      searchInput.value = item.textContent;

      // Clear the results
      searchResults.innerHTML = "";

      // Trigger the form submission
      searchProducts();
    });
  });
}
