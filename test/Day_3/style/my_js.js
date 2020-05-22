$('form').submit(function() {

    return false;

});


$('.send-ajax[type="submit"]').click(function () {

    $.post(
        // url
        "submit.php",
        // Данные из формы
        {
            name: $('[name="name"]').val(),
            email: $('[name="email"]').val(),
            phone: $('[name="phone"]').val(),
            message: $('[name="message"]').val()
        },
        // Функция вызываемая после отправки формы
        function (data) {
            $(".result").html(data);
        });
});

$(function () {

    $('#dialog').dialog({
        autoOpen: false

    });

    $('#open').button().click(function (e) {
        $('#dialog').dialog("open")
    });
});
