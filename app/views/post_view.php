<?php
//print_r($data);
foreach ($data as $post){
    echo 'Автор:'.$post['user_name'].'<br>';
    echo 'Заголовок:'.$post['title'].'<br>';
    echo 'Контент:'.$post['content'].'<br>';
    echo 'Дата:'.$post['date_public'].'<br>';
    echo '<br>';
}
?>
<a href="add">Добавить пост</a>
