<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WS</title>
</head>
<body>
    <!-- форма для отправки сообщений -->
    <form id="form" name="publish">
        <input id="input" type="text" name="message">
        <input id="button" type="submit" value="Отправить">
    </form>

    <!-- здесь будут появляться входящие сообщения -->
    <div id="subscribe"></div>
<script>
    window.onload = function () {
        let form, input, button, out, ws, showMessage;

        form = document.querySelector('#form');
        input = document.querySelector('#input');
        button = document.querySelector('#button');
        out = document.querySelector('#subscribe');

        // создать подключение
        ws = new WebSocket("ws://echo.websocket.org");

        // показать сообщение в div#subscribe
        showMessage = function (message) {
            out.innerHTML = message;
        };

        // обработчик входящих сообщений
        ws.onmessage = function(event) {
        //  console.log(event);
            let incomingMessage = event.data;
            showMessage(incomingMessage);
        };

        // отправить сообщение из формы publish
        form.onsubmit = function() {
            let outgoingMessage = this.message.value;
            ws.send(outgoingMessage);
            return false;
        };
    };
</script>
</body>
</html>