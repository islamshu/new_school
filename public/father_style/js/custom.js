$(window).ready(function(){
$('#toggle').click(function(){


    $('#panel').toggleClass('active');
    $('#navigation').toggleClass('active');
    $('#toggle').toggleClass('active');

});


$('.list li a').click(function(){
    $(this).parent().addClass('active').siblings().removeClass('active');
})

if($('tr td').hasClass('paid')){
    $(this).parent().find("input").hide();
}


})