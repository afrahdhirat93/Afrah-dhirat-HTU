
  <div class="d-flex justify-content-center mb-5">
        <h1>HTU POS System</h1>
        
    </div>
    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>

<div class='alert alert-danger' role='alert'>
    <?= $_SESSION['error'] ?>
</div>
<?php endif;
unset($_SESSION['error']);
?>

 <form method="POST" action="/sales/store">
    <input type="hidden" value=<?=$data->user_id?> name="user_id">
<div class="container d-flex justify-content-center mb-5 gap-3">
<div class="input-group flex-nowrap">
    <span class="input-group-text text-primary" id="addon-wrapping">Items</span>
    <select id="items" class="form-select" aria-label="Default select example" title="ed" palceholder="" name="values">
    <?php foreach ($data->products as $product) :
        if($product->quantity >0):?>
    <option value="<?= $product->product_name.','.$product->price.','.$product->id?>"><?= $product->product_name ?></option>
    <?php endif; endforeach; ?>
    </select>
</div>

<div class="input-group flex-nowrap">
    <span class="input-group-text text-primary" id="addon-wrapping">Quantity</span>
    <input id="quantity" type="number" class="form-control" aria-describedby="addon-wrapping" min="0" name="quantity">
</div>

<input type="hidden" name="total" >


<button id="add-item" class="btn btn-success">Buy</button>
</div>
</form>
   
    <hr>
    <br>
    <div id="dataTableContainer">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">total</th>
                    <th scope="col">created at</th>
                    <th scope="col">delete</th>
                    <th scope="col">update</th>
                </tr>
            </thead>
            <tbody>
      
                <?php foreach($data->all_transactions as $product):?>
                <tr>
                <td ><?= $product->product_id ?></td >
                <td ><?= $product->price ?></td >
                <td ><?= $product->quantity ?></td >
                <td ><?= $product->total ?></td >
                <td ><?= $product->created_at ?></td >   
                <td ><a class="/transactions/delete?id=<?= $product->id ?>">delete</a></td >   
                <td ><a class="/transactions/edit?id=<?= $product->id ?>">update</a></td >   
                 
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>


