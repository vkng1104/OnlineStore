export function searchProducts() {
  // Make an AJAX request to fetch products based on the search query
  var xhr = new XMLHttpRequest();

  // Get the search query from the input field
  var searchQuery = document.getElementById("searchInput").value;
  xhr.open(
    "GET",
    "./get-products-in-xml.php?search=" + encodeURIComponent(searchQuery),
    true
  );

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Parse XML response
      var xmlDoc = xhr.responseXML;
      var products = xmlDoc.getElementsByTagName("product");

      if (products.length === 0) {
        var noProducts = document.getElementById("no-products");
        noProducts.innerHTML = `<p class="mt-3">No products available</p>`;
      } else {
        // Display products on the screen
        var productsContainer = document.getElementById("products-container");
        productsContainer.innerHTML = ""; // Clear previous results

        for (var i = 0; i < products.length; i++) {
          var product = products[i];
          var productName =
            product.getElementsByTagName("productName")[0].textContent;
          var price = product.getElementsByTagName("price")[0].textContent;
          var image = product.getElementsByTagName("image")[0].textContent;
          var sales = product.getElementsByTagName("sales")[0].textContent;

          var cardHtml = '<div class="col">';
          cardHtml += '<div class="card col-lg-4" style="width: 18rem;">';
          cardHtml +=
            '<img src="' +
            image +
            '" class="card-img-top" alt="' +
            productName +
            '">';
          cardHtml += '<div class="card-body">';
          cardHtml +=
            '<h5 class="card-title card-title-varraint">' +
            productName +
            "</h5>";
          cardHtml += '<div class="card-content">';
          cardHtml += '<span class="card-text">$' + price + "</span>";
          cardHtml += '<span class="card-text">Sales: ' + sales + "</span>";
          cardHtml += "</div>";
          cardHtml += '<a href="#" class="btn btn-primary">Buy</a>';
          cardHtml += "</div>";
          cardHtml += "</div>";
          cardHtml += "</div>";

          productsContainer.innerHTML += cardHtml;
        }
      }
    }
  };

  xhr.send();
}

searchProducts();
