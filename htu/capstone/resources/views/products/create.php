

<h1>Insert Products </h1>

<form action="/products/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="post-title" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="post-title" name="product_name" required>
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label"> Price </label>
        <input type="text" class="form-control" id="post-title" name="price" required>
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">cost </label>
        <input type="text" class="form-control" id="post-title" name="cost" required>
    </div>

    <div class="mb-3">
        <label for="post-title" class="form-label">Quantity </label>
        <input type="text" class="form-control" id="post-title" name="Quantity" required>
    </div>
    
    
    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>