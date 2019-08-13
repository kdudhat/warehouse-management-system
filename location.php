<?php 
session_start();
if(!(isset($_SESSION["username"]) && ($_SESSION["password"])))
{
     
      header("Location: http://localhost/warehouse/login.php");
}
include('connection.php');
include('header.php'); 
    
if(isset($_POST['submit'])) {
           
        $location_type = $_POST['location_type'];
        $identity = $_POST['identity'];
        $sql = "INSERT INTO location (location_type,identity)VALUES('$location_type','$identity')";
        $retval = mysqli_query($conn,$sql);
        if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
        }
?>
<!-- Basic Form Start -->
<div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>ADD LOCATION</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                <form action="http://localhost/warehouse/location.php" method="post">
                                                    <div class="form-group-inner">
                                                        <label>Location Type</label>
                                                        <select class="form-control" name="location_type" >
                                                                    <option value="none" selected="" disabled="">Select Requrements</option>
                                                                    <option>Cold</option>
                                                                    <option>Regular</option>
                                                                    
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Identity</label>
                                                        <input type="text" class="form-control" placeholder="Enter Identity" name="identity" />
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit" name="submit">Submit</button>
                                                    </div>
                                                </form>
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
        <!-- Basic Form End-->
<?php include('footer.php'); ?>