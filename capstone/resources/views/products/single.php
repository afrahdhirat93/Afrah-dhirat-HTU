<?php

use Core\Helpers\Helper;
?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['post:read', 'post:update'])) : ?>
        <a href="/products/edit?id=<?= $data->product->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['post:read', 'post:delete'])) :
    ?>
        <a href="/products/delete?id=<?= $data->product->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
    <a href="/products" class="btn btn-success">Back</a>

</div>


<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->product->product_name ?>
    </h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">product name</th>
      <th scope="col">selling price</th>
      <th scope="col">cost_price</th>
      <th scope="col">Quantity</th>
      <th scope="col">created at</th>
      <th scope="col">updated at</th>
      <th scope="col">stock
available quantity</th>

    </tr>
  </thead>
  <tbody>
 
      <th scope="row">  
      <?= $data->product->product_name ?>
      </th>
      <td>        <?= $data->product->selling_price ?>
</td>
      <td>        <?= $data->product->cost_price ?>
</td>
      <td>        <?= $data->product->Quantity ?>
</td>
<td>        <?= $data->product->created_at ?>
</td>
<td>        <?= $data->product->updated_at ?>
</td>
<td>
<?php
// get the product and stock level
if($data->product->Quantity > 0) {
    echo 'Available ' ;
} else {
    echo 'Out of stock';
} ?>
</td>
 
     

    </tr>
    
  </tbody>
</table>

</div>