<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.05.2019
 * Time: 20:44
 */
?>

<form method="POST" action="/add/createPost">
    Заголовок <br> <input name="title" type="text" ><br>
    <textarea id="editor" name="content" ></textarea><br>
    <div id="editor"></div>
<?php
    foreach ($data['category'] as $cat){
        echo $cat['catName'].'<input type="checkbox" name="category[]" value="'.$cat['id'].'"><br>';
    }
?>
<input name="submit" type="submit" value="Добавить пост">
</form>


<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

























<!-- Include stylesheet -->
<!--<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">-->
<!-- Create toolbar container -->
<!--<div id="toolbar">-->
<!--</div>-->
<!--<div id="editor"></div>-->

<!-- Create the editor container -->

<!-- Include the Quill library -->
<!--<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>-->

<!-- Initialize Quill editor -->
<!--<script>-->
<!--    var toolbarOptions = [-->
<!--        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown-->
<!--        [{ 'header': [1, 2, 3, false] }],-->
<!--        [{ 'font': [] }],-->
<!--        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons-->
<!--        ['blockquote', 'code-block'],-->
<!--        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme-->
<!--        [{ 'list': 'ordered'}, { 'list': 'bullet' }],-->
<!--        [{ 'align': [] }],-->
<!--        ['image'],-->
<!--        ['clean']                                         // remove formatting button-->
<!--    ];-->
<!---->
<!--    var quill = new Quill('#editor', {-->
<!--        debug: 'info',-->
<!--        modules: {-->
<!--            toolbar: toolbarOptions-->
<!--        },-->
<!--        placeholder: 'Compose an epic...',-->
<!--        // readOnly: true,-->
<!--        theme: 'snow',-->
<!--    });-->
<!--</script>-->