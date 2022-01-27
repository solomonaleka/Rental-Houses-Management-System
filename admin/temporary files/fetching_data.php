echo "<table border='5' >";

echo "<tr>";
echo  "<th> Booking ID </th>";
echo  "<th> First Name </th>";
echo  "<th> Second Name </th>";
echo  "<th> Hotel Name </th>";
echo  "<th> Room Type </th>";
echo  "<th> Fixed Charge </th>";
echo  "<th> Time Of Booking </th>";
echo  "<th> Check In Date </th>";
echo  "<th> Check Out Date </th>";
echo  "<th> Room Number </th>";
echo  "<th> Operation 1 </th>";
echo  "<th> Operation 2 </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['booking_id']."</td>";
echo "<td>".$row['first_name']."</td>";
echo "<td>".$row['second_name']."</td>";
echo "<td>".$row['hotel_name']."</td>";
echo "<td>".$row['room_type']."</td>";
echo "<td>".$row['fixed_charge']."</td>";
echo "<td>".$row['time_of_booking']."</td>";
echo "<td>".$row['check_in_date']."</td>";
echo "<td>".$row['check_out_date']."</td>";
echo "<td>".$row['room_number']."</td>";
echo '<td><a href="user/deleteUserBookingData.php?booking_id='.$row['booking_id'].'"> <b> <img src="images/deleteIcon.png" height="30" width="30" alt="deleteIcon" style="margin-left:20px;" onclick="isDelete()"/> </b> </a> </td>';
echo '<td><a href="user/editUserBookingData.php?booking_id='.$row['booking_id'].'"> <b> <img src="images/editIcon.png" height="30" width="30" alt="editIcon" style="margin-left:20px;" /> </b> </a> </td>';
echo "</tr>";
}
echo "</table>";