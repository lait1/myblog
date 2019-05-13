<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.05.2019
 * Time: 10:13
 */

//var_dump($data);

foreach ($data['category'] as $cat){
    echo '<a href="'.HomeUrl.'category/'.$cat['cat_id'].'">'.$cat['CatName'].'</a><br>';
}
echo 'Автор:'.$data['user_name'].'<br>';
echo 'Заголовок:'.$data['title'].'<br>';
echo 'Контент:'.$data['content'].'<br>';
echo 'Дата:'.$data['date_public'].'<br>';
echo '<br>';

?>
