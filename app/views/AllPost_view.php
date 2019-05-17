<?php
//print_r(HomeUrl);
//var_dump ($data);
?>
<!--<a href="--><?php //echo HomeUrl; ?><!--add">Добавить пост</a>-->
<!--<a href="--><?php //echo HomeUrl; ?><!--add/category">Создание категории</a>-->

<div class="sidebar">
    <div class="sidebar-block auth">
        <?php if (!isset($data['userData'])) { ?>
            <div class="auth__header">Авторизация</div>
            <div class="auth__content">
                <form class="auth_form" method="post" action="/login">
                    <div class="auth__field">
                        <input class="auth__input-text" type="text" name="login" id="login" placeholder="Логин"
                               required></div>
                    <div class="auth__field">
                        <input class="auth__input-text" type="password" name="password" id="password"
                               placeholder="Пароль" required></div>
                    <div class="auth__field">
                        <span class="auth__forget">Забыли пароль?</span></div>
                    <div class="auth__field">
                        <input class="auth__input-submit" type=submit value=Войти name="submit">
                    </div>
                    <div class="auth__field">
                        <a href="/registration" class="auth__reg">Регистрация</a>
                    </div>
                </form>
            </div>
        <?php } else {?>
           <div class="auth__header">Добро пожаловать,
               <? echo $data['userData']['user_name'] ?>
           </div>
            <div class="auth__content">
                <div class="auth__field">
                    <a href="/add" class="auth__reg">Добавить пост</a>
                </div>
            </div>
        <?php } ?>
    </div>


    <div class="sidebar-block category">
        <div class="category__header">
            <h4>Категории:</h4>
        </div>
        <div class="category__content">
            <?php
            foreach ($data['allCategory'] as $cat) {
                echo '<div class="category__item">';
                echo '<a href="/category/' . $cat['id'] . '" class="category__link" >' . $cat['catName'] . '</a></div>';
            } ?>

        </div>
    </div>

</div>
    <div class="main">

        <div class="post-feed__container">
            <h1 class="post-feed__title">
                <?php
                if (isset($data['catTitle'])) {
                    echo $data['catTitle'];
                } else {
                    echo 'Welcome';
                } ?>
            </h1>
            <?php foreach ($data['post'] as $post) { ?>
                <div class="post">

                    <div class="post__meta">
                        <div class="post__autor">
                            <a href="#" class="post__user-info">
                                <img src="" alt="" class="user-info__pic">
                                <span class="user-info__nickname"><?php echo $post['user_name'] ?></span>
                            </a>
                        </div>
                        <span class="post__time"><?php echo $post['date_public'] ?></span>
                    </div>
                    <h2 class="post__title">
                        <a href="/post/<?php echo $post['id'] ?>"
                           class="post__title_link"><?php echo $post['title'] ?></a>
                    </h2>
                    <ul class="post__category">
                        <?php foreach ($post['category'] as $cat) {
                            echo '<li class="post__category-item">';
                            echo '<a href="/category/' . $cat['cat_id'] . '" class="post__category-link">' . $cat['CatName'] . '</a></li>';
                        } ?>

                    </ul>
                    <div class="post__content">
                        <?php echo $post['content'] ?>
                    </div>
                    <div class="post__footer">
                        <a href="/post/<?php echo $post['id'] ?>" class="post__btn">Подробнее</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="clearFix"></div>
