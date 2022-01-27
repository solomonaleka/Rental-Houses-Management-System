<!DOCTYPE html>
<html lang="en">
<head>
<title> PHP script fetching houses </title>
</head>
<body>
<?php
//$q = intval($_GET['q']);
$q = $_GET['q'];
include '../includes/config.php';
$sql="SELECT houses.house_type,houses.amount,houses.status,houses.deposit_payment,houses.detail,houses.image,houses.house_number,houses.house_position,building.building_name,destination.destination_name FROM  ((`houses` inner join `building` ON houses.building_id = building.building_id)
inner join `destination` ON houses.destination_id = destination.destination_id  and houses.house_type='".$q."' and houses.status='available')";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table class=\"table table-hover table-responsive\">";
echo "<thead class=\"thead-dark\">";
echo "<tr>";
echo  "<th> House Type </th>";
echo  "<th> Amount </th>";
echo  "<th> House Status </th>";
echo  "<th> Deposit Payment </th>";
echo  "<th> Detail </th>";
echo  "<th> Image </th>";
echo  "<th> Building Name </th>";
echo  "<th> House Location </th>";
echo  "<th> House Number </th>";
echo  "<th> House Position </th>";
echo "</tr>";
echo "</thead>";
while($row=mysqli_fetch_array($result)) {
echo "<tbody>";
echo "<tr>";
echo "<td>".$row['house_type']."</td>";
echo "<td>".$row['amount']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td>".$row['deposit_payment']."</td>";
echo "<td>".$row['detail']."</td>";
echo "<td>".'<img style=\"width:50px;height:80px;\" src="'.$row['image'].'">'."</td>";
echo "<td>".$row['building_name']."</td>";
echo "<td>".$row['destination_name']."</td>";
echo "<td>".$row['house_number']."</td>";
echo "<td>".$row['house_position']."</td>";
echo "</tr>";
echo "</tbody>";
}//closing the while loop
echo "</table>";
} //closing the if statement.
else {
echo "<h4 style=\"color:black;margin-left:50px;\">"."No record matching the query exists in the database!!"."</h4>";
}//closing the else statement.
}//closing the if result set.
mysqli_close($db_conn);
?>
</body>
</html>