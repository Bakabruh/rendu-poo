function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace( 
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

function scoreboard(){
    $("#results").html("")
    $.ajax({
        url:"?page=survey&id=" + $_GET("id") +"&function=score",
        dataType:"json",
        success:function(response){

            let i = 1;
            response.forEach(vote => {
                $("#results").append(`<div id="rep` + i + `" class="option"><div class="conteneur" id="cont` + i + `" ></div></div>`)
                let compte = Object.values(vote)[3];

                for(let x = 0; x < compte; x++) {
                    $('#cont' + i + '').append(`<div class="voix"></div>`)
                }
                
                $('#rep' + i + '').append(`<p class="reponse">` + vote.reponse + `</p>`)

                i++;
            });  
        }
    });
}

scoreboard();

setInterval(scoreboard, 5000);

renderMessages();

$("#button").click(function(e){
    // e.preventDefault();
    let content = $("#comment").val();
    $.ajax({
        url:"?page=survey&id=" + $_GET("id") +"&function=comment",
        method:"POST",
        dataType:"json",
        data:{content},
        success:function(response){
            renderMessages();
        }
    })
})

function renderMessages()
{

    $("#commentbox").html("")
    $.ajax({
        url:"?page=survey&id=" + $_GET("id") +"&function=coms",
        dataType:"json",
        success:function(response){
            
            response.forEach(message => {
                $("#commentbox").append(`<div class="message"><h6>${message.author} le ${message.created_at}</h6><p>${message.content}</p></div>`)
            });
        }
    })
}

setInterval(renderMessages, 5000);