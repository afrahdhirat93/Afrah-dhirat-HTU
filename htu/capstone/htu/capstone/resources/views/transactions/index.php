
<h1 class="d-flex justify-content-around mb-5">Transactions List (<?= $data->transactions_count ?>)</h1>

<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Transaction Id  </th>
                <th scope="col">Product Id </th>
                <th scope="col">Quantity </th>
                <th scope="col">Total </th>
                <th scope="col">Created at  </th>
                <th scope="col">Updated at  </th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->transactions as $transaction) : ?>
                <tr>
                    <td><?= $transaction->id ?></td>
                    <td><?= $transaction->product_id ?></td>
                    <td><?= $transaction->quantity ?></td>
                    <td><?= $transaction->total ?></td>
                    <td><?= $transaction->created_at ?></td>
                    <td><?= $transaction->updated_at ?></td>


                    <td><a href="./transaction?id=<?= $transaction->id ?>" class="btn btn-primary">More Info</a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>