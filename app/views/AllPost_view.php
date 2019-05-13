<?php
//print_r(HomeUrl);
//var_dump ($data);

foreach ($data['post'] as $post){
    foreach ($post['category'] as $cat){
        echo '<a href="'.HomeUrl.'category/'.$cat['cat_id'].'">'.$cat['CatName'].'</a><br>';
    }
    echo 'Автор:'.$post['user_name'].'<br>';
    echo 'Заголовок:'.$post['title'].'<br>';
    echo 'Контент:'.$post['content'].'<br>';
    echo 'Дата:'.$post['date_public'].'<br>';
    echo '<a href="'.HomeUrl.'post/'.$post['id'].'">Подробнее</a>';
    echo '<br><br>';
}
echo 'Категории:<br>';
foreach ($data['allCategory'] as $cat){

    echo '<a href="'.HomeUrl.'category/'.$cat['id'].'">'.$cat['catName'].'</a><br>';
}
?>
<a href="<?php echo HomeUrl; ?>add">Добавить пост</a>
<a href="<?php echo HomeUrl; ?>add/category">Создание категории</a>

