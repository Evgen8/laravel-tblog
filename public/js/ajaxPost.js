$(document).ready(function() {
    function token() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    function alertOk(state, message) {
        $('#alert').html('<div class="alert alert-' + state + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>' + message + '</div>');
        setTimeout(function() {
            $('.alert').alert('close')
        }, 5000);
    }

    $('#ajaxPosts').on('click', '.status_post', function () {
        var id = $(this).val();
        token();
        $.ajax({
            url: "/admin/posts/publish",
            type: "POST",
            data: {id: id},
            success: function (result) {
                if (result != 'error') {
                    $('#ajaxPosts').html(result);
                    alertOk('success', 'Статус изменен');
                } else if (result == 'error') {
                    alertOk('error','Ошыбка!');
                }
            }
        });
    });
    
    $('#ajaxPosts').on('click', '.change_category', function () {
        var id = $(this).val();
        var post = $(this).siblings('.edit_post').val();
        localStorage.setItem("post", post);
        $('#category').val(id);
        $('#change_category').modal('show');
    });

    $('#changeCategory').on('submit', function (event) {
        event.preventDefault();
        token();
        var id = $('#category').val();
        var post = localStorage.getItem("post");
        token();
        $.ajax({
            url: "/admin/posts/change_category",
            type: "POST",
            data: {id: id, post: post},
            success: function (result) {
                if (result != 'error') {
                    $('#change_category').modal('hide');
                    $('#ajaxPosts').html(result);
                    alertOk('success', 'Категория изменена');
                } else if (result == 'error') {
                    alertOk('error','Ошыбка!');
                }
            }
        });
    });

    $('#ajaxPosts').on('click', '.delete_post', function () {
        alertOk('error', 'Удаление не доступно');
    });

});