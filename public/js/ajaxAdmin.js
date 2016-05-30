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
    $('#Modal').on('hidden.bs.modal', function () {
        $('.errors').empty();
    });
//display modal form for creating new admin
    $('#btn-add').click(function () {
        $('#btn-save').val("Добавить");
        $('#regForm').trigger("reset");
        $('#myModalLabel').html('Добавить администратора');
        $('#password, #password_confirmation').attr("disabled", false);
        $('#pass').show();
        $('#Modal').modal('show');
    });

//display modal form for admin editing
    $('#ajaxAdmins').on('click', '.edit_admin', function () {
        var id = $(this).val();
        $('#myModalLabel').html('Редактировать данные администратора');
        $('#btn-save').val("Сохранить");
        $('#pass').hide();
        $('#password, #password_confirmation').attr("disabled", true);
        $('#Modal').modal('show');
        token();
        $.getJSON("/admin/administrators/" + id, function (json) {
            $('#name').val(json.name);
            $('#email').val(json.email);
            $('#phone').val(json.tel);
            $('#admin_id').val(id);
        });
    });

//create new admin / update existing admin
    $( "#regForm" ).submit(function(event) {
        event.preventDefault();
        token();
        var id = $('#admin_id').val();
        var state = $('#btn-save').val();
        var data = $(this).serialize();
        var type = "POST"; //for creating new resource
        var url = "/admin/administrators";

        if (state == "Сохранить") {
            type = "PUT"; //for updating existing resource
            url = "/admin/administrators/"+id;
        }
        console.log(url);
        $.ajax({
            url: url,
            type: type,
            data: { formData: data },
            success: function (data) {
                if(data.fail) {
                    $('.errors').empty();
                    $.each(data.errors, function( index, value ) {
                        var errorDiv = '#'+index+'_error';
                        $(errorDiv).append(value);
                    });
                } else {
                    $('#Modal').modal('hide');
                    $('#ajaxAdmins').html(data);
                    if(state == "Сохранить"){
                        alertOk('success','Данные изменены');
                    } else {
                        alertOk('success','Администратор добавлен');
                    }
                }
            }
        });
    });

    $('#ajaxAdmins').on('click', '.delete_admin', function () {
        var id = $(this).val();
        token();
        if (confirm('Удалить?')) {
            $.ajax({
                url: "/admin/administrators/"+id,
                type: "DELETE",
                data: {id: id},
                success: function (result) {
                    if (result == 'disable') {
                        alertOk('error','Удаление данного администратора не доступно!');
                    } else if (result != 'error') {
                        $('#ajaxAdmins').html(result);
                        alertOk('success','Администратор удален');
                    } else if (result == 'error') {
                        alertOk('error','Ошыбка!');
                    }
                }
            });
        }
    });

    $('#ajaxAdmins').on('click', '.lock_admin', function () {
        alertOk('warning','Не доступно');
    });

    $('#emailForm').on('submit', function (event) {
        event.preventDefault();
        var emailto = $('#emailto').val();
        var subject = $('#subject').val();
        var message = $('#message').val();
        token();
        $.ajax({
            url: "/admin/email",
            type: "POST",
            data: {emailto: emailto, subject: subject, message: message},
            success: function (result) {
                if (result != 'error') {
                    alertOk('success','Письмо отправлено');
                } else if (result == 'error') {
                    alertOk('error','Ошыбка!');
                }
            }
        });
    });



/*    $('#modalForm').submit(function (event) {
 event.preventDefault();
 $('#myModalLabel').html('Добавить администратора');
 $('#btn-save').val("Добавить");
 var name = $('#name').val();
 var rights = $('#rights').val();
 var birthday = $('#birthday').val();
 var email = $('#email').val();
 var tel = $('#tel').val();
 token();
 $.ajax({
 url: "/admin/administrators/add",
 type: "POST",
 data: {
 name: name,
 rights: rights,
 birthday: birthday,
 email: email,
 tel: tel
 },
 success: function (result) {
 if (result != 'error') {
 $('#addModal').modal('hide');
 $('#ajaxAdmins').html(result);
 alertOk('Администратор добавлен');
 } else if (result == 'error') {
 alertOk('Ошыбка!');
 }
 }
 });
 });*/
});