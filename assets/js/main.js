//Uređivanje bannera
$(document).ready(function(){
    $('#slikaBanner').css({'borderRadius':'100%', 'display':'none'});
    $('#slikaBanner').slideDown(1000);

    $('#bannerPocetna p').css({'display':'none'}).delay(1000).slideDown(2000);
});

function slideShow(){
    var current = $('#slide .show');
    var next = current.next().length ? current.next() : current.parent().children(':first');
    
    current.hide().removeClass('show');
    next.fadeIn().addClass('show');
    
    setTimeout(slideShow, 3000);
}

//Pokretanje slajdera
$("#slide img:first").addClass("show");
slideShow();