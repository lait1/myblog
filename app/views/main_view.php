<?php
echo $data;
?>
<h1>Тыгы-дык</h1>
<form class="main_form"  method="post" action="login">
	<label for="login">Имя пользователя</label><br>
	<input type="text"  name="login" id="login" required><Br>

	<label for="password">Пароль</label><br>
	<input type="password"  name="password" id="password" required><Br>

	<input type=submit value=Выбрать name="submit">
</form>
<p><a href="registration">Зарегистрироваться</a></p>