<h1>Edit Post</h1>

<form action="/transactions/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->transaction->id ?>">
    <div class="mb-3">
        <label for="tag-name" class="form-label">transaction  Name</label>
        <input type="text" class="form-control" id="tag-name" name="name" value="<?= $data->transaction->name ?>">
    </div>
    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>