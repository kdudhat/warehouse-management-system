<?php
session_start();
if(!(isset($_SESSION["username"]) && ($_SESSION["password"])))
{
     
      header("Location: http://localhost/warehouse/login.php");
}
 include('header.php');

include('connection.php'); 
    $customer_id=$_GET['id'];
    //alert();
  // $sql="SELECT customer_details.*, item_details.* FROM customer_details INNER JOIN  
    //        item_details ON  customer_details.id = item_details.cu_id and customer_details.id=$customer_id";
    $sql="SELECT * FROM customer_details where id=$customer_id";       
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    
    if (isset($_POST['deliver'])) {
        //echo "kisha";
        //exit();
        $batch_id=  $_POST['batch_id'];
        $requirement =   $_POST['requirement'];
        $location = $_POST['location'];

       $sql3 =  "UPDATE item_details SET status='Deliver' WHERE id=$batch_id"; 
       mysqli_query($conn,$sql3);
        $sql4 =  "UPDATE location SET status=0 WHERE location_type='$requirement'and identity=$location";
        mysqli_query($conn,$sql4);
    }
  // echo count($row);
            //xexit();
    
   // $result=mysqli_query($conn,$sql);
?>

<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <center><h4>Customer Details</h4></center>
                            </div>
                            <div class="profile-details-hr">
                                
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Organization Name</b><br /><?=$row['organiztion_name'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Address</b><br /> <?=$row['address'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Name</b><br /><?=$row['name'];?> </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Phone No.</b><br /> <?=$row['phone_no'];?></p>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Panding Batch</a></li>
                                <li><a href="#reviews">Delivered Batch</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                    <?php
                                                        $sql1="SELECT * FROM item_details where cu_id=$customer_id and status='Pending'";
                                                        if($result=mysqli_query($conn,$sql1)) {
                                                            while ($row = mysqli_fetch_object($result)) {
                                                        ?>
                                                        <div class="chat-message">
                                                       
														<div class="message">
                                                            <span class="message-author"> Batch No. <?=$row->batch_no;?></span></br>
                                                            <span class="message-date"> <?=$row->entry_date;?> - <?=$row->delivery_date;?> </span>
                                                            <div class="course-des">

                                                            <p>
                                                                <span><i class="fa fa-clock"></i></span> <b>Batch Name: </b> <?=$row->batch_unique_name;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <span><i class="fa fa-clock"></i></span> <b>Storage Type: </b> <?=$row->requirement;?>
                                                            </p>
                                                            <p>
                                                                <span><i class="fa fa-clock"></i></span> <b>Number of Item: </b><?=$row->number_of_item;?>&nbsp;&nbsp;&nbsp;
                                                                <span><i class="fa fa-clock"></i></span> <b>Storage Location: </b><?=$row->batch_location;?>
                                                            </p>

                                                            
                                                            <p><span><i class="fa fa-clock"></i></span> <b>Batch Rant: </b><?=$row->batch_rant;?> </p>
                                                            </div>
                                                            <div>
                                                                <form method="POST" action="http://localhost/warehouse/view.php?id=<?=$customer_id?>">
                                                                    <input type="hidden" name="location" value="<?=$row->batch_location ?>">
                                                                    <input type="hidden" name="requirement" value="<?=$row->requirement?>">
                                                                    <input type="hidden" name="batch_id" value="<?=$row->id?>">
                                                                    <button type="submit" class="btn btn-custon-rounded-three btn-success" name="deliver"><i class="fa fa-check edu-checked-pro"></i> Deliver </button>
                                                                    
                                                            </form>
                                                            </div>
                                                        </div>
                                                   
                                                        </div>
                                                         <?php }
                                                        }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                    <?php
                                                     $sql5="SELECT * FROM item_details where cu_id=$customer_id and status='Deliver'";
                                                        if($result1=mysqli_query($conn,$sql5)) {
                                                            while ($row1 = mysqli_fetch_object($result1)) {
                                                        ?>
                                                    <div class="chat-message">
                                                       
                                                        <div class="message">
                                                            <span class="message-author"> Batch No. <?=$row1->batch_no;?></span></br>
                                                            <span class="message-date"> <?=$row1->entry_date;?> - <?=$row1->delivery_date;?> </span>
                                                            <div class="course-des">

                                                            <p>
                                                                <span><i class="fa fa-clock"></i></span> <b>Batch Name: </b> <?=$row1->batch_unique_name;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <span><i class="fa fa-clock"></i></span> <b>Storage Type: </b> <?=$row1->requirement;?>
                                                            </p>
                                                            <p>
                                                                <span><i class="fa fa-clock"></i></span> <b>Number of Item: </b><?=$row1->number_of_item;?>&nbsp;&nbsp;&nbsp;
                                                                <span><i class="fa fa-clock"></i></span> <b>Storage Location: </b><?=$row1->batch_location;?>
                                                            </p>

                                                            
                                                            <p><span><i class="fa fa-clock"></i></span> <b>Batch Rant: </b><?=$row1->batch_rant;?> </p>
                                                            </div>
                                                            <div>
                                                                <a    href="http://localhost/warehouse/invoice.php?batch_id=<?=$row1->id?>"  class="btn btn-custon-rounded-three btn-warning" target="_blank">Invoice</a>
                                                            </div>
                                                        </div>
                                                   
                                                        </div>
                                                    <?php
                                                    }
                                                    }
                                                     ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php include('footer.php'); ?>