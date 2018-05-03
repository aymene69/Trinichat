<?php 
session_start(); //Nécessaire pour récupérer les cookies
?>
<html>
<head>
	<title>Trinichat !</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  <!-- On importe jQuery -->
<script type="text/javascript"> // On rafraichis le messages.php chaque seconde
    function refresh_div() {
        jQuery.ajax({
            url:'messages.php',
            type:'POST',
            success:function(content) {
                jQuery(".content").html(content);
            }
        });
    }

    t = setInterval(refresh_div,1000);
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"> <!-- On importe les styles -->
<link rel="stylesheet" type="text/css" href="css/bg.css">
</head>
<body>
    <div class="okk">
        <div class="header">
	   <?php include("form.php"); ?> <!-- On affiche le form.php au dessus du messages.php -->
	   </div>	
	   <div class="content">
	   <?php include("messages.php"); ?>
	   </div>
    </div>
</body>
</html>