



function save_user_privileges(privilege_code, employee_code) {
    $("#msg" + priviligeCode).html('');

    $checkbox = document.getElementById('privilege' + privilege_code);

    $.post(site_url + '/employee_privilege/employee_privilege_controller/add_employee_privileges', {privilege_code: privilege_code, employee_code: employee_code}, function(msg)
    {
        if (msg == 1) {
            $("#msg" + privilege_code).html('<img src="' + base_url + '/application_resources/images/icons/color/accept.png"  />');

        } else {
            $("#msg" + privilege_code).html('<img src="' + base_url + '/application_resources/images/icons/color/error.png"  />');

        }
    });

}


$('#emp_privi_tab a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
});

$(function() {		
			// Call SuperBox - that's it!
			$('.superbox').SuperBox();		
		});
                
;(function($){$.fn.SuperBox=function(options){var superbox=$('<div class="superbox-show"></div>');var superboximg=$('<img src="" class="superbox-current-img">');var superboxclose=$('<div class="superbox-close"></div>');superbox.append(superboximg).append(superboxclose);return this.each(function(){$('.superbox-list').click(function(){var currentimg=$(this).find('.superbox-img');var imgData=currentimg.data('img');superboximg.attr('src',imgData);if($('.superbox-current-img').css('opacity')==0){$('.superbox-current-img').animate({opacity:1});}
if($(this).next().hasClass('superbox-show')){superbox.toggle();}else{superbox.insertAfter(this).css('display','block');}
$('html, body').animate({scrollTop:superbox.position().top- currentimg.width()},'medium');});$('.superbox').on('click','.superbox-close',function(){$('.superbox-current-img').animate({opacity:0},200,function(){$('.superbox-show').slideUp();});});});};})(jQuery);