<?php  
session_start();
include('connection.php'); 
if(!(isset($_SESSION["username"]) && ($_SESSION["password"])))
{
     
      header("Location: http://localhost/warehouse/login.php");
}
$sql="SELECT * FROM customer_details";       
$result=mysqli_query($conn,$sql);
$customers=mysqli_num_rows($result);
$sql="SELECT * FROM item_details";       
$result=mysqli_query($conn,$sql);
$total_batch=mysqli_num_rows($result);
$sql="SELECT * FROM item_details where status='Pending'";       
$result=mysqli_query($conn,$sql);
$pending_batch=mysqli_num_rows($result);
$sql="SELECT * FROM item_details where status='Deliver'";       
$result=mysqli_query($conn,$sql);
$deliver_batch=mysqli_num_rows($result);

include('header.php');?>

<div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Total Customers</h5>
                            <h2><span class="counter"><?=$customers;?></span> </h2>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Total Batch</h5>
                            <h2><span class="counter"><?=$total_batch;?></span> </h2>
                            
                                
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Total Pending Batch</h5>
                            <h2><span class="counter"><?=$pending_batch;?></span> </h2>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Total Delivered Batch</h5>
                            <h2><span class="counter"><?=$deliver_batch;?></span> </h2>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php include('footer.php'); ?>

