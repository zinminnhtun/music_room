$(".show-sidebar-btn").click(function(){
    $(".sidebar").animate({marginLeft:"0"});
});

$(".hide-sidebar-btn").click(function(){
    $(".sidebar").animate({marginLeft:"-100%"});
});

function go(url){
    setTimeout(function(){
        location.href =`${url}`;
    },500);
};

$(".full-screen-btn").click(function () {
    // console.log("test");
    $(this).closest(".card").toggleClass("full-screen-card").find(".a").toggleClass("feather-maximize-2").toggleClass("feather-minimize-2");
});


let screenHeight = $(window).height();
let currentMenuHeight  = $(".nav-menu .active").offset().top;
if (currentMenuHeight>screenHeight*0.8){
    $(".sidebar").animate({
        scrollTop : currentMenuHeight-100
    },1000)
};





