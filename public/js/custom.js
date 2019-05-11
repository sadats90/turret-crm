jQuery(function ($) {

    // Dropdown menu
    $(".sidebar-dropdown > a").click(function () {
        $(".sidebar-submenu").slideUp(200);
        if ($(this).parent().hasClass("active")) {
            $(".sidebar-dropdown").removeClass("active");
            $(this).parent().removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this).next(".sidebar-submenu").slideDown(200);
            $(this).parent().addClass("active");
        }

    });

    // close sidebar 
    $("#close-sidebar").click(function () {
        $(".page-wrapper").removeClass("toggled");
    });

    //show sidebar
    $("#show-sidebar").click(function () {
        $(".page-wrapper").addClass("toggled");
    });

    //switch between themes 
    var themes = "chiller-theme ice-theme cool-theme light-theme";
    $('[data-theme]').click(function () {
        $('[data-theme]').removeClass("selected");
        $(this).addClass("selected");
        $('.page-wrapper').removeClass(themes);
        $('.page-wrapper').addClass($(this).attr('data-theme'));
    });

    // switch between background images
    var bgs = "bg1 bg2 bg3 bg4";
    $('[data-bg]').click(function () {
        $('[data-bg]').removeClass("selected");
        $(this).addClass("selected");
        $('.page-wrapper').removeClass(bgs);
        $('.page-wrapper').addClass($(this).attr('data-bg'));
    });

    // toggle background image
    $("#toggle-bg").change(function (e) { 
        e.preventDefault();
        $('.page-wrapper').toggleClass("sidebar-bg");
    });

    //custom scroll bar is only used on desktop
    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $(".sidebar-content").mCustomScrollbar({
            axis: "y",
            autoHideScrollbar: true,
            scrollInertia: 300
        });
        $(".sidebar-content").addClass("desktop");

    }
});

 /*function validateForm()
        {
            let picture=document.getElementById('image');
            var fileSize = picture.files[0].size;
            let output=document.getElementById('output');
            if(fileSize>2048000 ){
                let x=output.innerHTML;
                x = x+" size should be less than 2 MB";
                alert(x);
         // output.innerHTML=x;

         return false;
     }
     else{
        return true;
    }
}*/

function validateForm(){
    let picture=document.getElementById('image');
    if(picture.files.length!=0){
        let fileSize = picture.files[0].size;
        let x="";
        if(fileSize>2048000){
            x=" your file size too learge";
            output.innerHTML=x;
            confirm(x);
            picture.value="";
            return false;
        }else{
            output.innerHTML="";
            return true;
        }
    }
    return true;
}