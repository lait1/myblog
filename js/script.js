$(document).ready(function() {
// 	$.ajax({
// 	  dataType: 'json',
// 	  url: 'category',
// 	  success: function(data){
// 	  	$.each(data, function(index,element){
// 	  		$('.category__content').append('<div class="category__item"><a href="/category/' + element.id + '" class="category__link" >' + element.catName+ '</a></div>');
// 	  	})
// 	  },
// 	  error: function(data){
// 	      console.log(data);
//       }
// 	});
// });
// 	$('#update').on('click', 'button', function(){
// 		$.ajax({

// 		  dataType: 'json',
// 		  url: 'parser',
// 		  success: function(data){
// 		  },
// 		  error: function(msg){
// 	         alert(msg);
// 	      }                echo '<a href="/category/' . $cat['id'] . '" class="category__link" >' . $cat['catName'] . '</a></div>';
// 		});
//
    $('form').on('submit', function()
    {
        var content = $('.ql-editor').html();
        $('input[name="content"]').val(content);
    });
});



