<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sale Point</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="js/AJAX.js"></script>

        <link rel="stylesheet" type="text/css" href="css/buttons.css" />

		<script type="text/javascript">


  		 $(document).ready(function (){

        $.post("home.html","param1=x&param2=y&param3=z", function(home){
                $("#content").html(home);
            });

		$("#btnHome").click(function (){
            $.post("home.html","", function(home){
                $("#content").html(home);
            });
        });

        $("#btnInsert").click(function (){
            $.post("insertForm.php","", function(insert){
                $("#content").html(insert);
            });
        });

        $("#btnConsult").click(function (){
            $.post("idSearch.php","", function(consult){
                $("#content").html(consult);
            });
        });

        $("#btnUpdate").click(function (){
            $.post("idSearch2.php","", function(change){
                $("#content").html(change);
            });
        });
        $("#btnReport").click(function (){
            $.post("makeReport.php","", function(report){
                $("#content").html(report);
            });
        });

    	});
  		  </script>

    </head>
    <body>
 
  		<header>
            <div class="logotipe">
                <img src="images/tux.png" alt="Hello!"/>
            </div>
            <div class="title">
                <h1 class="titles">Sale Point</h1>
            </div>
        </header>
        <nav>
            <ul id="nav" class="menu">
                <li><a href="#" id="btnHome">Home</a></li>
                <li><a href="#" id="btnInsert">Insert</a></li>
                <li><a href="#" id="btnConsult">Consult</a></li>
                <li><a href="#" id="btnUpdate">Update</a></li>
                <li><a href="#" id="btnReport">Create Report</a></li>
            </ul>
        </nav>
        
        <div id="content">
            
        </div>
</body>
</html>