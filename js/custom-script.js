jQuery(document).ready(function($){

//Add toggle button with Trigger for Submenus
    jQuery("ul.sub-menu").parent().append('<span class="toggle-sub"></span>'); // Add toggle button

    jQuery("ul.menu li span").parent().on('click', function () { //When trigger is clicked toggle show menu class
        event.stopPropagation();
        jQuery(this).toggleClass("subshow");
    });
   
    function menuToggle(){
        var $button = $('.navigation__button');
        var $sideMenu = $('.side-bar-menu');
        $button.click(function () {
             $button.toggleClass('active');
             $sideMenu.toggleClass('toggle');
        });
    }
    menuToggle();

    function subMenu() {
        // var subBtn = $('.toggle-sub');
        var subBtn = $('li.menu-item-has-children:before');
        var subMenu = $('.side-bar-menu .sub-menu');
        subBtn.click(function(){
            $(this).toggleClass('expanded');
            subMenu.toggleClass('open');
        });

    }
    subMenu();

    function menuTopPos() {
        var anchor, menu;

        anchor = document.querySelector('.prop-img').getBoundingClientRect();
        menu =  document.querySelector('.side-bar-menu');
        //Set sidebar top equal anchor position
        menu.style.top = anchor.y + "px";
    }
    menuTopPos();
    window.addEventListener('resize', menuTopPos);


    function subMenu() {
        var subBtn = document.querySelector('.span.toggle-sub');
        var listItems = document.querySelectorAll('.sub-menu li');
        var delay = 0;
        if( window.outerWidth < 1025){
            listItems.forEach(function (listItem) {
                listItem.style.opacity = "0";
                listItem.style.animationName = "fadeIn";
                listItem.style.animationDuration = ".2s";
                listItem.style.animationFillMode = "forwards";
                listItem.style.animationDelay = delay + "0.2s";
                delay += .2;

            });
        }
    }
    //subMenu();
    //window.addEventListener('resize',subMenu);
   //document.querySelector('span.toggle-sub').addEventListener('click',subMenu);
});
