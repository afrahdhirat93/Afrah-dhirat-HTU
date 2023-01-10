

<body class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1>HTU POS System </h1>
     
    </div>

    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>

<div class='alert alert-danger' role='alert'>
    <?= $_SESSION['error'] ?>
</div>
<?php endif;
unset($_SESSION['error']);
?>

    <hr>
    <form action="/sales/create" method="POST" id="userInputContainer" class="my-5 d-flex d-flex justify-content-between">
 
        <input type="hidden"  name="user_id" value="<?=$data->user_id?>">
        <div class="container d-flex justify-content-center mb-5 gap-4">
        <div class="input-group flex-nowrap">
            <span class="input-group-text ">products</span>
            <select id="item-input"  class="form-select" name="product_id" >
            <option selected > choose the products </option>

                <?php foreach ($data->products as $product) : ?>
                <option value="<?= $product->id ?>">
                <?= $product->product_name ?></option>
                <?php endforeach; ?>
                </select>
        </div>
              

        <div class="input-group flex-nowrap ">
            <span class="input-group-text">Quantity</span>
            <input  id="quantity" name="quantity" type="number"  class="form-control" min="0" required>
        </div>
        <input type="hidden"  name="price" value="<?=$product->price ?>">

       
        <input type="hidden" name="total">
        <div class="input-group flex-nowrap">
            <button class="btn btn-success" type="submit"  id="add" > Add  
</button>
</div>
</div>
</form>




<div id="items-container" class="d-flex flex-column ">
        
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">product</th>
                <th scope="col">price</th>
                <th scope="col">quantity</th>
                <th scope="col">total</th>
                <th scope="col">created at</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->all_transactions as $product) : ?>
                <tr>
                    <td><?= $product->product_id ?></td>
                    <td><?= $product->price ?></td>
                    <td><?= $product->quantity ?></td>
                    <td><?= $product->total ?></td>
                    <td><?= $product->created_at ?></td>

                    <td><a href="/transactions/edit?id=<?= $product->id ?>" class="btn btn-warning">edit</a></td>
                    <td><a href="/transactions/delete?id=<?= $product->id ?>" class="btn btn-danger">delete</a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
        
    </div>
    
