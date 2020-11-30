<?php

use App\Controller\SurveyController;
require ROOT."/commons.php";

?>

<!-- Chat -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

    <section class="chat">
        <div class="messages">
            <div class="message">
                <span class="date"></span>
                <span class="author"></span>
                <span class="content"></span>
            </div>
        </div>

        <div id="msg-author"></div>
        <div id="msg-received"></div>

        <div class="user-Inputs">
            <form action="?task" method="POST">
                <input type="text" name="author" id="author" placeholder="Username">
                <input type="text" name="content" id="content" placeholder="Message">
                <button type="submit">Send</button>
            </form>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
    
    function getMessage() {

        $.ajax({
            url: "index.php?task",
            datatype: json,
            success: function(response) {
                response.foreach(message => {
                    $('#msg-author').append(`<p>${message.author}</p>`);
                    $('#msg-received').append(`<p>${message.content}</p>`);
                })
            }
        })

    }

    function postMessage() {

        $("button").click(function(e){
            e.preventDefault();
            let content = $("#content").val();
            $.ajax({
                url:"index.php?task=write",
                method:"POST",
                dataType:"json",
                data:{content},
                success:function(response){
                    getMessages();
                }
            })
        })

    }

    </script>
    
</body>
</html>