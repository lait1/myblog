<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.05.2019
 * Time: 20:44
 */
?>

<form method="POST" action="add/createPost">
    Заголовок <input name="title" type="text" ><br>
    Сообщение <input name="content" type="textarea" ><br>
<?php
    foreach ($data as $cat){
        echo $cat['catName'].'<input type="checkbox" name="category[]" value="'.$cat['id'].'"><br>';
    }
?>
<input name="submit" type="submit" value="Добавить пост">
</form>