//Intialize design sizes
var headerHeight = 154;
var slideFullWidth = 1024;
var slideFullHeight = 640;
var totalSlideNumber = 7;
var ratio,initialLoadDone,myScroll,bufferLeft=0;
var parallaxWidth,activeSlide=0;

//Call positioning and scrolling functions once everything is loaded
$(window).load(function(){
    if ($(window).width() < 980) {return;}
    $.when(position()).then(scrolling()).done(function(){
        //Once everything is loaded, positioned, and setup, display to user
        $('#parallax').css({'opacity':1});
        $('#loader').hide();
        initialLoadDone = 1;
        postScrolling();
        //Prevent default on touchmove (IOS default to move screen around on touch)
        document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    });
});

//Reload page on resize
$(window).resize(function(){location.reload();});

//Post Scrolling Setup
function postScrolling() {
    //New Post Scrilling setup (Vipsasana code!)
    var scrollCounter = 0;
    var SnapTime = 5000;
    myScroll.on('scroll', function() {
        scrollCounter++;

        var xPos = this.x * -1;
        var desiredSlide = Math.round(xPos / parallaxWidth);

        if (activeSlide !== desiredSlide) {    
            //Inactive current slide and make new slide active
            $('.circle.active').removeClass('active');
            var slide = '.circle[data-slide="' + desiredSlide + '"]';
            $(slide).addClass('active');
            activeSlide = desiredSlide;
        }

    });

    myScroll.on('scrollEnd', function() {
        var scrollCounterValue = scrollCounter;
        var waitToSnapTime = 2000;

        //All at Once Snap Option
        var snapTime = 1000;
        var xPos = this.x * -1;
        var desiredSlide = Math.round(xPos / parallaxWidth);
        setTimeout(function () {
            AllAtOnceSnapScroll(scrollCounterValue, desiredSlide, snapTime)
            }, waitToSnapTime);

        if (activeSlide !== desiredSlide) {    
            //Inactive current slide and make new slide active
            $('.circle.active').removeClass('active');
            var slide = '.circle[data-slide="' + desiredSlide + '"]';
            $(slide).addClass('active');
            activeSlide = desiredSlide;
        }
    });

    //All at Once Scrolling Function
    function AllAtOnceSnapScroll(scrollCounterValue, desiredSlide, SnapTime) {
        if (scrollCounterValue !== scrollCounter) {return;}
        goToSlide(desiredSlide, SnapTime);
    }

    //Navigation circles click function
    $('.circle').click(function (e) {
        e.preventDefault();
        var desiredSlide = $(this).attr('data-slide');
        scrollCounter++;
        goToSlide(desiredSlide);
    });

    //Slide specific hover overs
    $("#slide2 a").hover(function(){
        var circle = $(this).prev().children("img")
        var url = circle.attr("src");
        url = url.replace(".png", "_HOVER.png");
        circle.attr("src", url);
    }, function(){
        var circle = $(this).prev().children("img")
        var url = circle.attr("src");
        url = url.replace("_HOVER.png", ".png");
        circle.attr("src", url)
    });
    $("#slide3 a").hover(function(){
        var circle = $(this).prev().children("img")
        var url = circle.attr("src");
        url = url.replace(".png", "_HOVER.png");
        circle.attr("src", url);
    }, function(){
        var circle = $(this).prev().children("img")
        var url = circle.attr("src");
        url = url.replace("_HOVER.png", ".png");
        circle.attr("src", url)
    });
    $("#slide4 a").hover(function(){
        var prop = $(this).prev().children("img")
        var url = prop.attr("src");
        url = url.replace("Hexagon-B.png", "Hexagon-Hover.png");
        prop.attr("src", url);
    }, function(){
        var prop = $(this).prev().children("img")
        var url = prop.attr("src");
        url = url.replace("Hexagon-Hover.png", "Hexagon-B.png");
        prop.attr("src", url)
    });
    $("#slide5 a").hover(function(){
        var box = $(this).prev().children("img")
        var url = box.attr("src");
        url = url.replace("ContentBoxes.jpg", "HoverBox.jpg");
        box.attr("src", url);
    }, function(){
        var box = $(this).prev().children("img")
        var url = box.attr("src");
        url = url.replace("HoverBox.jpg", "ContentBoxes.jpg");
        box.attr("src", url);
    });
}

//Go to this slide number
function goToSlide(slideNum, time) {
    var slide = '#slide'+slideNum;
    if ((!time) && (time !== 0)) { time = 1000; }
    myScroll.scrollToElement(slide, time);

    if (activeSlide !== slideNum) {    
        //Inactive current slide and make new slide active
        $('.circle.active').removeClass('active');
        var slide = '.circle[data-slide="' + slideNum + '"]';
        $(slide).addClass('active');
        activeSlide = slideNum;
    }
}

//Set up Scrolling libraries
function scrolling() {
    //Setup IScroll
    myScroll = new IScroll('#parallax', { 
        scrollX: true, 
        scrollY: false,
        click: true,
        tap: true,
        probeType: 2,
        mouseWheel: true,
        indicators: [{
            el: document.getElementById('bgFull'),
            listenY: false,
            interactive: false,
            resize: false, 
            ignoreBoundaries: true,
            speedRatioX: .4
        }]
    });

    //Only setup stellar if not using IE    
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        $('#IEwarning').show();
    } else {
        //Setup Stellar.js
        $('main').stellar({
            scrollProperty: 'transform',
            positionProperty: 'transform',
            horizontalScrolling: true,
            verticalScrolling: false,
            responsive: false,
            hideDistantElements: false
        });
    }
}

//Wrapper for position functions
function position(){
    //Call position functions
    $.when(positionSlides()).done(positionProps());
}


//Position the slides
function positionSlides() {

    // Get new height and ratio, and set parallax height
    var windowHeight = parseInt($(window).height());
    var parallaxHeight = parseInt(windowHeight - headerHeight);
    $("#parallax").height(parallaxHeight);
    ratio = parallaxHeight/slideFullHeight;

    //Figure out window width and slide width based on height
    var windowWidth = parseInt($(window).width());
    var slideWidth = parseInt(ratio*slideFullWidth);

    //Figure out which width to use
    if (slideWidth > windowWidth) {
        parallaxWidth = slideWidth;
        var parallaxFullWidth = parseInt(slideWidth * totalSlideNumber);
        bufferLeft = 0;
    }
    else {
        parallaxWidth = windowWidth;
        var parallaxFullWidth = parseInt(windowWidth * totalSlideNumber);
        bufferLeft = parseInt((windowWidth - slideWidth) / 2);
    }

    //Setup width of entire site
    $('main').width(parallaxFullWidth);
    $('#bgFull').width(parallaxFullWidth * 0.5);

    //Position each slide
    $('section').each(function(index,obj) {
        //Get Data Attributes
        var slideNum = parseInt(obj.getAttribute("data-slidenum"));

        //Calculate css values based on window height
        var left = parseInt((slideNum)*parallaxWidth);

        //Set css
        $(this).css({
            'left':left+'px',
            'width':parallaxWidth+'px'
        });
    });
}

//Position the props within each slide
function positionProps() {

    $(".prop").each(function(index,obj) {

        //Get Data Attributes
        var xpos = parseInt(obj.getAttribute("data-xpos"));
        var ypos = parseInt(obj.getAttribute("data-ypos"));
        var width = obj.getAttribute("data-width");
        var height = obj.getAttribute("data-height");

        var fontSize = parseInt(obj.getAttribute("data-fontsize"));
        if (isNaN(fontSize)) {fontSize = $(this).children(".text").css("font-size");}
        var letterSpacing = parseInt(obj.getAttribute("data-letterspacing"));
        if (isNaN(letterSpacing)) {letterSpacing = $(this).children(".text").css("letter-spacing");}        
        var lineHeight = parseInt(obj.getAttribute("data-lineheight"));
        if (isNaN(lineHeight)) {lineHeight = $(this).children(".text").css("line-height");}        
        
        //Calculate css values based on window height
        ypos = parseInt(ratio * ypos);
        xpos = parseInt(ratio * xpos) + bufferLeft; //Add buffer if winWidth is larger
        width = parseInt(ratio * width);
        height = parseInt(ratio * height);
        if (height == 0) {height=1;}

        fontSize = parseInt(ratio * parseInt(fontSize));
        letterSpacing = parseInt(ratio * parseInt(letterSpacing));
        lineHeight = parseInt(ratio * parseInt(lineHeight));

        //Set css
        $(this).css({
            'top':ypos+'px', 
            'left':xpos+'px',
            'width':width+'px',
            'height':height+'px'
        });
        $(this).find("h2").css({
            'font-size':fontSize+'px',
            'letter-spacing':letterSpacing+'px',
            'line-height':lineHeight+'px'
        })
        $(this).find("h4").css({
            'font-size':fontSize+'px',
            'letter-spacing':letterSpacing+'px',
            'line-height':lineHeight+'px'
        })
        $(this).find("h5").css({
            'font-size':fontSize+'px',
            'letter-spacing':letterSpacing+'px',
            'line-height':lineHeight+'px'
        })
        $(this).find("h6").css({
            'font-size':fontSize+'px',
            'letter-spacing':letterSpacing+'px',
            'line-height':lineHeight+'px'
        })

    });
}