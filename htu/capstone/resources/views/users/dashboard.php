        
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              </div>
              <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_capstone";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = 'SELECT * from products';

if ($result = mysqli_query($conn, $sql)) {
    

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );
        
             } ?>
<tbody>
<div class="text-center pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Products</p>
                 
                <h4 class="mb-0"> <?php         printf( $rowcount);
?></h4>
              </div>

</tbody>

            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">    </span></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              
              <div class="text-end pt-1">
              <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_capstone";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = 'SELECT * from users';

if ($result = mysqli_query($conn, $sql)) {
    

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );
        
             } ?>
                <p class="text-center mb-0 text-capitalize">Total users</p>
                <h4 class="text-center mb-0">  
                <?php         printf( $rowcount);
?>
                </h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              </div>
              <div class="text-center pt-1">
              <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_capstone";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = 'SELECT * from transactions';

if ($result = mysqli_query($conn, $sql)) {
    

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );
        
             } ?>
                <p class="text-center  mb-0 text-capitalize">Total Transactions</p>
                <h4 class="mb-0 text-center">                <?php         printf( $rowcount);
?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span> </p>
            </div>
          </div>
        </div>
       

 <div class="row mt-5">
 <span class="border border-light">

<h2 class=" .offcanvas-start   mb-2 mt-10">Products max five expensive cost </h2>

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
                    <td><?= $product->price ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    </span>
</div>
</div>
       
     
   
        
 
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>