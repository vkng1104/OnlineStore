<div class="content-container">
    <h1 class="font-weight-bold">Products</h1>
    <div class="search-container">
        <form id="searchForm">
            <div class="search-btn-container">
                <input type="text" id="searchInput" name="search" placeholder="Search products...">
                <button class="ms-3" type="button" onclick="searchProducts()">Search</button>
            </div>
        </form>
    </div>
    <div id="products-container" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <!-- Products go here -->
    </div>
    <div id="no-products">
        <!-- Message goes here -->
    </div>
</div>

<script src="./scripts/search_products.js"></script>