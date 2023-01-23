$(document).ready(function (){
    $("#fadetoggle").click(function (){
        $(".scrollit").fadeToggle(500, "linear", function (){
            console.log("toggle completed");
        });
    });
   $("#create-comment-btn").click(function (event){
       event.preventDefault();
       const data = $("#create-comment").serialize();
       const bookId = $("#book_id").val();
       $.ajax({
           method: "POST",
           url: `/books/${bookId}/comments`,
           data: data
       })
           .done(function (msg){
               console.log("message =>" , msg.comment);
               renderComment(msg.comment);
           })
           .fail(function (response){
               console.log('Fail response ------>', response);
           });
   });
    function renderComment(comment) {
        let commentsBlock = $('.scrollit');
        $(commentsBlock).prepend(comment);
        clearForm();
    }

    function clearForm()
    {
        $("#create-comment").trigger('reset');
    }
});
