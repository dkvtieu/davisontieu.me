$(document).ready(function () {

    //ACCORDION BUTTON ACTION (ON CLICK DO THE FOLLOWING)
    $('.accordionButton').click(function () {

        //REMOVE THE ON CLASS FROM ALL BUTTONS
        $('.accordionButton').removeClass('on');

        //NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
        $('.accordionContent').hide();

        //ADD THE ON CLASS TO THE BUTTON
        $(this).addClass('on');

        //OPEN THE SLIDE
        $(this).next().show();

    });

    /*** REMOVE IF MOUSEOVER IS NOT REQUIRED ***/

        //ADDS THE .OVER CLASS FROM THE STYLESHEET ON MOUSEOVER
    $('.accordionButton').mouseover(function () {
        $(this).addClass('over');

        //ON MOUSEOUT REMOVE THE OVER CLASS
    }).mouseout(function () {
            $(this).removeClass('over');
        });

    /*** END REMOVE IF MOUSEOVER IS NOT REQUIRED ***/


    /********************************************************************************************************************
     CLOSES ALL S ON PAGE LOAD
     ********************************************************************************************************************/
    $('.accordionContent').hide();

});
