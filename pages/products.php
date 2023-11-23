<div class="content-container">
    <h1 class="font-weight-bold">Products</h1>
    <div class="search-container">
        <form action="index.php?page=products" method="GET">
            <input type="text" name="search" placeholder="Search products...">
            <button type="submit">Search</button>
        </form>
    </div>
    <div id="products-container" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3"></div>
</div>

<script>
    // Make an AJAX request to fetch products in XML format
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse XML response
            var xmlDoc = xhr.responseXML;
            var products = xmlDoc.getElementsByTagName("product");

            // Display products on the screen
            var productsContainer = document.getElementById("products-container");
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var productName = product.getElementsByTagName("productName")[0].textContent;
                var price = product.getElementsByTagName("price")[0].textContent;
                var image = product.getElementsByTagName("image")[0].textContent;
                var sales = product.getElementsByTagName("sales")[0].textContent;

                var cardHtml = '<div class="col">';
                cardHtml += '<div class="card col-lg-4" style="width: 18rem;">';
                cardHtml += '<img src="' + image + '" class="card-img-top" alt="' + productName + '">';
                cardHtml += '<div class="card-body">';
                cardHtml += '<h5 class="card-title card-title-constraint">' + productName + '</h5>';
                cardHtml += '<div class="card-content">';
                cardHtml += '<span class="card-text">$' + price + '</span>';
                cardHtml += '<span class="card-text">Sales: ' + sales + '</span>';
                cardHtml += '</div>';
                cardHtml += '<a href="#" class="btn btn-primary">Buy</a>';
                cardHtml += '</div>';
                cardHtml += '</div>';
                cardHtml += '</div>';

                productsContainer.innerHTML += cardHtml;
            }
        }
    };

    xhr.open("GET", "./get-products-in-xml.php", true);
    xhr.send();
</script>