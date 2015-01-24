<?php
$idClient = $_POST['idClient'];
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$rfc = $_POST['rfc'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];

$con=mysqli_connect("localhost","root","root","sale_point");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
        $update = mysqli_query($con, "UPDATE clients SET name = '$name', last_name = '$lastName', 
             rfc = '$rfc', address = '$address', telephone = '$telephone' WHERE id_client='$idClient' ")
        
        or die(mysql_error());
        if ($update){
        echo "1";
        }else{
        echo "0";
        }
mysqli_close($con);
?>