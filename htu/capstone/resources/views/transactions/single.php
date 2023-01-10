<?php

use Core\Helpers\Helper;
?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
        <a href="/transactions/edit?id=<?= $data->transaction->id ?>" class="btn btn-warning">Edit</a>
    
        <a href="/transactions/delete?id=<?= $data->transaction->id ?>" class="btn btn-danger">Delete</a>
   
    <a href="/transactions" class="btn btn-success">Back</a>

</div>


<div class="my-5">
    <!-- for admins -->
   
    <table class="table">
  <thead>
    <tr>
    <th scope="col">Transaction id</th>

    <th scope="col">Product id</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>

      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      
    </tr>
  </thead>
  <tbody>
 
      
      <td>        <?= $data->transaction->id ?>
</td>
      <td>        <?= $data->transaction->product_id ?>
</td>
      <td>        <?= $data->transaction->quantity ?>
</td>
<td>        <?= $data->transaction->total ?>
</td>
<td>        <?= $data->transaction->created_at ?>
</td>
<td>        <?= $data->transaction->updated_at ?>
</td>

 
     

    </tr>
    
  </tbody>
</table>

</div>