<?php
//print_r($data);
//var_dump ($data);

foreach ($data['post'] as $post){
    foreach ($post['category'] as $cat){
        echo '<a href="category/'.$cat['cat_id'].'">'.$cat['CatName'].'</a><br>';
    }
    echo 'Автор:'.$post['user_name'].'<br>';
    echo 'Заголовок:'.$post['title'].'<br>';
    echo 'Контент:'.$post['content'].'<br>';
    echo 'Дата:'.$post['date_public'].'<br>';
    echo '<a href="post/'.$post['id'].'">Подробнее</a>';
    echo '<br><br>';
}
?>
<a href="add">Добавить пост</a>
<a href="add/category">Создание категории</a>

