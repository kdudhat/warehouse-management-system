


<?php 
session_start();
if(!(isset($_SESSION["username"]) && ($_SESSION["password"])))
{
     
      header("Location: http://localhost/warehouse/login.php");
}
include('header.php');
include('connection.php'); 

  
?>
<!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="Organization">Organization</th>
                                                <th data-field="Name" data-editable="true">Name</th>
                                                <th data-field="Phone" data-editable="true">Phone</th>
                                                <th data-field="Address" data-editable="true">Address</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql="SELECT * FROM customer_details";
                                            
                                            ///print_r($result);
                                            //exit();
                                            //echo mysql_num_rows($result);
                                            if($result=mysqli_query($conn,$sql)) {
                                            while ($row = mysqli_fetch_object($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row->organiztion_name; ?></td> 
                                                <td><?php echo $row->name; ?></td> 
                                                <td><?php echo $row->phone_no; ?></td>
                                                <td><?php echo $row->address; ?></td> 
                                                <td>
                                                	<a href="http://localhost/warehouse/add_customer.php?id=<?=$row->id?>" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px" ></i></a>
 		                                           <a href="http://localhost/warehouse/view.php?id=<?=$row->id?>" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true" style="font-size:20px"></i></a>


                                                </td>
                                            </tr>
                                             <?php
                                            }
                                            }
                                            else
                                            {
                                                echo "error";
                                            }
                                            ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
<?php include('footer.php'); ?>