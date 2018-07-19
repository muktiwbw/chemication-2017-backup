$(function(){

    // Header functionalities
    $('#user-dropdown-switch').on('click', function(){
        if($('#user-dropdown-menu').hasClass('hidden')){
            $('#user-dropdown-menu').removeClass('hidden');
        }else $('#user-dropdown-menu').addClass('hidden');
    });

});