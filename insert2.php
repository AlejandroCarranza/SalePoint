<?php
$idCategory = $_POST['idCategory'];
$name = $_POST['name'];
$unit = $_POST['unit'];
$barcode = $_POST['barcode'];
$stock = $_POST['stock'];
$price = $_POST['price'];

$con=mysqli_connect("localhost","root","root","sale_point");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	$insert = mysqli_query($con, "INSERT INTO products (id_prod_cat, name, unit, barcode, stock, price)
        						VALUES ('$idCategory', '$name', '$unit', '$barcode', '$stock', '$price') ")
        
        or die(mysql_error());
        if ($insert){
        echo "1";
        }else{
        echo "0";
        }
mysqli_close($con);
?>
