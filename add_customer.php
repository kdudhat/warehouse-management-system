<?php 
session_start();
if(!(isset($_SESSION["username"]) && ($_SESSION["password"])))
{
     
      header("Location: http://localhost/warehouse/login.php");
}

require_once('header.php');
//    include('');
include('connection.php');
     
  //  if(isset($_POST["requirement"])){
    // Capture selected country
       // echo "kishan";
     // echo  $requirement = $_POST["requirement"];
      //exit();
    //}
//$data = "SELECT * FROM location WHERE requirement=$requirement";
  //  $result = mysqli_query($conn, $data);
   //echo  $result;    


        //edit data
        
        //$row=mysqli_fetch_assoc($result5);

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $phone_no = $_POST['phone_no'];
            $organiztion_name = $_POST['organiztion_name'];
            $address = $_POST['address'];

            
           //
            if(isset($_GET['id']))
            {
                $last_id = $_GET['id'];
                
              //  $row=mysqli_fetch_assoc($result5);
                $sql1 = "UPDATE customer_details SET name= '$name', phone_no = '$phone_no', organiztion_name = '$organiztion_name', address = '$address'   WHERE id='$last_id'";
                mysqli_query($conn,$sql1);
                //exit();

            }
            else
            {
                $sql = "INSERT INTO customer_details (name, phone_no, organiztion_name, address) VALUES ('$name' , '$phone_no' , '$organiztion_name' , '$address')";
         // exit();
                $retval = mysqli_query($conn,$sql);
                $last_id = mysqli_insert_id($conn);
            }

            $cu_id = $last_id;
            $batch_no = chr(rand(65,90)).mt_rand('10000','99999');
            $batch_unique_name = $_POST['batch_unique_name'];
            $number_of_item = $_POST['number_of_item'];
            $requirement = $_POST['requirement'];
            $entry_date = $_POST['entry_date'];
            $delivery_date = $_POST['delivery_date'];
            $batch_rant = $_POST['batch_rant'];
            $batch_location = $_POST['batch_location'];
            
            $sql = "UPDATE location SET status='1' WHERE identity='$batch_location' and location_type='$requirement'";
            mysqli_query($conn,$sql);
            //exit();
            $sql1 = "INSERT INTO item_details (cu_id,batch_no, batch_unique_name, number_of_item, requirement,entry_date,delivery_date,batch_rant,batch_location) VALUES ('$cu_id' , '$batch_no' , '$batch_unique_name' , '$number_of_item','$requirement','$entry_date','$delivery_date','$batch_rant','$batch_location')";
            //exit();
            $retval1 = mysqli_query($conn,$sql1);
            if(! $retval1 ) {
               die('Could not enter data: ' . mysqli_error($conn));
            
            }
            echo '<script>window.location.href = "http://localhost/warehouse/customer_list.php";</script>';
            

            # code...
        }
        



 ?>
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <form action="" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" name="regForm" method="post">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description" >Customer Information</a></li>
                                <li><a href="#reviews"> Item Information</a></li>
                                <li><a href="#INFORMATION">Delivery Information</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">

                                <div class="product-tab-list tab-pane fade active in " id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    
                                                        <div class="row">
                                                            <?php 
                                                                if(isset($_GET['id']))
                                                                {
                                                                    $last_id = $_GET['id'];
                                                                    $sql5=" SELECT * FROM customer_details where id=$last_id";       
                                                                    $result5=mysqli_query($conn,$sql5);
                                                                    $row=mysqli_fetch_assoc($result5);
                                                            ?>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="name" type="text" class="form-control" placeholder="Full Name" id="name" onblur="requiredField(this)" value="<?=$row['name']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="organiztion_name" type="text" class="form-control" placeholder="Organization Name" onblur="requiredField(this)" value="<?=$row['organiztion_name']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="address" type="text" class="form-control " placeholder="Address" value="<?=$row['address']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="phone_no" type="text" class="form-control" placeholder="Mobile no." data-mask="(999) 999-9999" value="<?=$row['phone_no']?>" >
                                                                </div>
                                                                
                                                            </div>    
                                                            <?php 
                                                                }else
                                                                {

                                                            ?>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="name" type="text" class="form-control" placeholder="Full Name" id="name" onblur="requiredField(this)">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="organiztion_name" type="text" class="form-control" placeholder="Organization Name" onblur="requiredField(this)" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="address" type="text" class="form-control " placeholder="Address">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="phone_no" type="text" class="form-control" placeholder="Mobile no." data-mask="(999) 999-9999">
                                                                </div>
                                                                
                                                            </div>
                                                            <?php
                                                                }
                                                            ?>
                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade tab" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="devit-card-custom">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Batch Unique Name" name="batch_unique_name" >
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Number of Items" name="number_of_item" >
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control" name="requirement" id="requirement">
                                                                    <option  selected hidden >Select Requirement</option>
                                                                    <option value="Cold">Cold</option>
                                                                    <option value="Regular">Regular</option>
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group" >
                                                                <select class="form-control" name="batch_location" id="batch_location">
                                                                            <option selected hidden>Select Location</option>
                                                                </select>
                                                            </div>
                                                            
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade tab" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="devit-card-custom">
															<div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                                                    <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" class="form-control" name="entry_date" value="<?php echo date('m/d/Y');?>" id="entry_date" />
                                                                            <span class="input-group-addon">To</span>
                                                                            <input type="text" class="form-control" name="delivery_date" placeholder="Item Delivery Date" id="delivery_date" onChange="total_rant()"  />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control" placeholder="Total Rent for Batch" name="batch_rant" id="batch_rant" >
                                                                    </div>
                                                                    
                                                           </div>

															<button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
                
            </form>
            </div>
 </div>

<?php include('footer.php'); ?>