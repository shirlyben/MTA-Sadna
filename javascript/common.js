$(document).ready(function() {
    $(function() {
        $("#common").load("Common.html");
    });
});


$(document).ready(function() {
    $(".hamburger").click(function() {
        $(".wrapper").toggleClass("collapse");
    });
});