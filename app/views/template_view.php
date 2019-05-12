<!DOCTYPE html>
<html lang="ru">
<head>
	<link href="http://localhost/myblog/css/style.css" type="text/css" rel="stylesheet" >
	<link href="http://localhost/myblog/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>


</head>
<body>
	<?php 
		include 'app/views/'.$content_view;
	      ?>

</body>
</html>