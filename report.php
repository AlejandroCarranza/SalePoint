<doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Sales</title>
		<script src="js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="js/AJAX.js"></script>
		
		<style>
			.column
			{
				background: #8e8e8e;
				color: white;
			}
		</style>
	</head>

	<body>
		<h1>Report</h1>
		<table style="width:600" border="1">
		<tr>
			<td class="column" width="15">Sale</td>
			<td class="column" width="15">Detail</td>
			<td class="column" width="15">Client</td>
			<td class="column" width="15">Total</td>
			<td class="column" width="15">Date</td>
		</tr>

<?php
$Date1= $_POST['date1'];
$Date2= $_POST['date2'];


// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', 'root')
    or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db('sale_point') or die('No se pudo seleccionar la base de datos');

$sql=" SELECT * FROM sales join clients on sales.id_client=clients.id_client WHERE DATE >='$Date1' AND DATE <='$Date2'";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
    ?>
    <tr>
    	<td width="15"> <?php echo $row['id_sales']; ?> </td>   
    	<td width="15"> <?php echo $row['id_sale_detail']; ?> </td>   
    	<td width="15"><?php echo $row['name'] ." ". $row['last_name']; ?> </td>
		<td width="15"><?php echo $row['total']; ?> </td>
		<td width="15"><?php echo $row['date']; ?> </td> 
	</tr>
<?php
}
mysql_free_result($rec);
mysql_close($link);
?>
</table>
    </div>
	</body>

</html>
