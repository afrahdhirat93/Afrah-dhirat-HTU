
         
         

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 ">
                                <div class="card-body  font-weight-bold">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 ">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                Total Sales</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                                <?php
$servername = "localhost";

$username = "root";
$password = "";
$dbname = "db_capstone";
 
$conn = new mysqli($servername, $username, $password, $dbname);
//sql query
$sql = "SELECT  SUM(total) from transactions";
$result = $conn->query($sql);
//display data on web page

while($row = mysqli_fetch_array($result)){
    echo  $row['SUM(total)'];
    echo "<br>";
}
 
 
//close the connection
 
$conn->close();
?>
                                              
                                          </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body font-weight-bold text-gray-800">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 font-weight-bold text-gray-800">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-black-800"></div>
                                            <?php
$servername = "localhost";

$username = "root";
$password = "";
$dbname = "db_capstone";
 
$conn = new mysqli($servername, $username, $password, $dbname);
//sql query
$sql = "SELECT  * from users";
if ($result = mysqli_query($conn, $sql)) {
 // Return the number of rows in result set
 $rowcount = mysqli_num_rows( $result );
 echo  $rowcount;
 echo "<br>";

        
}
$conn->close();
 ?>  



 
 


                                          </div>
                                        <div class="col-auto">
                                            <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Transactions
                                            </div>

                                           <?php
$servername = "localhost";

$username = "root";
$password = "";
$dbname = "db_capstone";
 
$conn = new mysqli($servername, $username, $password, $dbname);
//sql query
$sql = "SELECT  * from transactions";
if ($result = mysqli_query($conn, $sql)) {
 // Return the number of rows in result set
 $rowcount = mysqli_num_rows( $result );
 echo  $rowcount;
 echo "<br>";

        
}
$conn->close();
 ?>  


  
<div class="row no-gutters align-items-center">

                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Products</div>
                                                
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                       
                                       
                                          <?php
$servername = "localhost";

$username = "root";
$password = "";
$dbname = "db_capstone";
 
$conn = new mysqli($servername, $username, $password, $dbname);
//sql query
$sql = "SELECT  * from products";
if ($result = mysqli_query($conn, $sql)) {
 // Return the number of rows in result set
 $rowcount = mysqli_num_rows( $result );
 echo  $rowcount;
 echo "<br>";

        
}
$conn->close();
 ?>  
   </div>
                                        <div class="col-auto">
                                            <i class="bi bi-basket-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div id="items-container" class="d-flex flex-column ">
                        <div class="row">
                        <h2 class="d-flex justify-content-start mt-5 mb-2 text-succes">Top Five Expensive Products To Buy  </h2>

                        <table class="table table-striped table-bordered">
                        <?php

$servername = "localhost";

$username = "root";
$password = "";
$dbname = "db_capstone";

$conn = new mysqli($servername, $username, $password, $dbname);
//sql qu$result =$conn->query("SELECT MAX(IssueIDNUM) `max` FROM tblIssueList");      
/**$result =$conn->query("SELECT  MAX(price) `max` FROM products");      
if (!$result) die($conn->error);
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
   echo $row['max'];

} 

**/?>
<thead>
<tr>
<th scope="col">Name</th>
<th scope="col">Price</th>

</tr>
</thead>     
<tbody>

<?php         
$result =$conn->query("SELECT * FROM products ORDER BY price DESC LIMIT 5"); 
if (!$result) die($conn->error);

while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{?>
<tr>
<td> <?php echo $row['product_name'];?> </td>

<td> <?php echo $row['price'];?> </td>
</tr>
<?php
} 

?>
    </table>
</div>

</div>