$('.aut').click(function (e) {

    e.preventDefault();

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'includes/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success(data) {
            if (data.status) {
                document.location.href = 'profile.php';
            } else {
                $('.message').removeClass('hide').text(data.message);
            }
        }
    });
});


$('.reg').click(function (e) {

    e.preventDefault();

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm').val();

    $.ajax({
        url: 'includes/signup.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            password_confirm: password_confirm
        },
        success(data) {
            if (data.status) {
                document.location.href = 'index.php';
            } else {
                $('.message').removeClass('hide').text(data.message);
            }
        }
    });
});


$('.edit').click(function (e) {

    e.preventDefault();

    let newLogin = $('input[name="new_login"]').val(),
        oldPassword = $('input[name="old_password"]').val(),
        newPassword = $('input[name="new_password"]').val(),
        passwordConfirm = $('input[name="password_confirm"]').val();


    $.ajax({
        url: 'includes/change.php',
        type: 'POST',
        dataType: 'json',
        data: {
            new_login: newLogin,
            old_password: oldPassword,
            new_password: newPassword,
            password_confirm: passwordConfirm
        },
        success(data) {
            if (data.status) {
                document.location.href = 'profile.php';
            } else {
                $('.message').removeClass('hide').text(data.message);
            }
        }
    });
});
