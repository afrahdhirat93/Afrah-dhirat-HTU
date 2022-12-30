
<?php

use Core\Helpers\Helper;
?>
<body class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1>HTU Point Of Sale</h1>
        <div>
            <strong>Total Sales: </strong>
            <span id="total-sales">0</span>
        </div>
    </div>

    <hr>
    <form  id="user-contorllers" class="row my-5">
    <?php  $data_user->users_transaction = $user ?>

        <input type="hidden" id="user_id" name="user_id" value="<?=$user_id->id?>">
        <div class="input-group col align-items-center mb-0">
            <span class="input-group-text">products</span>
            <select id="product"  class="form-select"  >
            <option selected > choose the products </option>

                <?php foreach ($data->products as $product) : ?>
                <option value="<?= $product->id ?>">
                <?= $product->product_name ?></option>
                <?php endforeach; ?>
               
            </select>

            
        </div>
        <div class="input-group col align-items-center mb-0">
            <span class="input-group-text">Quantity</span>
            <input  id="quantity" name="quantity" type="number"  class="form-control" min="0">
        </div>
     
        <div class="col d-flex justify-content-center align-items-center" min="0">
            <button class="btn btn-success"  name="add" id="add" >Add</button>
            <i class="fa-solid fa-plus"></i>

        </div>
    </form>



    <div id="items-container" class="d-flex flex-column justify-content-center align-items-center">
   
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Display Name</th>
                <th scope="col">Action</th>
                <th scope="col">Display Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->transactions as $transaction) : ?>
                <tr>
                    <td><?= $transaction->name ?></td>

                    <td><?= $transaction->products_name ?></td>
                    <td><?= $transaction->quantity ?></td>
                    <td><?= $transaction->price ?></td>
                    <td><?= $transaction->total ?></td>
<td>
        <a href="/transactions/edit?id=<?= $transaction->id ?>" class="btn btn-warning">Edit</a>
  
  
        <a href="/transactions/delete?id=<?= $transaction->id ?>" class="btn btn-danger">Delete</a>
   
            </td>
</div>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
        
    </div>


    
