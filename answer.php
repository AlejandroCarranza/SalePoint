<doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sales</title>
		<script src="js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="js/AJAX.js"></script>
	</head>

	<body>
		<h1>Answer</h1>

<?php
$search="0";
$search=$_POST['idSale'];
$id='0';
// Conectando, seleccionando la base de datos
$con=mysqli_connect("localhost","root","root","sale_point");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result=mysqli_query($con,"SELECT * FROM sales join clients on sales.id_client=clients.id_client WHERE id_sales LIKE '".$search."' ");
if($result === FALSE) {
    die(mysqli_error()); // TODO: better error handling
}

while($row = mysqli_fetch_array($result))

{
    ?>
    <br><label>Detail:</label> <input type="text" size="15" readonly="readonly" value="<?php echo $row['id_sale_detail']; ?>" />         
    <br><label>Client:</label> <input type="text" size="10" readonly="readonly" value="<?php echo $row['id_client']; ?>" />
    <br><label>Client Name:</label> <input type="text" size="20" readonly="readonly" value="<?php echo $row['name'] ." ". $row['last_name']; ?>" />             
	<br><label>Total:</label> <input type="text" size="10" readonly="readonly" value="<?php echo $row['total']; ?>" />         
	<br><label>Date:</label> <input type="text" size="10" readonly="readonly" value="<?php echo $row['date']; ?>" />         
	
<?php
}
mysqli_free_result($result);
mysqli_close($con);
?>
    </div>
	</body>

</html>
