<doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Search ID</title>
		<link rel="stylesheet" type="text/css" href="css/Botones.css" />

		<script type="text/javascript">
		$(document).ready(function() {
   		$('#search').click(function(){
     	$.post(
	    "answer.php", $("#cdr").serialize(),function(a){
                $('#content').html(a);
	    });
   });
});
</script>

	</head>
	<body>
		<h2>Sales search</h2>
		<form name="form1" method="post" id="cdr" >	
			<Label>Put the ID of the sale</Label>
			<input size="12"  id="idSale" name="idSale" type="text" maxlength="12">
			<a id="search" name="search" class="buttons">Search</a>
		</form>

	</body>
</html>
