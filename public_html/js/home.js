$(function(){
            
    $('div[toggle-title-target="ceo"]').removeClass('hidden');
    $('div[toggle-content-target="ceo"]').removeClass('hidden');

// SIDEBAR CLICK ===============================================================================================================================    
    $('.sidebar-menu').on('click', function(){
        var key = $(this).attr('menu-switch');
        if(key == 'info-ujian'){
            if($('.dropdown-info').hasClass('hidden')){
                $('.dropdown-info').removeClass('hidden');
            }else $('.dropdown-info').addClass('hidden');
        }else{
            $('.content-target').addClass('hidden');
            $('div[toggle-title-target="'+key+'"]').removeClass('hidden');
            $('div[toggle-content-target="'+key+'"]').removeClass('hidden');
        }
        
    });

});