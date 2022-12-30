<h1>Insert Items </h1>

<form action="/products/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="post-title" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="post-title" name="product_name">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">Product Price </label>
        <input type="text" class="form-control" id="post-title" name="selling_price">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">Product Cat </label>
        <input type="text" class="form-control" id="post-title" name="cost_price">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">Quantity </label>
        <input type="text" class="form-control" id="post-title" name="Quantity">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Your post content.." id="post-content" style="height: 100px" name="product details"></textarea>
        <label for="post-content">Post Content</label>
    </div>
    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>