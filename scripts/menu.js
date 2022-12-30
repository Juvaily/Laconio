$('.btn').on('click',function(e){
    e.preventDefault;
    $(this).toggleClass('btn_active');
    $('nav').toggleClass('menu_side')
    $('.body').toggleClass('body_hide')
});