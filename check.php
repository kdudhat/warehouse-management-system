

<?php 
include('connection.php');  

if(isset($_GET['id']))
       {
            $type = $_GET['id'];
            
            $data = "SELECT * FROM location where location_type ='$type' and status ='0'" ;
            $result = mysqli_query($conn, $data);
           if(! $result ) {
               die('Could not enter data: ' . mysqli_error($conn));
            
            }
            echo' <option  selected hidden >Select Location</option>';
            if (mysqli_num_rows($result) > 0) {
                                                                            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                                                                                    //        $sel = ($row['location_type']=="Cold") ? 'selected="selected"' : '';
                     

             echo '<option  value="'.$row['identity'].'">'.$row['identity'].'</option>';
                                                                                       

            
            }
            } else {
                                                                            

            }        
            
            //exit();     
            
            
       }  
?>