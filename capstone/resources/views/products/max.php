
<h1 class="d-flex justify-content-around mb-5">products Max Five expensive cost </h1>

<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">product Name</th>
                <th scope="col">product price</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($data->products as $product) : ?>
                <tr>
                    <td><?= $product->product_name ?></td>
                    <td><?= $product->cost_price ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>