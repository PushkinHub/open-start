<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="style/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="style/my_css.css">
</head>
<body>

<div id="dialog">
    <form action="submit.php" method="post">
        <label for="name">Имя</label>
        <input id="name" name="name">
        <label for="email">Email</label>
        <input id="email" name="email">
        <label for="phone">Телефон</label>
        <input id="phone" name="phone">
        <label for="message">Сообщение</label>
        <textarea id="message" name="message"></textarea>
        <input class="send-ajax" type="submit" value="Отправить запрос">
    </form>
    <p class="result"></p>
</div>

<button id="open">Связаться</button>

<script src="style/jquery/jquery-3.5.1.min.js"></script>
<script src="style/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="style/my_js.js"></script>

</body>
</html>
