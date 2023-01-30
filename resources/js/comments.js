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
               addErrorRatingValidate(response.responseJSON.errors.rating);
               addErrorAuthorValidate(response.responseJSON.errors.author);
               addErrorDescriptionValidate(response.responseJSON.errors.description);
           });
   });
    function renderComment(comment) {
        let commentsBlock = $('.scrollit');
        $(commentsBlock).prepend(comment);
        clearForm();
    }

    function addErrorRatingValidate(response_answer)
    {
        let rating = $("#authorRating");
        let paragraph = $("<p>");
        paragraph.css({'color' : 'red'});
        paragraph.append(response_answer);
        rating.append(paragraph);
        rating.on('click', function (){
            paragraph.empty();
        })
    }

    function addErrorAuthorValidate(response_answer)
    {
        let name = $("#authorName");
        let paragraph = $("<p>");
        paragraph.css({'color' : 'red'});
        paragraph.append(response_answer);
        name.append(paragraph);
        name.on('click', function (){
            paragraph.empty();
        })
    }

    function addErrorDescriptionValidate(response_answer)
    {
        let description = $("#authorDescription");
        let paragraph = $("<p>");
        paragraph.css({'color' : 'red'});
        paragraph.append(response_answer);
        description.append(paragraph);
        description.on('click', function (){
            paragraph.empty();
        })
    }

    function clearForm()
    {
        $("#create-comment").trigger('reset');
    }
});
