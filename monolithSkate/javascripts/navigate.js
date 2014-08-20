$(window).bind('resize orientationchange', function() {
    ww = document.body.clientWidth;
    adjustMenu();
});
$(document).ready(function() {
    $(".toggleMenu").click(function(e) {
        e.preventDefault();
        $(this).toggleClass("active");
	$(".nav").toggle();
    });
    $(".nav li a").each(function() {
        if ($(this).next().length > 0) {
            $(this).addClass("parent");
        };
    })
    adjustMenu();
});
function adjustMenu() {
    
    var ww = document.body.clientWidth;
    if (ww < 800) {
        $(".toggleMenu").css("display", "inline-block");
        if (!$(".toggleMenu").hasClass("active")) {
            $(".nav").hide();
        } else {
            $(".nav").show();
        }
        $(".nav li").unbind('mouseenter mouseleave');
	$(".nav li a.parent").unbind("click").bind("click", function(e) {
            e.preventDefault();
            $(this).parent("li").toggleClass('hover');
	});
    } else {
        $(".toggleMenu").css("display", "none");
        $(".nav").show();
            $(".nav li").removeClass("hover");
        $(".nav li a").unbind("click");
	$(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
            $(this).toggleClass('hover');
        });
	}
}

$(function() {
        $(window).bind("resize", function() {
            $('.logo').toggle($(this).width() >= 800);  
        }).trigger("resize");
    });
    
$(function() {
        $(window).bind("resize", function() {
            $('.logoSM').toggle($(this).width() <= 800);  
        }).trigger("resize");
    });