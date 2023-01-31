<h1>Edit Product</h1>

<form action="/products/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->product->id ?>">

    <div class="mb-3">
        <label for="post-title" class="form-label">product name</label>
        <input type="text" class="form-control" id="post-title" name="product_name" value="<?= $data->product->product_name ?>">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label"> price </label>
        <input type="text" class="form-control" id="post-title" name="price" value="<?= $data->product->price ?>">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">cost  </label>
        <input type="text" class="form-control" id="post-title" name="cost" value="<?= $data->product->cost ?>">
    </div>

    <div class="mb-3">
        <label for="post-title" class="form-label">quantity </label>
        <input type="text" class="form-control" id="post-title" name="quantity" value="<?= $data->product->quantity ?>">
    </div>
    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>