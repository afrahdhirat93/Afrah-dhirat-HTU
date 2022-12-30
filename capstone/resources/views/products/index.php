
<h1 class="d-flex justify-content-around mb-5">products List (<?= $data->products_count ?>)</h1>

<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">product Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->products as $product) : ?>
                <tr>
                    <td><?= $product->product_name ?></td>
                    <td><a href="./product?id=<?= $product->id ?>" class="btn btn-primary">More details</a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>