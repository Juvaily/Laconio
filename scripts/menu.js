$('.btn').on('click',function(e){
    e.preventDefault;
    $(this).toggleClass('btn_active');
    $('#vert').toggleClass('menu_side_hide');
    $('#vert').toggleClass('menu_side');
    //$('#overlay').toggleClass('body_hide')
});