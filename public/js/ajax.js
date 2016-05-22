function token(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

$('#password').keyup(function(event){
    if(event.keyCode == 13){
        $("#loginAjax").click();
    }
});

$('#loginAjax').click(function () {
    var email = $('#email').val();
    var password = $('#password').val();
    token();

    $.ajax({
        url: "/login",
        method: "post",
        data: {
            email: email,
            pass: password
        },
        success: function (data) {
            if(data != 'No'){
                $('#wrongMessage').text('');
                location.reload();
            } else if (data == 'No'){
                $('#wrongMessage').text('Введите корректные данные или зарегистрируйтесь!');
            }
        }
    });
});

/*$('.menu').click(function () {
    var id = $(this).data('category');
    var li = $(this);
    token();

    $.ajax({
        url: "category",
        method: "post",
        data: {id: id},
        success: function (data) {
            /!*if( location !== '/') {
             location.replace('/');
             }*!/
            $('#ajaxSection').html(data);
            $('.menu').removeClass('active');
            li.addClass('active');

        }
    });
});*/

$('#addComment').on('submit', function (event) {
    event.preventDefault();
    token();

    var post_id = $('#post_id').val();
    var name = $('#nameC').val();
    var email = $('#emailC').val();
    var message = $('#messageC').val();
     
    $.ajax({
        url: '/post/comment',
        method: "POST",
        data: {post_id: post_id, name: name, email: email, message: message},
        success: function( data ) {
            $('#ajaxComment').html(data);
        }
    });
});