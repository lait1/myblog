<!DOCTYPE html>
<html lang="ru">
<head>
	<link href="<?php echo HomeUrl; ?>css/style.css" type="text/css" rel="stylesheet" >
<!--	<link href="--><?php //echo HomeUrl; ?><!--css/bootstrap.min.css" type="text/css" rel="stylesheet">-->
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="<?php echo HomeUrl; ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo HomeUrl; ?>js/bootstrap.min.js"></script>
	<script src="<?php echo HomeUrl; ?>js/script.js"></script>


</head>
<body>
	<?php 
		include 'app/views/'.$content_view;
	      ?>

</body>
</html>