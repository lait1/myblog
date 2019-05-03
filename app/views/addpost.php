<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.05.2019
 * Time: 20:44
 */
echo $data;
?>

<form method="POST" action="add/create">
    Заголовок <input name="title" type="text" ><br>
Сообщение <input name="content" type="textarea" ><br>

<input name="submit" type="submit" value="Добавить пост">
</form>