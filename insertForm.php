<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script type="text/javascript">

function validateForm(){
    if($("#idCategory").val() == ""){
        alert("idCategory is empty.");
        $("#idCategory").focus(); 
        return false;
    }
    if($("#name").val() == ""){
        alert("Name is empty");
        $("#name").focus();
        return false;       
    }
    if($("#unit").val() == ""){
        alert("unit is empty");
        $("#unit").focus();     
        return false;
    }
    if($("#barcode").val() == ""){
        alert("Barcode is empty");
        $("#barcode").focus();     
        return false;
    }
    if($("#stock").val() == ""){
        alert("Stock is empty");
        $("#stock").focus();       
    }
        if($("#price").val() == ""){
        alert("Price is empty");
        $("#price").focus();       
    }
        return true;
}
</script>

<script>
$(document).ready( function() {  
    $('#insert').click( function() {   
        if(validateForm()){                           
            $.post("insert2.php",$('#formdata').serialize(),function(res){
                $('#formProd').fadeOut('slow');   
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
	<h1>Insert a product</h1>
	<div id="formProd">
		<form action="post" id="formdata">
			<br><label>Id_Category:</label><input type="text" name="idCategory" id="idCategory">
			<br><label>Name:</label><input type="text" id="name" name="name">
			<br><label>Unit:</label><input type="text" id="unit" name="unit">
			<br><label>Barcode:</label><input type="text" id="barcode" name="barcode">
			<br><label>Stock:</label><input type="text" id="stock" name="stock">
			<br><label>Price:</label><input type="text" id="price" name="price">
			<br><br><a id="insert" name="insert" class="buttons">Insert</a>
		</form>
	</div>
	    <div id="yay" style="display:none">
            Insert Complete
        </div>
        <div id="fail" style="display:none">
            Error
        </div>  
</body>
</html>