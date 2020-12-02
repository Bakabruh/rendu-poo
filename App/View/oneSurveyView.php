<?php

use App\Controller\SurveyController;

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

<style>

    .chat {
        width: 20%;
        margin:  100px auto;
        padding: 30px;
        background-color: #F0F0F0;
    }

</style>

    <section class="chat">
        <div class="messages">
            <div class="message">
                <span class="date"></span>
                <span class="author"></span>
                <span class="content"></span>
            </div>
        </div>

        <div class="msg-delivered-container">
            <div id="msg-author"></div>
            <div id="msg-received"></div>
        </div>

        <div class="user-Inputs">
            <form action="?page=survey&&id=<?= $su['survey_id'] ?>" method="POST">
                <input type="hidden" name="author" id="author" value="<?= $_SESSION['Username'] ?>">
                <input type="text" name="content" id="content" placeholder="Message">
                <button type="submit">Send</button>
            </form>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>


    
    function showMessage() {

        $.ajax({
            url: "index.php?page=survey",
            type: "GET",
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
            let author = $('#author').val();
            let content = $("#content").val();
            $.ajax({
                url:"index.php?page=survey",
                type:"POST",
                dataType:"json",
                data:{author, content},
                success:function(response){
                    showMessages();
                }
            })
        })

    }

    </script>
    
</body>
</html>