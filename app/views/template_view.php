<!DOCTYPE html>
<html lang="ru">
<head>
	<link href="/css/style.css" type="text/css" rel="stylesheet" >
<!--	<link href="--><?php //echo HomeUrl; ?><!--css/bootstrap.min.css" type="text/css" rel="stylesheet">-->
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="/js/jquery-3.3.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/script.js"></script>


</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="logo">Myblog</div>
        <div class="search"></div>
    </div>

	<?php 
		include 'app/views/'.$content_view;
	      ?>
    <footer>

    </footer>
</div>
</body>
</html>