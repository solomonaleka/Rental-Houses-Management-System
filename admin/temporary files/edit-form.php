<?php
session_start();


include 'base.php';

if(isset($_GET['booking_id'])  && is_numeric($_GET['booking_id'])) {
  $booking_id=$_GET['booking_id'];
  $sql="Select* from booking_details where booking_id='$booking_id'";
  $result=mysqli_query($db_conn,$sql);
  $row=mysqli_fetch_array($result);
}


if(isset($_POST['edit'])){
$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$secondname=mysqli_real_escape_string($db_conn,$_POST['secondname']);
$hotelname=mysqli_real_escape_string($db_conn,$_POST['hotelname']);
$room=mysqli_real_escape_string($db_conn,$_POST['room']);
$amount=mysqli_real_escape_string($db_conn,$_POST['amount']);
$roomNumber=mysqli_real_escape_string($db_conn,$_POST['roomNumber']);




$sql="update booking_details set first_name='$firstname',second_name='$secondname',hotel_name='$hotelname',room_type='$room',fixed_charge='$amount',room_number='$roomNumber',check_in_date='$checkInDate',check_out_date='$checkOutDate' where booking_id='$booking_id'";
$result=mysqli_query($db_conn,$sql);
if($result){ 
  echo "<script> alert('You have successfully created an account!!')</script>"; 
}
else {
  echo "<script> alert('You have successfully created an account!!')</script>";
}
}// closing the main if statement
?>

           <form name="myForm" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return(validate());" novalidate>
           <div id="bookingContainer">
                <div id="form-group">
                <label>First Name:</label>
                    <input name="firstname" type="text" maxlength="25" placeholder="First Name..." value="<?php echo $row[0]; ?>" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Second Name:</label>
                    <input name="secondname" type="text" maxlength="25" placeholder="Second Name..." value="<?php echo $row[5]; ?>" />
                </div> <br /> <br />
                
                <div id="form-group">
                <label>Room Number:</label>
                    <input name="roomNumber" type="number" placeholder="Room Number..." value="<?php echo $row[6]; ?>" />
                </div> <br /> <br />
                <div id="form-group">
                <label>Check In Date:</label>
                    <input name="checkInDate" type="text" id="checkInDate" value="<?php echo $row[8]; ?>"/>
                </div> <br /> <br />
                <div id="form-group">
                <label>Check Out Date:</label>
                    <input name="checkOutDate" type="text" id="checkOutDate" value="<?php echo $row[9]; ?>"/>
                </div> <br /> <br />
                <input type="hidden" name="booking_id" value="<?php echo $row[4]; ?>" />
          <input type="submit" name="edit" value="Update" style="margin-left:170px;">
            </form>                    
  </div> <!--close site_content--> 
  <?php include '../essentials/footer.php' ?>
</div> <!--close main-->
</body>
</html>
