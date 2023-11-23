<div class="content-container">
    <h1 class="font-weight-bold">Products</h1>
    <div class="search-container">
        <form action="index.php?page=products" method="GET">
            <input type="text" name="search" placeholder="Search products...">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <?php foreach ($products as $product) : ?>
            <div class="col">
                <div class="card col-lg-4" style="width: 18rem;">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['productName']; ?>">
                    <div class="card-body">
                        <h5 class="card-title card-title-constraint"><?php echo $product['productName']; ?></h5>
                        <div class="card-content">
                            <span class="card-text">$<?php echo $product['price']; ?></span>
                            <span class="card-text">Sales: <?php echo $product['sales']; ?></span>
                        </div>
                        <a href="#" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (empty($products)) : ?>
        <p class="mt-3">No products available.</p>
    <?php endif; ?>
</div>