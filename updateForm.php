<doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Sales</title>

<script type="text/javascript">

function validateForm(){
    if($("#name").val() == ""){
        alert("Name is empty.");
        $("#name").focus(); 
        return false;
    }
    if($("#lastName").val() == ""){
        alert("Last Name is empty");
        $("#lastName").focus();
        return false;       
    }
    if($("#rfc").val() == ""){
        alert("RFC is empty");
        $("#rfc").focus();     
        return false;
        
    }
    if($("#address").val() == ""){
        alert("Address is empty");
        $("#address").focus();     
        return false;
    }
    if($("#telephone").val() == ""){
        alert("Telephone is empty");
        $("#telephone").focus();       
    }

        return true;
}
</script>

<script>
$(document).ready( function() {  
    $('#send').click( function() {   
        if(validateForm()){                           
            $.post("update.php",$('#formdata').serialize(),function(res){
                $('#formCli').fadeOut('slow');   
                if(res == 1){
                    $('#yay').delay(500).fadeIn('slow');
                } else {
                    $('#fail').delay(500).fadeIn('slow');
                }
            });
        }
    });    
});
</script>

	</head>

	<body>
		<h1>Update</h1>

<?php
$search="0";
$search=$_POST['idClient'];
$id='0';

$con=mysqli_connect("localhost","root","root","sale_point");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result=mysqli_query($con,"SELECT * FROM clients WHERE id_client LIKE '".$search."' ");

if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

while($row = mysqli_fetch_array($result))

{
    ?>
    <div id="formCli">
        <form method="POST" id="formdata">
    		<br><label>ID_Client:</label> <input type="text" readonly="readonly" id="idClient" name="idClient" size="6" value="<?php echo $row['id_client']; ?>" />         
    		<br><label>Name:</label> <input type="text" name="name" id="name" size="10" value="<?php echo $row['name']; ?>" />
    		<br><label>Last Name:</label> <input type="text" name="lastName" id="lastName" size="10" value="<?php echo $row['last_name']; ?>" />             
			<br><label>RFC:</label> <input type="text" name="rfc" size="25" id="rfc" value="<?php echo $row['rfc']; ?>" />         
			<br><label>Address:</label> <input type="text" name="address" id="address" size="25"  value="<?php echo $row['address']; ?>" />
			<br><label>Telephone:</label> <input type="text" name="telephone" id="telephone" size="15" value="<?php echo $row['telephone']; ?>" />

			<br><br>
			<a id="send" name="send" class="buttons">Update</a>
		</form>
	</div>

       <div id="yay" style="display:none">
            Update Complete
        </div>
        <div id="fail" style="display:none">
            Error
        </div>           
	
<?php
}
mysqli_close($con);
?>
    </div>
	</body>

</html>
