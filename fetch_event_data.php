<?php include('connection.php');
		$today_date = date('d/m/Y');
        $sql = "SELECT e_id FROM event_detail where event_date='$today_date'";
        //echo $sql;
        //exit;
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $e_id=$row['e_id'];
        //$sum = $_GET['sum'];
        $block =	$_GET['block'];
      	$sql1 = "SELECT * FROM event_data where block_no='$block' and status= 'paid'";
        
        if($result=mysqli_query($conn,$sql))
        {
            while ($row = mysqli_fetch_object($result))
            {
              // $sql = "INSERT INTO event_data(e_id,block_no,pay_amount)VALUES('$last_id','$row->no','0')";

             //mysqli_query($conn,$sql); 
            }
       } 

        //exit();

?>