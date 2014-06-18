$(document).ready(function(){
    $("#twitterShrink").click(function(){
        $(".tweetitem").slideToggle(300,"swing"); 
        if ($(this).text() == "+")
        	$(this).text("_")
        else
        	$(this).text("+");
    });
    
});
