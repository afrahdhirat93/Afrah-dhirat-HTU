<!-- Area Chart Example-->
<div class="card mb-3">
<div class="card-header">
<i class="fa fa-area-chart"></i> Sales Chart</div>
<div class="card-body">
<canvas id="myAreaChart" width="100%" height="30"></canvas>
</div>
<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
<!-- Example DataTables Card-->
<div class="card mb-3">
<div class="card-header">
<i class="fa fa-table"></i> Data Table Example</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>ID</th>
<th>Name of Product</th>
<th>Price of Product</th>
<th>Product Catrogy</th>
<th>Product Details</th>
</tr>
</thead>
<tfoot>
<tr>
<th>ID</th>
<th>Name of Product</th>
<th>Price of Product</th>
<th>Product Catrogy</th>
<th>Product Details</th>
</tr>
</tfoot>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_capstone";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = 'SELECT * from products';
if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$count=1;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
<tbody>
<tr>
<th>
<?php echo $row['id']; ?>
</th>
<td>
<?php echo $row['product_name']; ?>
</td>
<td>
<?php echo $row['cost_price']; ?>
</td>
<td>
<?php echo $row['selling_price']; ?>
</td>
<td>
<?php echo $row['product_details']; ?>
</td>
</tr>
</tbody>
<?php
$count++;
}
} else {
echo '0 results';
}
?>
</table>
</div>
</div>


</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>