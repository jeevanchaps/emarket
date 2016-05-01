$(document).ready(function(){
    //JQuery Method Goes Here
    //BAnner Slider CodeStarts
    $('.bxslider').bxSlider({
            auto:true,
            captions:true,
            responsive:true,
            pager:false,
            infiniteLoop: true,
            touchEnabled: true
        });//BxSLider Closed
    //Banner Slide rCode Ends
    
    //Toggle Navigation
    jQuery (".menu-trigger").click(function(){
        jQuery(".navbar").slideToggle(400,function(){
            jQuery(this).toggleClass("nav-expanded").css('display','');
        });
    });
    
    //Toggle Navigation
    jQuery (".menu-trigger-admin").click(function(){
        jQuery(".navbar").slideToggle(400,function(){
            jQuery(this).toggleClass("nav-expanded").css('display','');
        });
    });
    
    //Password Change Drop
    //Toggle Navigation
    jQuery (".menu-trigger-drop").click(function(){
        jQuery(".toggle-box").slideToggle(400,function(){
            jQuery(this).toggleClass("drop-expanded").css('display','');
        });
    });
    //Search Tabs
    });//Document Ready End