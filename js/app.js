//Variables
var transitiontime=250;

//// HEADER JQUERY ////
///////////////////////

//Find broswer width
menu_right = $('#main-menu').width();
menu_right = menu_right + 1;
menu_right = '-' + menu_right + 'px';

// Menu Reset
if ($('#menu .expand').hasClass('active')) {
    $('#menu').css({'overflow': 'visible','right': 0});
}
if ($('#menu .expand').hasClass('inactive')) {
    $('#menu').css({'overflow': 'hidden','right': menu_right});
}

// Reset menu on broswer resize
$(window).resize(function() {
    var width = $(window).width();
    if (width > 980) {

        //Find menu_width on browser resize
        menu_right = $('#main-menu').width();
        menu_right = menu_right + 1;
        menu_right = '-' + menu_right + 'px';

        //Menu Reset
        if ($('#menu .expand').hasClass('active')) {
            $('#menu').css({'overflow': 'visible','right': 0});
        }
        if ($('#menu .expand').hasClass('inactive')) {
            $('#menu').css({'overflow': 'hidden','right': menu_right});
        }
    }
});

//Toggle on plus minus menu click
$('#menu .active.expand').toggle(function() {closeMenu();}, function() {expandMenu();});
$('#menu .inactive.expand').toggle(function() {expandMenu();}, function() {closeMenu();});

function expandMenu() {
    $('#menu').animate({"right": 0}, transitiontime, 'swing', function () {
        $('#menu .expand').addClass("active");
        $('#menu .expand').removeClass("inactive"); 
        $('#menu').css({'overflow': 'visible'});

    });
}

function closeMenu() {
    $('#menu').animate({"right": menu_right}, transitiontime, 'swing', function () {
        $('#menu .expand').removeClass("active");
        $('#menu .expand').addClass("inactive"); 
        $('#menu').css({'overflow': 'hidden'});
    });
}


// Mobile Menu Navigation with clicks
$('#homemenu ul li').filter(':has(ul)').children('a').toggle(function() {
    $(this).parent('li').children('ul').show('fast');
}, function() {
    $(this).parent('li').children('ul').hide('fast');
})


// Project information animation
$('.projheader').toggle(function() {
    $('.projtext').animate({opacity: 0});
    $('#navigation').animate({bottom: '124px'});
    $('.projheader').children('h3').text("Show Project Info");
}, function () {
    $('.projtext').animate({opacity: 1});
    $('#navigation').animate({bottom: '266px'});
    $('.projheader').children('h3').text("Hide Project Info");
});


// Footer Justify Function - Must put in an ID
function Justify(id) {
    var TEXT_NODE = 3;
    var elem = document.getElementById(id);
    elem = elem.firstChild;

    while(elem) {
        var nextElem = elem.nextSibling;

        if(elem.nodeType == TEXT_NODE) {
                var text = elem.nodeValue.replace(/^\s*|\s(?=\s)|\s*$/g, "");
                var textlength=text.length;
                for(var i=0;i<textlength;i++) {
                    var letter = document.createElement("div");
                    letter.appendChild(document.createTextNode(text.charAt(i)));
                    elem.parentNode.insertBefore(letter, elem);
                }
                elem.parentNode.removeChild(elem);
        }
        elem = nextElem;
    }
}
