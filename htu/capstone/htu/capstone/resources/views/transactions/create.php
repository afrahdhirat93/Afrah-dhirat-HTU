<h1>Create Transactions</h1>
<input type="hidden" name="id" value="<?= $data->transaction->id ?>">
<input type="hidden" name="user_id" value="<?= $data->user->id ?>">

<form action="/transactions/store" method="POST" class="w-50">


<input type="hidden" name="product_id" value="<?= $data->product->id ?>">
<div class="mb-3">
    
        <label for="tag-name" class="form-label">transactions Name</label>
        <input type="text" class="form-control" id="tag-name" name="id">
    </div>
    <div class="mb-3">
        <label for="tag-name" class="form-label">transactions Name</label>
        <input type="text" class="form-control" id="tag-name" name="id">
    </div>
    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>


