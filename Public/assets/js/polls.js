// Fonction qui récupère les paramètres GET de l'URL, copiée d'un stack overflow
function $_GET(param) {
    let vars = {};
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

//fonction pour afficher les voix d'un sondage
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


// fonction pour envoyer son commentaire et l'afficher
$("#button").click(function(e){

    console.log('test');
    // e.preventDefault();
    let content = $("#comment").val();
    $.ajax({
        url:"?page=survey&id=" + $_GET("id") +"&function=comment",
        method:"POST",
        dataType:"json",
        data:{content},
        success:function(response){
            renderMessages();
            console.log('test');
        }
    })
})


//fonction pour afficher les commentaires
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

renderMessages();

setInterval(renderMessages, 10000);

// let x = 0;
// function status(){
 
//     $.ajax({
//         url:"?page=survey&id=" + $_GET("id") +"&function=status",
//         dataType:"json",
//         success:function(response){

//             console.log("zizibouche");

//             if (response.status == 0) {
//                 $(".voter").css("display", "none");
//                 $(".sectioncoms").append(`
//                 <hr>

//                 <h2>Commentaires</h2>
        
//                 <div id="commentbox">
//                 </div>
//                 <form>
//                     <input type="text" name="comment" id="comment">
//                     <button id="button">Commenter</button>
//                 </form>`);
//                 x++;
//             } 
            
//         }
//     });
// }

// status();

// while( x = 0) {
//     setInterval(status, 1000);
// }

