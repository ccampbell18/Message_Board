$(document).ready(function(){
    var $firstForm = $('form').eq(0);
    $firstForm.hide();
    $("#register").click(function(){
        $firstForm.animate({
            opacity: 'toggle',
            height: 'toggle'}, 'slow');
    });
});

$(document).ready(function() {
    // Enable hover effect on the style switcher
    $('#register').hover(function () {
        $(this).addClass('hover');
    }, function () {
        $(this).removeClass('hover');
    });
});

$(document).ready(function(){
    var $firstForm = $('form').eq(1);
    $firstForm.hide();
    $("#login").click(function(){
        $firstForm.animate({
            opacity: 'toggle',
            height: 'toggle'}, 'slow');
    });
});

$(document).ready(function() {
    // Enable hover effect on the style switcher
    $('#login').hover(function () {
        $(this).addClass('hover');
    }, function () {
        $(this).removeClass('hover');
    });
});

$(document).ready(function () {

    $('#myform1').validate({
        rules: {
            fName: {
                required: true,
                minlength: 6
            },
            lName: {
                required: true,
                minlength: 5
            }
        }
    });

});